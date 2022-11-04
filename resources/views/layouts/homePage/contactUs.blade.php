@extends('layouts.app')


@section('content')
    <section>
        <div class="message my-5">
            <div class="container">
                <h3 class="text-center mb-5 pt-4 fw-bold">YOU CAN SEND MESSAGE</h3>
                <form action="{{ route('contactPage') }}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <input type="email" placeholder="Your Mail" name="user_email" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('user_email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
{{--                    <div class="col-md-6">--}}
{{--                        <select class="form-select mb-3 text-muted border-0 shadow-sm p-3">--}}
{{--                            <option class="option">Get Assistance With</option>--}}
{{--                            <option value="1">One</option>--}}
{{--                            <option value="2">Two</option>--}}
{{--                            <option value="3">Three</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <div class="col-md-6">
                        <input type="text" placeholder="order Number" name="order_number" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('order_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <input type="text" placeholder="Phone Number" name="phone_number" class="form-control mb-3 border-0 shadow-sm p-3">
                        @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-lg-12">
              <textarea name="message" placeholder="Description \ We Are Here To Assist You! A Member Of Out Team Will Give You A Response
In The Soonest Time possible" cols="30" rows="6" class="form-control mb-3 border-0 shadow-sm"></textarea>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="attachment" placeholder="Phone Number " class="form-control mb-3 border-0 shadow-sm p-2">
                        @error('attachment')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button onclick="this.parentElement.style.display = 'none';" type="button" id="closeMessage" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <h3 class="fw-bold text-center my-4">
                            Please Verify You Are A Human
                        </h3>
                    </div>
                    <div class="mx-auto w-auto my-3">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                    </div>
                    <div class="col-lg-12 text-center">
                        <input type="submit" value="Send Message" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>
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
@endsection
