@extends('backend.index')

@section('content')
    <h3>create Product</h3>
    <form  action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
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
        <div class='row d-flex'>
            @foreach( config('app.languages') as $key => $lang)
                <div class="col-md-6 @if($key == 'ar') {{ 'text-end' }} @endif">
                    <h4>{{ $lang }}</h4>
                    <!-- name  -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="name"> {{ __('words.title') }} </label>
                        <input type="text" id="title" class="form-control" name="{{$key}}[name]"/>
                    </div>
                    <!-- slug  -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="slug">{{ __('words.slug') }}</label>
                        <input type="text" id="slug" class="form-control" name="{{$key}}[slug]" value="{{ old('slug') }}"/>
                    </div>
                    <!-- body -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="desc">{{ __('words.content') }}</label>
                        <textarea class="form-control" id="myeditorinstance" rows="4" name="{{$key}}[desc]"></textarea>
                    </div>
                </div>
            @endforeach
                <div class="form-outline mb-4">
                    <label class="form-label" for="price"> {{ __('words.price') }} </label>
                    <input type="text" id="title" class="form-control" name="price"/>
                </div>
            <!-- image -->
            <div class="form-outline mb-4">
                <label class="form-label" for="image">{{ __('words.image') }}</label>
                <input type="file" id="image" class="form-control" name="image"/>
            </div>

            <!-- select category -->
            <div class="form-group float-end">
                <div class="form-check">
                    <label for="category">choose category: </label>
                    <select id="category" class="form-control" name="parent_id">
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">
                            {{ $c->name }}
                                @if(count($c->subcategory))
                                    @foreach($c->subcategory as $sub)
                                        <option value="{{ $sub->id }}"> -- {{ $sub->name }}</option>
                                    @endforeach
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-sm w-25 mb-4 mx-auto d-block">Save</button>
    </form>

@endsection
