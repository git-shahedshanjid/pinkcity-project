
<script>
   var owl = $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    items:1,
    nav: false,
    autoplay: true,
    autoplayTimeout: 10000,
    navigation: false
})

$('.owl-carousel__next').click(() => owl.trigger('next.owl.carousel'))

  $('.owl-carousel__prev').click(() => owl.trigger('prev.owl.carousel'))
</script>
