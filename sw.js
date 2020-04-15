var cache_name = 'finance-cache';
var cached_urls = [

];

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(cache_name)
    .then(function(cache) {
      return cache.addAll(cached_urls);
    })
  );
});

self.addEventListener('activate', function(event) {
  event.waitUntil(
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.map(function(cacheName) {
          if (cacheName.startsWith('pages-cache-') && staticCacheName !== cacheName) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// self.addEventListener('fetch', function(event) {
//     event.respondWith(
//       caches.match(event.request)
//       .then(cacheResponse=>(cacheResponse || fetch(event.request))),
//     );
//   });