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
    <h3>Faq's Settings Page</h3>
    <form action="{{ route('updateQuestion', $question->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class='row d-flex'>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Select FAQ's Categories</label>
                </div>
                <select name="parent_id" class="custom-select" id="inputGroupSelect01">
                    @foreach($faqs as $faq)
                        <option value="{{ $faq->id }}" @if($faq->id == $question->parent_id) selected @endif>{{ $faq->translate(app()->getLocale())->faq_name }}</option>
                    @endforeach
                </select>
            </div>
            @foreach( config('app.languages') as $key => $lang)
                <div class="col-md-6 @if($key == 'ar') {{ 'text-end' }} @endif">
                    <h4>{{ $lang }}</h4>
                    <!-- Question  -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="{{$key}}[question]"> Question </label>
                        <input type="text" id="{{$key}}[question]" value="{{ $question->translate($key)->question }}" class="form-control" name="{{$key}}[question]"/>
                    </div>
                    <!-- answer  -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="{{$key}}[answer]"> Answer </label>
                        <textarea id="{{$key}}[answer]" class="form-control" name="{{$key}}[answer]" cols="30" rows="10">{{ $question->translate($key)->answer }}</textarea>
                    </div>
                </div>
            @endforeach
        </div>

        <input type="hidden" name="publish_for" value="user" />
        <button type="submit" class="btn btn-primary btn-sm w-25 mb-4 mx-auto d-block">Save</button>
    </form>
@endsection
