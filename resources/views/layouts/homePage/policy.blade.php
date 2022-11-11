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

    <section>
        <div class="policy my-5">
            <div class="container">
                <div class="header-policy mb-5">
                    <p class="text-center color fs-5">{{ $admin->publish_for == 'admin'  ? $admin->translate(app()->getLocale())->page_title : '' }}</p>
                    <dev class="text-center fw-bold">
                        {!! $admin->publish_for == 'admin'  ? $admin->translate(app()->getLocale())->desc : '' !!}
                    </dev>
                </div>
                <div class="nav-policy mt-5">
                    <!-- Nav tabs -->
                    <div class="d-flex justify-content-center">
                        <ul class="nav nav-pills rounded-3 justify-content-center" role="tablist">
                            <?php $id = request()->route('id'); ?>
                            @foreach($pols as $row)

                                <a class="nav-link @if($id == $row->id) active @endif mx-2" href="{{ route('singlePolicy', $row->id) }}">
                                    <li class="nav-item me-3 mb-2 mb-lg-0" role="presentation">
                                        {{ $row->translate(app()->getLocale())->policy_name }}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Tab content -->
                    <div class="main-box d-flex justify-content-center">
                        @foreach($pols as $row)

                        @if($id == $row->id)
                        <div class="box rounded-3">
                            <h4 class="fw-bold">{{ $row->translate(app()->getLocale())->policy_name }}</h4>
                            <div class="tab-content bg-white text-muted rounded-3 p-2 mt-3">
                                <div class="tab-pane container  active show" role="tabpanel">
                                    {{ $row->translate(app()->getLocale())->policy_content }}
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start policy Content -->
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
    <!-- End policy Content -->

@endsection
