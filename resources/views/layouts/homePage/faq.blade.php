@extends('layouts.app')

@section('content')
    <!-- Start Header -->
    <section>
        <header>
            <!-- Start header Title -->
            <div class="title-header" style="background-image: url({{ config('app.url').'/storage/images/'.$admin->background }}) !important;">
                <div class="container h-100 d-flex flex-column justify-content-center">
                    <h3 class="fw-bold">{{ $admin->publish_for == 'admin'  ? $admin->translate(app()->getLocale())->page_title : '' }}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ config('app.url') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $admin->publish_for == 'admin'  ? $admin->translate(app()->getLocale())->page_title : '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End header Title -->
        </header>
    </section>
    <!-- End Header -->

    <!-- Start FAQ Content -->
    <section>
        <div class="faq my-5">
            <div class="container">
                <div class="header-faq mb-5 text-center">
                    {!! $admin->desc !!}
                </div>
                <div class="nav-faq mt-5">
                    <!-- Nav tabs -->
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills rounded-3 justify-content-center" role="tablist">
                        <?php $id = request()->route('id'); ?>
                        @foreach($faqs as $faq)
                            <li class="nav-item me-3 mb-2 mb-lg-0" role="presentation">
                                <a class="nav-link @if($id == $faq->id) active @endif" href="{{ route('singleFaq', $faq->id) }}">
                                    {{ $faq->faq_name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Tab content -->
                    <div class="main-box d-flex justify-content-center">
                        <div class="box rounded-3">
                            <div class="tab-content text-muted rounded-3 p-2">
                                <div class="tab-pane container active" id="Top" role="tabpanel">
                                    <div class="accordion" id="accordionExample">
                                        <div class="row flex-lg-row-reverse">


                                            @foreach($questions as $question)
                                                @if($question->parent_id == $id)
                                                <div class="col-md-6">
                                                <div class="accordion-item border-0">
                                                    <h2 class="accordion-header rounded" id="headingOne">
                                                        <button class="btn fw-bold pt-0 p-3 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#item-1">
                                                            {{ $question->translate(app()->getLocale())->question }}
                                                            <i class="bi bi-plus fs-5"></i>
                                                        </button>
                                                    </h2>
                                                    <div id="item-1" class="accordion-collapse show collapse" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body bg-white rounded border-0 text-muted">
                                                            {{ $question->translate(app()->getLocale())->answer }}
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ Content -->

    <!-- Start Contact Info -->
    <section>
        <div class="contact-info mt-5">
            <div class="container text-center">
                <div class="row mt-4">
                    <div class="col-md-4 p-0">
                        <div class="info rounded-2 d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-telephone-fill fs-4"></i>
                            <h5 class="fw-bold">Telephone</h5>
                            <p>{{ $settings['telephone'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="email rounded-3 d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-envelope-fill fs-4"></i>
                            <h5>Email</h5>
                            <p>{{ $settings['email'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="info rounded-2 d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-4"></i>
                            <h5 class="fw-bold">WhatsApp</h5>
                            <p>{{ $settings['whatsapp'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info -->

@endsection
