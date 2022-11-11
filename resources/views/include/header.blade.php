<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ config('app.name') }}</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('lib/Bootstrap/css/bootstrap.min.css') }}" />
        <!-- Owl carousel -->
        <link rel="stylesheet" href="{{ asset('lib/owl-carousel/css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('lib/owl-carousel/css/owl.theme.default.min.css') }}" />

        <!-- icons -->
        <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css') }}" />

        <!-- Style css -->
        <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/agents.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/career.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/Request-quotation.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/post.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/policy.css') }}" />
{{--    @if(\Illuminate\Support\Facades\App::isLocal('ar'))--}}
{{--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.min.css" integrity="sha512-3Lr2MkT5iW+jVhwKFUBa+zQk8Uklef98/3mebU6wNxTzj65enYrFXaeuqPAYWxcQd1GAt9aUBvYHOIcl2SUsKA==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--    @endif--}}
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    </head>
<body>

<!-- Start Header -->
@if(isset($pages) || isset($settings))

<section>
    <header>
        <!-- Start First Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-lg-none d-md-block" href="{{ route('home') }}">
                    <img src="{{ config('app.url').'/storage/'.$settings['logo'] }}"
                         alt="Error In Download the Image"
                         width="50"
                         class="rounded-circle border border-3" alt="img">
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#Fnav"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse justify-content-between"
                    id="Fnav"
                >

                    <ul class="navbar-nav mb-2 mb-lg-0 text-black">
                        @foreach($pages as $page)
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{ route('showPage', $page) }}">{{ $page->translate(app()->getLocale())->title }}</a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link pb-1 pb-lg-0 text-black" href="{{ route('contactPage') }}">CONTACT</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li  class="nav-item dropdown">
                            <div class="dropdown show d-flex">
                                <svg class="my-auto" width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 490 490" style="enable-background:new 0 0 490 490;" xml:space="preserve">
<path d="M245,0C109.69,0,0,109.69,0,245s109.69,245,245,245s245-109.69,245-245S380.31,0,245,0z M31.401,260.313h52.542  c1.169,25.423,5.011,48.683,10.978,69.572H48.232C38.883,308.299,33.148,284.858,31.401,260.313z M320.58,229.688  c-1.152-24.613-4.07-47.927-8.02-69.572h50.192c6.681,20.544,11.267,43.71,12.65,69.572H320.58z M206.38,329.885  c-4.322-23.863-6.443-47.156-6.836-69.572h90.913c-0.392,22.416-2.514,45.709-6.837,69.572H206.38z M276.948,360.51  c-7.18,27.563-17.573,55.66-31.951,83.818c-14.376-28.158-24.767-56.255-31.946-83.818H276.948z M199.961,229.688  c1.213-24.754,4.343-48.08,8.499-69.572h73.08c4.157,21.492,7.286,44.818,8.5,69.572H199.961z M215.342,129.492  c9.57-37.359,21.394-66.835,29.656-84.983c8.263,18.148,20.088,47.624,29.66,84.983H215.342z M306.07,129.492  c-9.77-40.487-22.315-73.01-31.627-94.03c11.573,8.235,50.022,38.673,76.25,94.03H306.07z M215.553,35.46  c-9.312,21.02-21.855,53.544-31.624,94.032h-44.628C165.532,74.13,203.984,43.692,215.553,35.46z M177.44,160.117  c-3.95,21.645-6.867,44.959-8.019,69.572h-54.828c1.383-25.861,5.968-49.028,12.65-69.572H177.44z M83.976,229.688H31.401  c1.747-24.545,7.481-47.984,16.83-69.572h46.902C89.122,181.002,85.204,204.246,83.976,229.688z M114.577,260.313h54.424  c0.348,22.454,2.237,45.716,6.241,69.572h-47.983C120.521,309.288,115.92,286.115,114.577,260.313z M181.584,360.51  c7.512,31.183,18.67,63.054,34.744,95.053c-10.847-7.766-50.278-38.782-77.013-95.053H181.584z M273.635,455.632  c16.094-32.022,27.262-63.916,34.781-95.122h42.575C324.336,417.068,284.736,447.827,273.635,455.632z M314.759,329.885  c4.005-23.856,5.894-47.118,6.241-69.572h54.434c-1.317,25.849-5.844,49.016-12.483,69.572H314.759z M406.051,260.313h52.548  c-1.748,24.545-7.482,47.985-16.831,69.572h-46.694C401.041,308.996,404.882,285.736,406.051,260.313z M406.019,229.688  c-1.228-25.443-5.146-48.686-11.157-69.572h46.908c9.35,21.587,15.083,45.026,16.83,69.572H406.019z M425.309,129.492h-41.242  c-13.689-32.974-31.535-59.058-48.329-78.436C372.475,68.316,403.518,95.596,425.309,129.492z M154.252,51.06  c-16.792,19.378-34.636,45.461-48.324,78.432H64.691C86.48,95.598,117.52,68.321,154.252,51.06z M64.692,360.51h40.987  c13.482,32.637,31.076,58.634,47.752,78.034C117.059,421.262,86.318,394.148,64.692,360.51z M336.576,438.54  c16.672-19.398,34.263-45.395,47.742-78.03h40.99C403.684,394.146,372.945,421.258,336.576,438.54z"/>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
</svg>
                                <a class="nav-link dropdown-toggle pt-0 pt-lg-2 text-black"
                                   href="#"
                                   data-bs-toggle="dropdown">
                                    {{ app()->getLocale() }}
                                </a>
                                <div class="dropdown-menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End First Navbar -->

        <!-- Start Search Bar -->
        <div class="saerch-bar my-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 w-auto">
                        <div class="logo d-none d-lg-block">
                            <a href="{{ route('home') }}">
                                <img
                                    src="{{ config('app.url').'/storage/'.$settings['logo'] }}"
                                    alt="Error In Download the Image"
                                    width="50"
                                    class="rounded-circle border border-3"
                                />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mx-auto">
                        <form>
                            <div class="input-group mb-3">
                                <input
                                    type="search"
                                    class="form-control border-0"
                                    placeholder="Search here"
                                />
                                <button class="btn search-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Bar -->

        <!-- Start Second Navbar -->
        <nav class="navbar S-navbar navbar-expand-lg bg-black">
            <div class="container">
                <a class="navbar-brand d-lg-none d-md-block" href="#">
                    <i class="bi bi-house-fill home-icon fs-5"></i>
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#second-navbar"
                >
                    <i class="bi bi-list text-white border border-1 px-2"></i>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-evenly"
                    id="second-navbar"
                >
                    <ul class="navbar-nav mb-2 mb-lg-0 align-items-lg-center">
                        <li class="nav-item me-4 d-none d-lg-block">
                            <a class="nav-link" href="{{ route('home') }}" >
                                <i class="bi bi-house-fill home-icon fs-5"></i>
                            </a>
                        </li>
                        @foreach($categories as $cat)
                        <li class="nav-item me-4">
                            <a class="nav-link" href="{{ route('getSubCategories', $cat->id) }}">{{ $cat->translate(app()->getLocale())->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Second Navbar -->

    </header>
</section>
@endif


