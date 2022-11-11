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
                    <h5 class="mb-3">{{ __('words.CUSTOMER SERVICES') }}</h5>
                    <ul class="list-unstyled text-decoration-none">
                        <li>
                            <a href="{{ route('careerPage') }}" class="text-dark text-decoration-none text-muted">{{ __('words.Careers') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('userQoutPage') }}" class="text-dark text-decoration-none text-nowrap text-muted">{{ __('words.Request Quotations') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('contactPage') }}" class="text-dark text-decoration-none text-muted">{{ __('words.Contact Us') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('agentsPage') }}" class="text-dark text-decoration-none text-muted">{{ __('words.Agents') }}</a>
                        </li>
                    </ul>
                </div>
{{--                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">--}}
{{--                    <h5 class="mb-3">DISTRIBUTER CATEGORIES</h5>--}}
{{--                    <ul class="list-unstyled text-decoration-none">--}}
{{--                        <li>--}}
{{--                            <a href="#" class="text-dark text-decoration-none text-muted">Warehouse Distributor--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="text-dark text-decoration-none text-muted">A3net</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="text-dark text-decoration-none text-nowrap text-muted">Marketing Area</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="text-dark text-decoration-none text-muted">Contact</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="text-dark text-decoration-none text-muted">Shops</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="text-dark text-decoration-none text-muted">Affilates</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-3 text-nowrap">DISCOVER</h5>
                    <ul class="list-unstyled text-decoration-none">
                        @foreach($pages as $page)
                        <li>
                            <a href="{{ route('showPage', $page) }}" class="text-dark text-decoration-none text-muted">{{ $page->translate(app()->getLocale())->title }}
                            </a>
                        </li>
                        @endforeach
                         <li>
                             <a href="{{ route('faqPage') }}" class="text-dark text-decoration-none text-muted">
                                 FAQ
                             </a>
                         </li>
                        <li>
                            <a href="{{ route('policyPage') }}" class="text-dark text-decoration-none text-muted">
                                Policy
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright p-3 bg-light text-center text-md-start">
            <div class="row">
                <div class="col-md-4 text-">
                    {{ __('words.copyright') }} © <?php echo date("Y"); ?> {{ __('words.all rights reserved by') }}
                    <a href="#">
                        <img src="{{ config('app.url').'/storage/'.$settings['logo'] }}" class="img-fluid rounded-circle" alt="Error in Download The  Image" width="20">
                    </a>
                </div>
                <div class="col-md-8 text-end mt-3 mt-md-0">
{{--                    @foreach($policies as $row)--}}
{{--                    <a href="{{ route('singlePolicy', $row->id) }}" class="me-2">{{ $row->translate(app()->getLocale())->policy_name }}</a>--}}
{{--                    @endforeach--}}
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
<script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
<script>
    var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"{{$settings['whatsapp']}}","welcomeMessage":"wellcom","zIndex":999999,"btnColorScheme":"light"};
    window.onload = () => {
        _waEmbed(wa_btnSetting);
    };
</script>

</body>
</html>
@endif
