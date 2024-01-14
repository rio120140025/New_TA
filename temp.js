var map = L.map("map").setView([0, 0], 15);
var marker;

L.tileLayer("http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}", {
  maxZoom: 17,
  subdomains: ["mt0", "mt1", "mt2", "mt3"],
  attribution: "&copy; <a>POLRES Lampung Utara</a>",
}).addTo(map);

function showLocation(lat, lng) {
  if (marker) {
    map.removeLayer(marker);
  }

  // Ganti API_KEY dengan kunci API OpenCage Geocoding Anda
  var apiKey = "d017576f726446d6a3fe62196659856c";
  fetch(
    `https://api.opencagedata.com/geocode/v1/json?q=${lat}+${lng}&key=${apiKey}`
  )
    .then((response) => response.json())
    .then((data) => {
      var address = data.results[0].formatted;
      marker = L.marker([lat, lng]).addTo(map);
      marker.bindPopup(address).openPopup();

      // Set TKP input value to the address
      document.getElementById("tkp").value = address;
    })
    .catch((error) => console.error("Error fetching location data:", error));

  map.setView([lat, lng], 15);
}

function getLocation() {
  if ("geolocation" in navigator) {
    navigator.geolocation.watchPosition(function (position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
      showLocation(lat, lng);

      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lng;

      var currentTime = new Date();
      var day = String(currentTime.getDate()).padStart(2, "0");
      var month = String(currentTime.getMonth() + 1).padStart(2, "0");
      var year = String(currentTime.getFullYear()).slice(-2);
      var hours = String(currentTime.getHours()).padStart(2, "0");
      var minutes = String(currentTime.getMinutes()).padStart(2, "0");
      var seconds = String(currentTime.getSeconds()).padStart(2, "0");
      var dateStr = day + month + year;
      var timeStr = hours + minutes + seconds;
      document.getElementById("waktu_melapor").value = dateStr + timeStr;
    });
  } else {
    alert("Geolocation tidak didukung oleh browser Anda.");
  }
}
getLocation();
