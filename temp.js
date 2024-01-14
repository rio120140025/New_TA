var pusher = new Pusher('3f13a94c15910301c709', {
    cluster: 'ap1',
    encrypted: true
});

var channel = pusher.subscribe('panic-channel');

channel.bind('panic-event', function (data) {
    $('#notificationModal').modal('show');
    $('#modalNoLaporan').text(data.no_laporan);
    $('#modalNama').text(data.nama);
    $('#modalWaktuKejadian').text(data.waktu_kejadian);
    $('#modalTempatKejadian').text(data.alamat_kejadian);

    

    navigator.serviceWorker.ready.then(registration => {
        registration.showNotification('Peringatan Pencurian Sepeda Motor', {
            body: data.body,
            icon: 'publicassetsimgpng-transparent-bandar-lampung-maluku-kepolisian-daerah-lampung-indonesian-national-police-others-logo-indonesia-area-removebg-preview.png',
            data: {
                url: '<?= site_url('detaillaporan/') ?>' + data.no_laporan.replace(/\//g, '-')
            }
        });
    });

    navigator.serviceWorker.addEventListener('notificationclick', function (event) {
        event.notification.close();
        event.waitUntil(
            clients.openWindow(event.notification.data.url)
        );
    });
});