@extends('layouts.app')

@section('content')
    <!-- Start Form Input -->
    <section>
        <header>
            <!-- Start header Title -->

            <div class="title-header" style="background-image: url({{ isset($quotData->background) ? config('app.url').'/storage/images/'.$quotData->background : '' }}) !important;">
                <div class="container h-100 d-flex flex-column justify-content-center">
                    <h3 class="fw-bold">{{ $quotData->translate(app()->getLocale())->page_title ?? '' }}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ config('app.url') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">{{ !is_null($quotData->translate(app()->getLocale())->page_title) ? $quotData->translate(app()->getLocale())->page_title : '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End header Title -->
        </header>
    </section>
    <!-- End Form Input -->

    <section>
        <div class="message py-4">
            <div class="container">
                <div class="mb-4">
                    <h5 class="h5-color text-center">{{ $quotData->translate(app()->getLocale())->page_title ?? '' }}</h5>
                    <div class="row">
                        {!! $quotData->translate(app()->getLocale())->desc ?? '' !!}
                    </div>

                </div>

                <form action="{{ route('insertRequiest') }}" method="POST" class="row shadow" enctype="multipart/form-data">
                    @csrf
                    <h5 class="text-center mb-4 h5-color">Personal Information</h5>

                    <div class="col-md-4">
                        <input type="text" name="f_name" placeholder="First Name" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="l_name" placeholder="Last Name" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-4">
                        <select name="country" name="country" id="country" class="form-select mb-3 text-muted border-0 shadow-sm p-3">
                            <option class="option" selected="" disabled="" >Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text"name="email" placeholder="E-Mail Addriss" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="mobile" placeholder="Mobile Number" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-12">
                        <input type="file" name="attachment" placeholder="Phone Number" class="form-control mb-3 border-0 shadow-sm p-2 input-file-1">
                    </div>

                    <h5 class="text-center my-2 h5-color">Basic Product Information</h5>

                    <div class="col-md-4">
                        <input type="text" name="b_name" placeholder="Business Name" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="prod_name" placeholder="Product Name" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-4">
                        <select class="form-select mb-3 text-muted border-0 shadow-sm p-3">
                            <option class="option" selected="" disabled="" name="category">Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

