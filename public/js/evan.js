document.addEventListener('DOMContentLoaded', function() {
    var slideshow = document.getElementById('slideshow');
    var images = ['/img/bg/4.jpg', '/img/bg/3.jpg', '/img/bg/2.jpg', '/img/bg/1.jpg', '/img/bg/5.jpg', '/img/bg/6.jpg', '/img/bg/7.jpg', '/img/bg/8.jpg', '/img/bg/9.jpg', '/img/bg/10.jpg', '/img/bg/11.jpg'];
    var currentImageIndex = 0;

    function changeImage() {
      slideshow.style.backgroundImage = 'url("' + images[currentImageIndex] + '")';
      currentImageIndex = (currentImageIndex + 1) % images.length;
    }
  
    setInterval(changeImage, 10000);
});

  