@if(request()->route()->uri !== 'login' && request()->route()->uri !== 'register')
<section>
    <footer>
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0 text-center text-md-start">
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#" class="text-dark"><img src="{{ config('app.url').'/storage/'.$settings['logo'] }}" alt="Error In Download The Image" class="img-fluid rounded-circle" width="90"></a>
                            <p class="text-muted mt-3">
                                {{ $settings['quotationtext'] }}
                            </p>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-3">DISCOVER</h5>
                    <ul class="list-unstyled text-decoration-none">
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">About US</a>
                        </li>
                        <li>
                            <a href="{{ route('careerPage') }}" class="text-dark text-decoration-none text-muted">Careers</a>
                        </li>
                        <li>
                            <a href="{{ route('userQoutPage') }}" class="text-dark text-decoration-none text-nowrap text-muted">Request Quotations</a>
                        </li>
                        <li>
                            <a href="{{ route('contactPage') }}" class="text-dark text-decoration-none text-muted">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-3">DISTRIBUTER CATEGORIES</h5>
                    <ul class="list-unstyled text-decoration-none">
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">Warehouse Distributor
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">A3net</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-nowrap text-muted">Marketing Area</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">Contact</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">Shops</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">Affilates</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-3 text-nowrap">CUSTOMER SERVICES</h5>
                    <ul class="list-unstyled text-decoration-none">
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">Faq's
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">My Account</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-nowrap text-muted">My orders</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">Whatsapp Chatbot</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">Payment Methods</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark text-decoration-none text-muted">Affilates</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright p-3 bg-light text-center text-md-start">
            <div class="row">
                <div class="col-md-4 text-">
                    copyright © 2022 all rights reserved by
                    <a href="#">
                        <img src="{{ config('app.url').'/storage/'.$settings['logo'] }}" class="img-fluid rounded-circle" alt="Error in Download The  Image" width="20">
                    </a>
                </div>
                <div class="col-md-8 text-end mt-3 mt-md-0">
                    <a href="#" class="me-2">Terms &amp; Condition</a>
                    <a href="#" class="me-2">Warranty Policies</a>
                    <a href="#" class="me-2">Provacy policies</a>
                    <a href="#" class="me-2">Return policies</a>
                    <a href="#">Cookie policies</a>
                </div>
            </div>
        </div>
        <!-- Copyright -->
    </footer>
</section>
<script src="{{ asset('lib/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('lib/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
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
@endif
