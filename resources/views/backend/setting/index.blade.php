@extends('backend.index')

@section('content')
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </div>
    @endif

    @if(\Session::has('error'))
        <div>
            <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
        </div>
    @endif

    @if(\Session::has('success'))
        <div>
            <li class="alert alert-success">{!! \Session::get('success') !!}</li>
        </div>
    @endif
    <h3>settings</h3>
    <form class="row d-flex" method="post" enctype="multipart/form-data" action="{{ route('uploadSetting',  !empty($settings->id) ? $settings->id : '') }}">
        @csrf
        @method('put')
        <div class="form-row border-bottom">
            <div class="form-group col-md-6">
                <label for="logo">Logo</label>
                @if(!empty($settings->logo))
                    <img src="{{ config('app.url').'/storage/'.$settings->logo }}" class="img w-20 h-20 img-thumbnail me-3" alt="img">
                @endif
                <input type="file" class="form-control" id="logo" name="logo" placeholder="Logo">
            </div>
            <div class="form-group col-md-6">
                <label for="Quotation">quotation title</label>
                <input type="text" class="form-control" name="quotationtitle" value="@if(!empty($settings->quotationtitle)) {{ $settings->quotationtitle }} @endif" id="Quotation" placeholder="Quotation">
            </div>
            <div class="form-group col-md-6">
                <label for="quotation">quotation</label>
                <textarea class="form-control" name="quotationtext" id="quotation" rows="3">@if(!empty($settings->quotationtext)){{ $settings->quotationtext }}@endif</textarea>
            </div>
        </div>

        {{-- Social Media --}}
        <h4 class="border-bottom border-dark px-2 py-3 mt-4">Social Media</h4>
        <div class="form-row border d-flex p-3">
            <div class="col-md-6 p-2 me-2">
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" value="@if(!empty($settings->facebook)) {{ $settings->facebook }} @endif"  name="facebook" id="facebook" placeholder="Facebook">
                </div>
                <div class="form-group">
                    <label for="Twitter">Twitter</label>
                    <input type="text" class="form-control" value="@if(!empty($settings->twitter)) {{ $settings->twitter }} @endif" name="twitter" id="Twitter" placeholder="Twitter">
                </div>
                <div class="form-group">
                    <label for="Instagram">Instagram</label>
                    <input type="text" class="form-control" value="@if(!empty($settings->instagram)) {{ $settings->instagram }} @endif" name="instagram" id="Instagram" placeholder="Instagram">
                </div>
            </div>
            <div class="col-md-6 p-2">
                <div class="form-group">
                    <label for="LinkedIn">LinkedIn</label>
                    <input type="text" class="form-control" value="@if(!empty($settings->linkedin)) {{ $settings->linkedin }} @endif" name="linkedin" id="LinkedIn" placeholder="LinkedIn">
                </div>
                <div class="form-group">
                    <label for="Google">Google</label>
                    <input type="text" class="form-control" value="@if(!empty($settings->google)) {{ $settings->google }} @endif" name="google" id="Google" placeholder="Google">
                </div>
            </div>
        </div>

        {{-- Social Media--}}
        <h4 class="border-bottom border-dark px-2 py-3 mt-4">Contact Info</h4>
        <div class="form-row border d-flex p-3">
            <div class="col-md-6 p-2">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="@if(!empty($settings->email)) {{ $settings->email }} @endif" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="Telephone">Telephone</label>
                    <input type="text" class="form-control" value="@if(!empty($settings->telephone)) {{ $settings->telephone }} @endif" name="telephone" id="Telephone" placeholder="Telephone">
                </div>
                <div class="form-group">
                    <label for="WhatsApp">WhatsApp</label>
                    <input type="text" class="form-control" value="@if(!empty($settings->whatsapp)) {{ $settings->whatsapp }} @endif" name="whatsapp" id="WhatsApp" placeholder="WhatsApp">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm w-25 mb-4 mx-auto d-block">Save</button>
    </form>
@endsection
