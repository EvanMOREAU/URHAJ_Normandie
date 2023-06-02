document.addEventListener('DOMContentLoaded', function() {
    var slideshow = document.getElementById('slideshow');
    var images = ['/img/bg/4.jpeg', '/img/bg/2.jpeg', '/img/bg/3.jpeg', '/img/bg/5.jpeg', '/img/bg/6.jpeg', '/img/bg/7.jpeg', '/img/bg/8.webp'];
    var currentImageIndex = 0;

    function changeImage() {
      slideshow.style.backgroundImage = 'url("' + images[currentImageIndex] + '")';
      currentImageIndex = (currentImageIndex + 1) % images.length;
    }
  
    setInterval(changeImage, 10000);
});

  