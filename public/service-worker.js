
  const staticDevCoffee = "static-v1"
  const assets = [
    
    "/fonts/",
    "/storage/",
    "/bootstrap/",
    "/css/main.css",
    "/js/custom.js",
    "/js/jquery.min.js",
    "/images/account.jpg",
    "/images/add-article.jpg",
    "/images/logo.png"
  ]
  
  
  self.addEventListener("install", installEvent => {
    console.log("install");
    installEvent.waitUntil(
      caches.open(staticDevCoffee).then(cache => {
        cache.addAll(assets)
      })
    )
  })

  self.addEventListener("activate", event => {
    console.log('Activate!');
  });

  
  self.addEventListener("fetch", fetchEvent => {
    fetchEvent.respondWith(
      caches.match(fetchEvent.request).then(res => {
        return res || fetch(fetchEvent.request)
      })
    )
  })

  


  /*Unregister
  navigator.serviceWorker.getRegistrations().then(function(registrations) {
 for(let registration of registrations) {
  registration.unregister()
} })
*/
