@extends('layouts.app')


@section('content')

    <section>
        <header>
            <!-- Start header Title -->

            <div class="title-header" style="background-image: url({{ isset($agentsData->background) ? config('app.url').'/storage/images/'.$agentsData->background : '' }}) !important;">
                <div class="container h-100 d-flex flex-column justify-content-center">
                    <h3 class="fw-bold">{{  $agentsData->translate(app()->getLocale())->page_title ?? '' }}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ config('app.url') }}">{{ __('words.Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ $agentsData->translate(app()->getLocale())->page_title ?? '' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End header Title -->
        </header>
    </section>
<!-- End Header -->

<!-- Start Form Input -->
<section>
    <div class="message py-5">
        <div class="container">
            <h3 class="fw-bold">{{ $agentsData->translate(app()->getLocale())->page_title ?? '' }}</h3>
            <p class="text-muted">
                {!! $agentsData->translate(app()->getLocale())->desc ?? '' !!}
            </p>

            <form action="{{ route('requestAgent') }}" method="POST" class="row" enctype="multipart/form-data">
                @csrf
                <h5 class="text-center mb-4 h5-color">{{ __('words.NAME OF THE COMPANY/STORE') }}</h5>
                <div class="col-md-4">
                    <input type="text" name="name_of_the_company[]" placeholder="{{ __('words.Company Name') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('name_of_the_company.1'))
                    <div class="alert alert-danger">{{ $errors->first('name_of_the_company.1') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="name_of_the_company[]" placeholder="{{ __('words.Working Hours') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('name_of_the_company.2'))
                    <div class="alert alert-danger">{{ $errors->first('name_of_the_company.2') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="name_of_the_company[]" placeholder="{{ __('words.Working Days') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('name_of_the_company.3'))
                    <div class="alert alert-danger">{{ $errors->first('name_of_the_company.3') }}</div>
                @endif
                <h5 class="text-center my-4 h5-color mt-3">{{ __('words.(office) ADDRESS') }}</h5>
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('House No.') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.1'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.1') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('words.Street Name') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.2'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.2') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('words.Postal Code') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.3'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.3') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('words.City') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.4'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.4') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('words.Region') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.5'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.5') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('words.Country') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.6'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.6') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('words.Shop Size') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.7'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.7') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('words.How Many Branches') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.8'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.8') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="office_address[]" placeholder="{{ __('words.How Many Brands Currently In Your Hand') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('office_address.9'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.9') }}</div>
                @endif
                <h5 class="text-center my-2 h5-color mt-3">{{ __('words.BILLING/S ADDRESS') }}</h5>

                <div class="col-md-4">
                    <input type="text" name="billing_address[]" placeholder="{{ __('words.Telephone No./S') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('billing_address.1'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.1') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="billing_address[]" placeholder="{{ __('words.Contact Person/S') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('billing_address.2'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.2') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="billing_address[]" placeholder="{{ __('words.Designation/Title') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('billing_address.3'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.3') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="billing_address[]" placeholder="{{ __('words.Fax No.') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('billing_address.4'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.4') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="billing_address[]" placeholder="{{ __('words.Email Address') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('billing_address.5'))
                    <div class="alert alert-danger">{{ $errors->first('office_address.5') }}</div>
                @endif
                <h5 class="text-center my-2 h5-color mt-3">{{ __('words.SHIPPING ADDRESS') }}</h5>
                <div class="col-md-4">
                    <input type="text" name="shipping_address[]" placeholder="{{ __('words.House No.') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('shipping_address.1'))
                    <div class="alert alert-danger">{{ $errors->first('shipping_address.1') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="shipping_address[]" placeholder="{{ __('words.Street Name') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('shipping_address.2'))
                    <div class="alert alert-danger">{{ $errors->first('shipping_address.2') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="shipping_address[]" placeholder="{{ __('words.Postal Code') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('shipping_address.3'))
                    <div class="alert alert-danger">{{ $errors->first('shipping_address.3') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="shipping_address[]" placeholder="{{ __('words.City') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('shipping_address.4'))
                    <div class="alert alert-danger">{{ $errors->first('shipping_address.4') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="shipping_address[]" placeholder="{{ __('words.Region') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('shipping_address.5'))
                    <div class="alert alert-danger">{{ $errors->first('shipping_address.5') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="shipping_address[]" placeholder="{{ __('words.Country') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('shipping_address.6'))
                    <div class="alert alert-danger">{{ $errors->first('shipping_address.6') }}</div>
                @endif
                <div class="col-md-12">
                    <input type="text" name="shipping_address[]" placeholder="{{ __('words.Website') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('shipping_address.7'))
                    <div class="alert alert-danger">{{ $errors->first('shipping_address.7') }}</div>
                @endif
                <!-- Sourcing Purpose -->
                <div class="col-md-4 mt-3">
                    <h5 class="fw-bold my-3">{{ __('words.BUSINESS ORGANIZATION') }}</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Sports Olympic Committe" name="business_organiz" id="Committe">
                        <label class="form-check-label" for="Committe">
                        {{ __('words.Sports Olympic Committee') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Clubs" name="business_organiz" id="Clubs">
                    <label class="form-check-label" for="Clubs"> {{ __('words.Clubs') }} </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Federation" name="business_organiz" id="Federation">
                    <label class="form-check-label" for="Federation">
                        {{ __('words.Federation') }}
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Government" name="business_organiz" id="Government">
                <label class="form-check-label" for="Government">
                {{ __('words.Government') }}
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" value="Reseller" name="business_organiz" id="Reseller">
            <label class="form-check-label" for="Reseller">
            {{ __('words.Reseller') }}
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Distributor" name="business_organiz" id="Distributor">
        <label class="form-check-label" for="Distributor">
        {{ __('words.Distributor') }}
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" type="radio" value="Others" name="business_organiz" id="Other-Sourcing">
    <label class="form-check-label" for="Other-Sourcing">
    {{ __('words.Others') }}
</label>
</div>
</div>
@error('business_organiz')
<div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold my-3">{{ __('words.TYPE OF Buyer') }}</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Seaport" name="type_of_buyer" id="TYPE1" checked="">
                        <label class="form-check-label" for="TYPE1"> {{ __('words.Seaport') }} </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Airport" name="type_of_buyer" id="TYPE2">
                        <label class="form-check-label" for="TYPE2"> {{ __('words.Airport') }} </label>
                    </div>
                </div>
                @error('type_of_buyer')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold my-3">{{ __('words.PAYMENT METHOD') }}</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Cash" name="payment_method" id="Cash" checked="">
                        <label class="form-check-label" for="Cash"> {{ __('words.Cash') }} </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Cheque" name="payment_method" id="Cheque">
                        <label class="form-check-label" for="Cheque"> {{ __('words.Cheque') }} </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Bank Transfer" name="payment_method" id="Bank">
                        <label class="form-check-label" for="Bank">
                        {{ __('words.Bank Transfer') }}
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Other" name="payment_method" id="Other-Purpose">
                    <label class="form-check-label" for="Other-Purpose">
                    {{ __('words.Others') }}
                </label>
            </div>
        </div>
        @error('payment_method')
        <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-md-2 mt-3">
                    <h5 class="fw-bold my-3">{{ __('words.CURRENCY') }}</h5>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="UAE Dirham (AED)" name="currency" id="AED" checked="">
                        <label class="form-check-label" for="AED">
                        {{ __('words.UAE Dirham (AED)') }}
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" value="US Dollar (USD)" name="currency" id="USD">
                    <label class="form-check-label" for="USD">
                    {{ __('words.US Dollar (USD)') }}
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" value="European Euro (EU)" name="currency" id="EU">
                <label class="form-check-label text-nowrap" for="EU">
                {{ __('words.European Euro (EU)') }}
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" value="Others" name="currency" id="Other-pay">
            <label class="form-check-label" for="Other-pay"> {{ __('words.Others') }} </label>
        </div>
    </div>
    @error('currency')
    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <h5 class="text-center my-4 h5-color mt-3">{{ __('words.BANK DETAILS') }}</h5>
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Bank Name') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.1'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.1') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Bldg. And Street') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.2'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.2') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.City') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.3'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.3') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Country') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.4'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.4') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Postal Code') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.5'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.5') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Country') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.6'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.6') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Bank Account Name') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.7'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.7') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Bank Account No.') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.8'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.8') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Swift Code') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.9'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.9') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="{{ __('words.Iban Number') }}" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.10'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.10') }}</div>
                @endif
                <div class="col-md-4">
                    <input type="text" name="bank_details[]" placeholder="VAT" class="form-control mb-3 border-0 shadow-sm p-3">
                </div>
                @if ($errors->has('bank_details.11'))
                    <div class="alert alert-danger">{{ $errors->first('bank_details.11') }}</div>
                @endif
                <!-- Privacy Policy -->

                <h5 class="fw-bold mt-5 mb-0">
            {{ __('words.Key Personnel & Contacts (Authorized To Sign And Accept PO/Contracts & Other Commercial Documents)') }}
        </h5>
        <div class="col-md-4">
            <input name="key_personnel_contact[]" class="form-control border-0 p-3 shadow-sm mt-4" type="text" placeholder="{{ __('words.Name') }}">
        </div>
        @if ($errors->has('key_personnel_contact.1'))
            <div class="alert alert-danger">{{ $errors->first('key_personnel_contact.1') }}</div>
                @endif
                <div class="col-md-4">
                    <input name="key_personnel_contact[]" class="form-control border-0 p-3 shadow-sm mt-4" type="text" placeholder="{{ __('words.Title/Position') }}">
                </div>
                @if ($errors->has('key_personnel_contact.2'))
                    <div class="alert alert-danger">{{ $errors->first('key_personnel_contact.2') }}</div>
                @endif
                <div class="col-md-4">
                    <input name="key_personnel_contact[]" class="form-control border-0 p-3 shadow-sm mt-4" type="text" placeholder="{{ __('words.Signature') }}">
                </div>
                @if ($errors->has('key_personnel_contact.3'))
                    <div class="alert alert-danger">{{ $errors->first('key_personnel_contact.3') }}</div>
                @endif
                <h5 class="fw-bold mt-5 mb-0">{{ __('words.ORDERS INFORMATION') }}</h5>
                <div class="col-md-12">
                    <input name="order_info" class="form-control border-0 p-3 shadow-sm mt-4" type="text" placeholder="{{ __('words.Forwarder Name: ') }}">
                </div>
                @error('order_info')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-md-4 mt-3">
                    <h5 class="fw-bold my-3">{{ __('words.Shipment Method') }}</h5>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Via Air. Time Period Of Receiving Goods" name="shipment_method" id="Vis-Air" checked="">
                        <label class="form-check-label" for="Vis-Air">
                        {{ __('words.Via Air. Time Period Of Receiving Goods') }}
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" value="Via Sea. Time Period Of Receiving Goods" name="shipment_method" id="Vis-Sea">
                    <label class="form-check-label" for="Vis-Sea">
                    {{ __('words.Via Sea. Time Period Of Receiving Goods') }}
                </label>
            </div>
        </div>
        @error('shipment_method')
        <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold my-3">{{ __('words.Ports Of Shipment') }}</h5>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Seaport" name="port_of_shipment" id="Ports1" checked="">
                        <label class="form-check-label" for="Ports1"> {{ __('words.Seaport') }} </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Airport" name="port_of_shipment" id="Ports2">
                        <label class="form-check-label" for="Ports2"> {{ __('words.Airport') }} </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Other" name="port_of_shipment" id="Other-Ports">
                        <label class="form-check-label" for="Other-Ports">
                        {{ __('words.Others') }}
                    </label>
                </div>
            </div>
            @error('port_of_shipment')
            <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="col-md-5 mt-3">
                    <h5 class="fw-bold my-3">
                        {{ __('words.preferred Shipment And Pricing Conditions:') }}
                    </h5>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="FOB" name="preferred_shipment_pricing" id="preferred1" checked="">
                        <label class="form-check-label" for="preferred1"> FOB </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="CIF" name="preferred_shipment_pricing" id="preferred2">
                        <label class="form-check-label" for="preferred2"> CIF </label>
                    </div>
                </div>

                <div class="col-md-12 my-4">
                    <input type="file" name="attachment" class="form-control mb-3 border-0 shadow-sm">
                </div>

                <p class="title-boxes fs-5">
                    <span class="h5-color fw-bold">{{ __('words.Note: ') }}</span> {{ __('words.Official Confirmation/ Declaration/Information Will Only Be Done By The Authorized Person/S Via Authorized Emails.') }}
                </p>

                <div class="col-lg-12 text-center mt-5">
                    <input type="submit" value="Submit" class="btn">
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End Form Input -->

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
