const CACHE_NAME = "polres-lamut";
const urlsToCache = ["/"];

self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(urlsToCache))
  );
});

self.addEventListener("fetch", (event) => {
  event.respondWith(
    caches
      .match(event.request)
      .then((response) => response || fetch(event.request))
  );
});

self.addEventListener("message", (event) => {
  const dataFromMainPage = event.data;
  showNotification(dataFromMainPage);
});

function showNotification(data) {
  data.url = data.url || "";

  const options = {
    body:
      data.no_laporan +
      "\nNama:  " +
      data.nama +
      "\nWaktu: " +
      data.waktu_kejadian +
      "\nTKP: " +
      data.alamat_kejadian,
  };

  options.data = data;

  self.registration.showNotification(
    "Peringatan Pencurian Sepeda Motor",
    options
  );
}

self.addEventListener("notificationclick", (event) => {
  console.log("Notification clicked:", event);
  const url = event.notification.data.url;
  console.log("Opening URL:", url);

  event.notification.close();
  event.waitUntil(clients.openWindow(url));
});
