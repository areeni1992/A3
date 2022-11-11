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
    <h3>Policy Edit Page</h3>
    <form action="{{ route('updatePolicy', $faq->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class='row d-flex'>
            @foreach( config('app.languages') as $key => $lang)
                <div class="col-md-6 @if($key == 'ar') {{ 'text-end' }} @endif">
                    <h4>{{ $lang }}</h4>
                    <!-- title  -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="{{$key}}[policy_name]"> Policy Name </label>
                        <input type="text" id="{{$key}}[policy_name]" name="{{$key}}[policy_name]" value="{{$faq->translate($key)->policy_name}}" class="form-control"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="{{$key}}[policy_content]"> Policy Content </label>
                        <textarea id="{{$key}}[policy_content]" class="form-control" name="{{$key}}[policy_content]" cols="30" rows="10">{{$faq->translate($key)->policy_content}}</textarea>
                    </div>
                </div>
            @endforeach
        </div>

        <input type="hidden" name="publish_for" value="user" />
        <button type="submit" class="btn btn-primary btn-sm w-25 mb-4 mx-auto d-block">Save</button>
    </form>
@endsection
