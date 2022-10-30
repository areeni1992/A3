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
        <link rel="stylesheet" href="{{ asset('lib/Owl Carousel/css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('lib/Owl Carousel/css/owl.theme.default.min.css') }}" />

        <!-- icons -->
        <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css') }}" />

        <!-- Style css -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    </head>
<body>

<!-- Start Header -->
<section>
    <header>
        <div class="brand">
            <p class="text-center mt-2">
                Brand Founded By perfect Line Sport Products LLC
            </p>
        </div>
        <!-- Start First Navbar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-lg-none d-md-block" href="#">
                    <img
                        src="assets/img/logo.jpg"
                        alt="Error In Download the Image"
                        width="50"
                        class="rounded-circle border border-3"
                    /></a>
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
                            <a class="nav-link pb-1 pb-lg-0 text-black" href="#"
                            >CONTACT</a
                            >
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li  class="nav-item dropdown">
                            <div class="dropdown show">
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
                    <div class="col-lg-6 col-md-12">
                        <div class="logo d-none d-lg-block">
                            <a href="#">
                                <img
                                    src="assets/img/logo.jpg"
                                    alt="Error In Download the Image"
                                    width="50"
                                    class="rounded-circle border border-3"
                                />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
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
                            <a class="nav-link" href="#"
                            ><i class="bi bi-house-fill home-icon fs-5"></i
                                ></a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">SPORTS</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">MEN</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">WOMEN</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">SPORTS</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">CHILDREN</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#">NEW ARRAIVALS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">SALE</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Second Navbar -->

    </header>
</section>

