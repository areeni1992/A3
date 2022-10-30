@extends('layouts.app')


@section('content')
    <!-- Start Header -->
    <section>
        <header>
            <!--Start Hedaer Title -->
            <div class="title-header text-center" style="background-image: url({{ config('app.url').'/storage/images/'.$sectionsData->slider_image }})">
                <div
                    class="container d-flex flex-column text-center justify-content-center align-center align-items-center text-white"
                >
                    <h1>
                        {{ $sectionsData->translate(app()->getLocale())->slider_title }}
                    </h1>
                    <p class="fs-5 mt-1 text-center">
                        {{ $sectionsData->translate(app()->getLocale())->slider_text }}
                    </p>
                </div>
            </div>
            <!--End Hedaer Title -->
        </header>
    </section>

    <!-- Start Box Slider One -->
    <section>
        <div class="container-fluid my-5">
            <div class="owl-carousel owl-theme">
                @foreach($products as $pro)
                    @if($sectionsData->cat_ids[1] == $pro->parent_id)
                    <div class="item">
                        <img
                            src="{{ config('app.url').'/storage/'.$pro->image }}"
                            alt="Error In Download the image"
                        />
                        <h5>{{ $pro->translate(app()->getLocale())->name }}</h5>
                        <h6>AED {{ $pro->price }}</h6>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Box Slider One -->

    <!-- Start Sport Clothes -->
    <section>
        <div class="clothes my-5" style="background-image: url({{ config('app.url').'/storage/images/'.$sectionsData->first_banner }})">
            <div class="container h-100 d-flex flex-column justify-content-center">
                <div class="clothes-title text-white">
                    <h3 class="mt-4">
                        {{ $sectionsData->translate(app()->getLocale())->first_banner_text }}
                    </h3>
                    <a class="btn mt-3 clothes-btn" href="{{ route('showPage',  is_array($sectionsData->page_ids)) ? $sectionsData['first'] : '' }}">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Sport Clothes -->

    <!-- Start The Market -->
    <section>
        <div class="market my-5">
            <div class="container h-75 d-flex flex-column justify-content-center">
                <h4 class="text-black">{{ $sectionsData->translate(app()->getLocale())->second_banner_text }}</h4>
                <a class="btn market-btn bg-black text-white mt-2" href="{{ route('showPage', is_array($sectionsData->page_ids)) ? $sectionsData['second'] : ''}}">
                    SHOP NOW
                </a>

                <img
                    src="{{ config('app.url').'/storage/images/'.$sectionsData->second_banner }}"
                    alt="Error In Download The Image"
                    class="market-img1 img-fluid d-none d-lg-block"
                    width="700"
                />

                <img
                    src="assets/img/market-2.jpg"
                    alt="Error In Download The Image"
                    class="market-img2 img-fluid d-none d-lg-block"
                    width="500"
                />
            </div>
        </div>
    </section>
    <!-- End The Market -->

    <!-- Start Box Slider Two -->
    <section>
        <div class="box-two">
            <div class="container-fluid my-5">
                <div class="owl-carousel owl-theme">
                    @foreach($products as $pro)
                        @if($sectionsData->cat_ids[2] == $pro->parent_id)
                            <div class="item">
                                <img
                                    src="{{ config('app.url').'/storage/'.$pro->image }}"
                                    alt="Error In Download the image"
                                />
                                <h5>{{ $pro->translate(app()->getLocale())->name }}</h5>
                                <h6>AED {{ $pro->price }}</h6>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Box Slider Two -->

    <!-- Start Custom apparel -->
    <section>
        <div class="apparel">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 p-0 d-none d-lg-block">
                        <img
                            src="{{ config('app.url').'/storage/images/'.$sectionsData->third_banner_left }}"
                            alt="Error I Download The Image"
                            class="img-fluid w-100"
                            width="500"
                        />
                    </div>
                    <div class="col-lg-4 col-md-6 p-0">
                        <div
                            class="bg-black text-white h-100 d-flex flex-column justify-content-center align-items-center text-center p-5"
                        >
                            <h3>
                                {{ $sectionsData->translate(app()->getLocale())->third_banner_title }}
                            </h3>
                            <p class="my-3 text-white-50">
                                {{ $sectionsData->translate(app()->getLocale())->third_banner_text }}

                            </p>
                            <a class="btn apperal-btn" href="{{ route('showPage',  is_array($sectionsData->page_ids)) ? $sectionsData['third'] : '' }}">SHOP NOW</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 p-0 d-none d-lg-block d-md-block">
                        <img
                            src="{{ config('app.url').'/storage/images/'.$sectionsData->third_banner_right }}"
                            alt="Error I Download The Image"
                            class="img-fluid"
                            width="500"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Custom apperal -->

    <!-- Start Box Slider Three -->
    <section>
        <div class="box-three">
            <div class="container-fluid my-5">
                <div class="owl-carousel owl-theme">
                    @foreach($products as $pro)
                        @if($sectionsData->cat_ids[3] == $pro->parent_id)
                            <div class="item">
                                <img
                                    src="{{ config('app.url').'/storage/'.$pro->image }}"
                                    alt="Error In Download the image"
                                />
                                <h5>{{ $pro->translate(app()->getLocale())->name }}</h5>
                                <h6>AED {{ $pro->price }}</h6>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Box Slider Three -->

    <!-- Start Loyalty Program -->
    <section>
        <div class="loyal" style="background-image: url({{ config('app.url').'/storage/images/'.$sectionsData->fourth_banner }})">
            <div class="container h-100 d-flex flex-column justify-content-center">
                <h2><span>{{ $sectionsData->translate(app()->getLocale())->fourth_banner_title }}</span></h2>
                <p class="text-muted">{{ $sectionsData->translate(app()->getLocale())->fourth_banner_text }}</p>
                <a class="btn loyal-btn py-2" href="{{ route('showPage', $sectionsData->page_ids['last']) }}">LEARN MORE</a>
            </div>
        </div>
    </section>
    <!-- End Loyalty Program -->

    <!-- Start Box Slider Five -->
    <section>
        <div class="box-three">
            <div class="container-fluid my-5">
                <div class="owl-carousel owl-theme">
                    @foreach($products as $pro)
                        @if($sectionsData->cat_ids[4] == $pro->parent_id)
                            <div class="item">
                                <img
                                    src="{{ config('app.url').'/storage/'.$pro->image }}"
                                    alt="Error In Download the image"
                                />
                                <h5>{{ $pro->translate(app()->getLocale())->name }}</h5>
                                <h6>AED {{ $pro->price }}</h6>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Box Slider Five -->

    <!-- Start News Letter -->
    <section>
        <div class="newsLetter my-5">
            <div class="container-fluid">
                <div class="row flex-column-reverse flex-lg-row flex-md-row">
                    <div class="col-lg-5 col-md-6 col-sm-12 p-0">
                        <div
                            class="newsLetter-img p-5 h-100 d-flex flex-column justify-content-center align-content-center text-white"
                            style="background-image: url({{ config('app.url').'/storage/images/'.$sectionsData->catalog_image }}"
                        >
                            <h3 class="text-nowrap">SUBSCRIBE TO NEWSLETTER</h3>
                            <form>
                                <input
                                    type="email"
                                    placeholder="Email"
                                    class="form-control my-3 border-0"
                                />
                                <input
                                    type="submit"
                                    value="SUBSCRIBE"
                                    class="btn newsLetter-btn mt-3"
                                />
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 p-0">
                        <div
                            class="gymFloor text-white d-flex flex-column justify-content-center justify-content-lg-end p-4"
                            style='background-image: url({{asset('/images/newsLetter-1.jpg') }})'
                        >
                            <h3>{{ $sectionsData->catalog_text }}</h3>
                            <a class="btn btn-light gymFloor-btn mb-3" href="{{ config('app.url').'/storage/images/'.$sectionsData->catalog }}">
                                DOWNLOAD CATALOG
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Letter -->

    <!-- Start Box Slider six -->
    <section>
        <div class="box-three">
            <div class="container-fluid my-5">
                <h3 class="text-center mb-4">Top Products</h3>
                <div class="owl-carousel owl-theme">
                    @foreach($products as $pro)
                        @if($sectionsData->cat_ids[5] == $pro->parent_id)
                            <div class="item">
                                <img
                                    src="{{ config('app.url').'/storage/'.$pro->image }}"
                                    alt="Error In Download the image"
                                />
                                <h5>{{ $pro->translate(app()->getLocale())->name }}</h5>
                                <h6>AED {{ $pro->price }}</h6>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Box Slider six -->

    <!-- Start Blogs -->
    <section>
        <div class="blogs my-5">
            <div class="container">
                <div class="d-flex flex-column justify-content-center">
                    <div class="text-center">
                        <h3>Blogs</h3>
                        <p class="text-muted">Select blog to read details</p>
                    </div>
                    <div class="row">
                        @foreach($posts as $post)
                            <div
                                class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-md-center"
                            >
                                <div class="card mb-3" style="max-width: 540px">
                                    <div class="row g-0">
                                        <div class="col-lg-4 col-md-12">
                                            <img
                                                src="{{ config('app.url').'/storage/'.$post->image }}"
                                                class="img-fluid rounded mt-2 p-2"
                                                alt="Error In Download the Image"
                                            />
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="card-body">
                                                <small class="text-muted">{{ $post->created_at->format('d/m/Y') }}</small>
                                                <h5 class="card-title">{{ $post->translate(app()->getLocale())->title }}</h5>
                                                <p class="card-text text-muted">
                                                    {!! $post->translate(app()->getLocale())->body !!}
                                                </p>
                                                <a
                                                    href="{{ route('showPost', $post) }}"
                                                    class="card-text text-end text-decoration-none d-flex justify-content-end"
                                                >
                                                    DETAILS <i class="bi bi-arrow-right ms-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blogs -->

    <!-- Start Info -->
    <section>
        <div class="info border">
            <div class="container">
                <div class="row">
                    <div
                        class="col-lg-4 col-md-6 col-sm-12 mt-4 text-center text-lg-start"
                    >
                        <h6>{{ $settings['quotationtitle'] }}</h6>
                        <p>{{ $settings['quotationtext'] }}</p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12 text-center border pt-4">
                        <h6>Telephone</h6>
                        <p>{{ $settings['telephone'] }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 text-center border pt-4">
                        <h6>Whatsapp</h6>
                        <p>{{ $settings['whatsapp'] }}</p>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 text-center mt-4">
                        <h6>Email</h6>
                        <p>{{ $settings['email'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Info -->

    <!-- Start Social Media -->
    <section>
        <div class="social-media my-5">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-lg-6 col-md-12 mb-5">
                        <h5>SOCAIL MEDIA ACCOUNTS</h5>
                        <div class="icons-social fs-3 mb-5">
                            <a href="{{ $settings['facebook'] }}" class="icons-social text-decoration-none">
                                <i class="bi bi-facebook me-2"></i>
                            </a>
                            <a href="{{ $settings['google'] }}" class="icons-social text-decoration-none">
                                <i class="bi bi-google me-2"></i>
                            </a>
                            <a href="{{ $settings['twitter'] }}" class="icons-social text-decoration-none">
                                <i class="bi bi-twitter me-2"></i>
                            </a>
                            <a href="{{ $settings['linkedin'] }}" class="icons-social text-decoration-none">
                                <i class="bi bi-linkedin me-2"></i>
                            </a>
                            <a href="{{ $settings['instagram'] }}" class="icons-social text-decoration-none">
                                <i class="bi bi-instagram"></i>
                            </a>
                        </div>
                        <h5>APPLICATION LINK(SOON)</h5>
                        <a>
                            <img
                                src="{{ config('app.url').'/images/appStore.png' }}"
                                alt="Error In Download The Image"
                                class="img-fluid"
                                width="120"
                            />
                        </a>
                        <a>
                            <img
                                src="{{ config('app.url').'/images/googlePlay.png' }}"
                                alt="Error In Download The Image"
                                class="img-fluid"
                                width="120"
                            />
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="program">
                            <h5>MEMBERSHIP IN GOVERNMENT INSTITUTIONS</h5>
                            <h5 class="my-3">PROCUREMEN</h5>
                            <h5 class="mb-4">PROGRAM</h5>
                            <img
                                src="assets/img/khalefa.png"
                                alt="Error In Download The Image"
                                class="img-fluid"
                                width="100"
                            />
                            <img
                                src="assets/img/sahem.png"
                                alt="Error In Download The Image"
                                class="img-fluid mx-5"
                                width="80"
                            />
                            <img
                                src="assets/img/national.png"
                                alt="Error In Download The Image"
                                class="img-fluid"
                                width="100"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Social Media -->

@endsection
