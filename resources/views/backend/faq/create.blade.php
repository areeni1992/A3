@extends('backend.index')


@section('content')
    <h4>Create a Question & Answer</h4>
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
    <form  action="{{ route('faqSettingData', $faqtData->id ?? '' ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(!empty($faqtData)) <input type="hidden" name="_method" value="PUT">@endif
        <div class='row d-flex'>
            @foreach( config('app.languages') as $key => $lang)
                <div class="col-md-6 @if($key == 'ar') {{ 'text-end' }} @endif">
                    <h4>{{ $lang }}</h4>
                    <!-- title  -->
                    <input type="hidden" name="publish_for" value="admin">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="title"> {{ __('words.title') }} </label>
                        <input type="text" id="page_title" class="form-control" name="{{$key}}[page_title]" value="{{ isset($faqtData) ? $faqtData->translate($key)->page_title : '' }}"/>
                    </div>

                    <!-- short -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="shor_desc">{{ __('words.shortdesc') }}</label>
                        <textarea class="form-control" id="short_desc" name="{{$key}}[short_desc]">{{ isset($faqtData) ? $faqtData->translate($key)->short_desc : '' }}</textarea>
                    </div>
                    <!-- body -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="description">{{ __('words.content') }}</label>
                        <textarea class="form-control" id="myeditorinstance" rows="4" name="{{$key}}[desc]">{{ isset($faqtData) ? $faqtData->translate($key)->desc : '' }}</textarea>
                    </div>
                </div>
            @endforeach

            <!-- image -->
            <div class="w-40 h-25">
                <img class="w-100" src="{{ isset($faqtData) ? config('app.url').'/storage/images/'.$faqtData->background : '' }}" alt="">
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="background">{{ __('words.image') }}</label>
                <input type="file" id="background" class="form-control" name="background"/>
            </div>

        </div>

        <button type="submit" class="btn btn-primary btn-sm w-25 mb-4 mx-auto d-block">Save</button>
    </form>

@endsection
