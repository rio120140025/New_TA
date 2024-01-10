
    $(document).ready(function () {
        var map;
        var marker;

        map = L.map('map').setView([0, 0], 15);

        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '&copy; <a>POLRES Lampung Utara</a>'
        }).addTo(map);

        function showLocation(lat, lng) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lng]).addTo(map);
            marker.bindPopup("Lokasi Anda").openPopup();
            map.setView([lat, lng], 13);
        }

        function getLocation() {
            if ("geolocation" in navigator) {
                navigator.geolocation.watchPosition(function (position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    showLocation(lat, lng);

                    // Optional: Set the latitude and longitude in form fields
                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                });
            } else {
                alert("Geolocation tidak didukung oleh browser Anda.");
            }
        }
        getLocation();

        $.ajax({
            url: "<?php echo base_url('home/get_data'); ?>",
            dataType: 'json',
            method: 'get',
            success: function (data) {
                console.log('Data received:', data);

                // Map markers and circles
                var customIcon = L.icon({
                    iconUrl: 'assets/svg/location-warning.svg',
                    iconSize: [46, 46],
                    iconAnchor: [23, 46],
                    popupAnchor: [0, -46]
                });

                data.map_data.forEach(function (dataItem) {
                    var popupContent = `Tipe Motor: <strong>${dataItem.tipe_motor}</strong><br>` +
                        `Tempat Kejadian Perkara: <strong>${dataItem.alamat_kejadian}, Kelurahan/Desa ${dataItem.subdis_name}, Kecamatan ${dataItem.dis_name}</strong><br>` +
                        `Waktu Kejadian: <strong>${dataItem.waktu_kejadian}</strong>`;

                    L.marker([dataItem.latitude, dataItem.longitude], { icon: customIcon })
                        .bindPopup(popupContent)
                        .addTo(map);

                    var circle = L.circle([dataItem.latitude, dataItem.longitude], {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.1,
                        radius: 100
                    }).addTo(map);
                });

                // Create charts
                var doughnutData = {
                    labels: data.motor_types.map(item => item.tipe_motor),
                    datasets: [{
                        data: data.motor_types.map(item => item.jumlah),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1
                    }]
                };

                var doughnutCtx = document.getElementById('doughnut').getContext('2d');
                var doughnutChart = new Chart(doughnutCtx, {
                    type: 'doughnut',
                    data: doughnutData
                });

                // ... (kode untuk membuat grafik lainnya)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error fetching data:', textStatus, errorThrown);
            }
        });
    });

