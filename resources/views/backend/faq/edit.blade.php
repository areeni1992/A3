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
    <h3>Faq's Edit Page</h3>
    <form action="{{ route('updateFaqName', $faq->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class='row d-flex'>
            @foreach( config('app.languages') as $key => $lang)
                <div class="col-md-6 @if($key == 'ar') {{ 'text-end' }} @endif">
                    <h4>{{ $lang }}</h4>
                    <!-- title  -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="{{$key}}[faq_name]"> {{ __('words.title') }} </label>
                        <input type="text" id="{{$key}}[faq_name]" name="{{$key}}[faq_name]" value="{{$faq->translate($key)->faq_name}}" class="form-control"/>
                    </div>
                </div>
            @endforeach
        </div>

        <input type="hidden" name="publish_for" value="user" />
        <button type="submit" class="btn btn-primary btn-sm w-25 mb-4 mx-auto d-block">Save</button>
    </form>
@endsection
