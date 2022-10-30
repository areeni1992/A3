

<script src="{{ asset('lib/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('lib/Owl Carousel/js/owl.carousel.min.js') }}"></script>

<script>
    $(".owl-carousel").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            },
        },
    });
</script>
</body>
</html>
