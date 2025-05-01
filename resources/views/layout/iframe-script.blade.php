<script>
    document.addEventListener('DOMContentLoaded', function () {
     const iframe = document.getElementById('iframeContent');
     if (iframe) {
       iframe.addEventListener('load', function () {
         console.log('iFrame loaded successfully!');
       });
     } else {
       console.error('iFrame not found!');
     }
   
     const header = document.getElementById('header');
     if (header) {
       window.addEventListener('scroll', function() {
         if (window.scrollY > 50) {
           header.classList.add('scrolled');
         } else {
           header.classList.remove('scrolled');
         }
       });
     } else {
       console.error('Header element not found!');
     }
   });
   
   function loadIframe(url) {
     console.log("Loading iframe with URL:", url); 
     const iframe = document.getElementById('iframeContent');
     if (iframe) {
       iframe.src = url;
     } else {
       console.error('iFrame not found!');
     }
   }
     </script>