{{--                    <div class="col-md-4">--}}
{{--                        <select class="form-select mb-3 text-muted border-0 shadow-sm p-3">--}}
{{--                            <option class="option" selected="" disabled="">Sourcing Type</option>--}}
{{--                            <option value="1">One</option>--}}
{{--                            <option value="2">Two</option>--}}
{{--                            <option value="3">Three</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}

                    <div class="col-md-4">
                        <input type="text" name="quantity" placeholder="Quantity / Pieces" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="budget" placeholder="Max Budget" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-4">
                        <select class="form-select mb-3 text-muted border-0 shadow-sm p-3">
                            <option class="option" selected="" name="currency" disabled="">Currency</option>
                            <option value="1">USD</option>
                            <option value="2">EUR</option>
                            <option value="3">AED</option>
                            <option value="4">SAR</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <input type="text" name="details" placeholder="Details" class="form-control mb-3 border-0 shadow-sm p-3">
                    </div>

                    <div class="col-md-4">
                        <input type="file" name="second_attach" placeholder="Attachments" class="form-control mb-3 border-0 shadow-sm p-2 input-file-2">
                    </div>

                    <!-- Sourcing Purpose -->
                    <div class="col-md-12 mt-3">
                        <h5 class="fw-bold my-3">Sourcing Purpose</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sourcing_purp" value="Sports Olympic Committe" id="Committe">
                            <label class="form-check-label" for="Committe">
                                Sports Olympic Committe
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sourcing_purp" value="Clubs" id="Clubs">
                            <label class="form-check-label" for="Clubs"> Clubs </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sourcing_purp" value="Federation" id="Federation">
                            <label class="form-check-label" for="Federation">
                                Federation
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sourcing_purp" value="Government" id="Government">
                            <label class="form-check-label" for="Government">
                                Government
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sourcing_purp" value="Reseller" id="Reseller">
                            <label class="form-check-label" for="Reseller">
                                Reseller
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sourcing_purp" value="Distributor" id="Distributor">
                            <label class="form-check-label" for="Distributor">
                                Distributor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sourcing_purp" value="Others" id="Other-Sourcing">
                            <label class="form-check-label" for="Other-Sourcing">
                                Others
                            </label>
                        </div>
                    </div>

                    <!-- Shipping & Payments -->
                    <h5 class="text-center h5-color mt-3 mt-md-0">
                        Shipping &amp; Payments
                    </h5>
                    <div class="col-md-3 mt-3">
                        <h5 class="fw-bold my-3">Shipment Method</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipment_methode" value="Seaport" id="Seaport" checked="">
                            <label class="form-check-label" for="Seaport"> Seaport </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipment_methode" value="Airport" id="Airport">
                            <label class="form-check-label" for="Airport"> Airport </label>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <h5 class="fw-bold my-3">
                            Prefrred Shipment &amp; Pricing Conditions
                        </h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipment_price" value="FOB" id="FOB" checked="">
                            <label class="form-check-label" for="FOB"> FOB </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="shipment_price" value="CIF" id="CIF">
                            <label class="form-check-label" for="CIF"> CIF </label>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <h5 class="fw-bold my-3">Source Purpose</h5>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="source_purp" value="Cash" id="Cash" checked="">
                            <label class="form-check-label" for="Cash"> Cash </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="source_purp" value="Cheque" id="Cheque">
                            <label class="form-check-label" for="Cheque"> Cheque </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="source_purp" value="Bank Transfer" id="Bank">
                            <label class="form-check-label" for="Bank">
                                Bank Transfer
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="source_purp" value="Other" id="Other-Purpose">
                            <label class="form-check-label" for="Other-Purpose">
                                Other
                            </label>
                        </div>
                    </div>

                    <!-- Privacy Policy -->
                    <div class="col-md-3 mt-3">
                        <h5 class="fw-bold">Contact Information's</h5>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contact_info" value="Phone" id="Phone" checked="">
                            <label class="form-check-label" for="Phone"> Phone </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contact_info" value="E-Mail" id="email">
                            <label class="form-check-label" for="email"> E-Mail </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="contact_info" value="Other" id="Other-Contact">
                            <label class="form-check-label" for="Other-Contact">
                                Others
                            </label>
                        </div>
                    </div>

                    <div class="col-md-9 mt-3">
                        <h5 class="fw-bold">Time Period Of Receiving Goods (In Days)</h5>

                        <input class="form-control border-0 p-3 w-50 shadow-sm mt-4" type="text" name="time_period" placeholder="Number Of Days">
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="form-check">
                            <input class="form-check-input" name="agree" type="checkbox" value="no" id="agree">
                            <label class="form-check-label fw-bold label" for="agree">
                                I Agree To Share My Buisness Card With Your Company</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="read" type="checkbox" value="yes" id="read">
                            <label class="form-check-label fw-bold label" for="read">
                                I Have Read, Understood And Agreed To Abide By The Buying
                                Request Posting Rules
                            </label>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button onclick="this.parentElement.style.display = 'none';" type="button" id="closeMessage" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if(\Session::has('error'))
                        <div>
                            <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                        </div>
                    @endif
                    <div class="col-lg-12 text-center mt-5">
                        <input type="submit" value="Submit" class="btn">
                    </div>
                </form>
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
                            <h5 class="fw-bold">{{ __('words.Telephone') }}</h5>
                            <p>{{ $settings['telephone'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="email rounded-3 d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-envelope-fill fs-4"></i>
                            <h5>{{ __('words.email') }}</h5>
                            <p>{{ $settings['email'] }}</p>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <div class="info rounded-2 d-flex flex-column justify-content-center align-items-center">
                            <i class="bi bi-whatsapp fs-4"></i>
                            <h5 class="fw-bold">{{ __('words.whatsapp') }}</h5>
                            <p>{{ $settings['whatsapp'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info -->

@endsection
