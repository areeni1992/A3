@extends('layouts.app')
@section('content')
    <section>
    <header>
        <!-- Start header Title -->
        <div class="title-header" style="background-image: url({{ config('app.url').'/storage/'.$slug->image }})">
            <div class="container h-100 d-flex flex-column justify-content-center">
                <h3>{{ $slug->translate(app()->getLocale())->title }}</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $slug->translate(app()->getLocale())->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End header Title -->
    </header>
</section>
<!-- End Header -->

<section>
    <div class="container">
        <div class="row py-3">
            <h3>{{ $slug->translate(app()->getLocale())->title }}</h3>
            <p>
                {!! $slug->translate(app()->getLocale())->content !!}
            </p>
        </div>
    </div>
</section>

<!-- Start Contact Info -->
<section>
    <div class="contact-info mt-5">
        <div class="container text-center">
            <div class="row mt-4">
                <div class="col-md-4 p-0">
                    <div class="info rounded-2 d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-telephone-fill fs-4"></i>
                        <h5 class="fw-bold">Telephone</h5>
                        <p>+9710 50 528 4577</p>
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="email rounded-3 d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-envelope-fill fs-4"></i>
                        <h5>Email</h5>
                        <p>info@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class="info rounded-2 d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-whatsapp fs-4"></i>
                        <h5 class="fw-bold">WhatsApp</h5>
                        <p>+9710 50 528 4577</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Info -->

@endsection
