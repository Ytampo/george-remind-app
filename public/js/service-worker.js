const cacheName = 'v1';

self.addEventListener('install', event => {
  event.waitUntil(
    fetch('/js/cache-list.json')
      .then(response => response.json())
      .then(files => {
        return caches.open(cacheName).then(cache => {
          return cache.addAll(files);
        });
      })
  );
});

self.addEventListener('activate', event => {
  // 必要に応じて古いキャッシュの削除処理などを行う
});

self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(cachedResponse => {
      if (cachedResponse) {
        return cachedResponse;
      }
      return fetch(event.request).then(response => {
        let responseClone = response.clone();
        caches.open(cacheName).then(cache => {
          cache.put(event.request, responseClone);
        });
        return response;
      }).catch(() => {
        return caches.match('/img/logo.svg');
      });
    })
  );
});