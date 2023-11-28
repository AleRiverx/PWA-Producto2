'use strict';

// CODELAB: Update cache names any time any of the cached files change.
const CACHE_NAME = 'static-cache-v9';

// CODELAB: Add list of files to cache here.
const FILES_TO_CACHE = [
  '/offline.html',
  '/index.php',
  '/ajax_info.html',
  '/ajax_info1.html',
  '/imagenes/Git.png',
  '/imagenes/JavaScript.png',
  '/imagenes/VisualStudio.png',
  '/imagenes/XAMPP.png',
];

self.addEventListener('install', (evt) => {
  console.log('[ServiceWorker] Install');
  // CODELAB: Precache static resources here.
  evt.waitUntil(
      caches.open(CACHE_NAME).then((cache) => {
        console.log('[ServiceWorker] Pre-caching offline page');
        return cache.addAll(FILES_TO_CACHE);
      })
  );
  self.skipWaiting();
});

self.addEventListener('activate', (evt) => {
  console.log('[ServiceWorker] Activate');
  // CODELAB: Remove previous cached data from disk.
  evt.waitUntil(
      caches.keys().then((keyList) => {
        return Promise.all(keyList.map((key) => {
          if (key !== CACHE_NAME) {
            console.log('[ServiceWorker] Removing old cache', key);
            return caches.delete(key);
          }
        }));
      })
  );
  self.clients.claim();
});

self.addEventListener('fetch', (evt) => {
  evt.respondWith(
      caches.match(evt.request).then((response) => {
          return response || fetch(evt.request).then((fetchResponse) => {
              return caches.open(CACHE_NAME).then((cache) => {
                  cache.put(evt.request, fetchResponse.clone());
                  return fetchResponse;
              });
          });
      })
  );
});
