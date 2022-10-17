@extends('backend.index')


@section('content')
    <h3>create page</h3>
    <form  action="{{ route('storePage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class='row d-flex'>
            @foreach( config('app.languages') as $key => $lang)
                    <div class="col-md-6 @if($key == 'ar') {{ 'text-end' }} @endif">
                        <h4>{{ $lang }}</h4>
                      <!-- title  -->
                      <div class="form-outline mb-4">
                          <label class="form-label" for="title"> {{ __('words.title') }} </label>
                          <input type="text" id="title" class="form-control" name="{{$key}}[title]"/>
                      </div>

                      <!-- slug  -->
                      <div class="form-outline mb-4">
                          <label class="form-label" for="slug">{{ __('words.slug') }}</label>
                          <input type="text" id="slug" class="form-control" name="{{$key}}[slug]" value="{{ old('slug') }}"/>
                      </div>
                        <!-- short -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="shortdescription">{{ __('words.shortdesc') }}</label>
                            <textarea class="form-control" id="shortdescription" name="{{$key}}[shortdesc]"></textarea>
                        </div>
                      <!-- body -->
                      <div class="form-outline mb-4">
                          <label class="form-label" for="contentt">{{ __('words.content') }}</label>
                          <textarea class="form-control" id="myeditorinstance" rows="4" name="{{$key}}[content]"></textarea>
                      </div>
                  </div>
            @endforeach
                <!-- image -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="image">{{ __('words.image') }}</label>
                    <input type="file" id="image" class="form-control" name="image"/>
                </div>

                <!-- select category -->
                <div class="form-group float-end">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="ar[status]" name="status" value="publish" checked>
                        <label class="form-check-label" for="ar[status]">publish</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="ar[status]" name="status" value="binding">
                        <label class="form-check-label" for="ar[status]">pending</label>
                    </div>
                </div>
        </div>

        <button type="submit" class="btn btn-primary btn-sm w-25 mb-4 mx-auto d-block">Save</button>
    </form>
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
@endsection
