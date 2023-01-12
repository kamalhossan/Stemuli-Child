    $(document).ready(function () {
      $('.content-image').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        fade: true,
        centerMode: true,
        focusOnSelect: true,
        asNavFor: '.slider-nav'
      });
      $('.slider-nav').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.content-image',
        arrows: false,
        infinite: true,
        dots: true,
        centerMode: false,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 3000
      });
    });

