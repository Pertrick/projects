
const staticCacheName = 'weather-static-v1';
const dynamicCacheName = 'weather-dynamic-v1';

const assets = [
    './index.html',
    './js/main.js',
    './css/main.css',
    './img/default5.jpg',
    './index.html'
]

// cache size limit 
const limitCacheSize = (name, size) => {
    caches.open(name).then(cache => {
        cache.keys().then(keys => {
            if (keys.length > size) {
                cache.delete(keys[0]).then(limitCacheSize(name, size));
            }
        })
    })
}

self.addEventListener('install', (e) => {
    //console.log('service worker installed');
    e.waitUntil(caches
        .open(staticCacheName)
        .then((cache) => {
            console.log('caching assets');
            cache.addAll(assets).catch(err => console.log(err))
        })
        .then(() => self.skipWaiting())
    );
});

self.addEventListener('activate', (e) => {
    //console.log("service worker activated");
    e.waitUntil(
        caches.keys().then((keys) => {
            //console.log(keys);
            return Promise.all(
                keys
                .filter(key => key !== staticCacheName && key !== dynamicCacheName)
                .map(key => caches.delete(key)))
        })
    )
});

self.addEventListener('fetch', (e) => {
    //console.log('fetch event ', e);
    e.respondWith(
        caches.match(e.request).then(cacheRes => {
            return cacheRes || fetch(e.request).then(async (fetchRes) => {
                const cache = await caches.open(dynamicCacheName);
                cache.put(e.request.url, fetchRes.clone());
                limitCacheSize(dynamicCacheName, 20);
                return fetchRes;
            });
        }).catch(() => {
            if (e.request.url.indexOf('.html') > -1) {
                return caches.match('./index.html')
            }

        })
    );
});