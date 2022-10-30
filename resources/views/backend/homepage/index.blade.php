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
    <h3>Home Page</h3>
    <form action="{{ route('storeHomePage', !empty($homeData->id) ? $homeData->id : '') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div id="accordion-2" role="tablist" aria-multiselectable="true" class="o-accordion">
            {{--  Main Slide  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingOne-1">
                    <h5 class="mb-0">
                        <a class="text-sm d-block table-hover move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" aria-expanded="true" aria-controls="collapseOne-1">
                            Main Slider
                        </a>
                    </h5>
                </div>

                <div id="collapseOne-1" class="collapse px-3" role="tabpanel" aria-labelledby="headingOne-1">
                    <div class="card-block">

                        <div class="form-outline mb-4 w-50">
                            <label class="form-label" for="slider_image"> Image </label>
                            @if(!empty($homeData->slider_image))
                                <img src="{{ config('app.url').'/storage/images/'.$homeData->slider_image?? $homeData->slider_image }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                            @endif
                            <input type="file" id="slider_image" class="form-control" name="image[slider_image]" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        @foreach(config('app.languages') as $key => $lang)
                            <div class="row ">
                                <h4 class="text-center">
                                    <span class="px-6 bg-gradient-secondary text-white">{{ $lang }}</span>
                                </h4>
                                <div class="form-outline mb-4 col-md-6">
                                    <label class="form-label" for="slider_title"> Title </label>
                                    <input type="text" id="slider_title" value="@if(!empty($homeData->slider_title)) {{$homeData->translate($key)->slider_title}} @endif" class="form-control" name="{{$key}}[slider_title]" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                                <div class="form-outline mb-4 col-md-6">
                                    <label class="form-label" for="slider_text"> Text </label>
                                    <input type="text" id="slider_text" value="@if(!empty($homeData->slider_text)) {{$homeData->translate($key)->slider_text}} @endif" class="form-control" name="{{$key}}[slider_text]" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{--  Products Category  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingTwo-1">
                    <h5 class="mb-0">
                        <a class="text-sm collapsed d-block move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-1" aria-expanded="false" aria-controls="collapseTwo-1">
                            Select Products Category
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo-1" class="collapse" role="tabpanel" aria-labelledby="headingTwo-1">
                    <div class="card-block">
                        <!-- select category -->
                        <div class="form-group mx-auto">
                            <div class="form-check px-3">
                                <label for="category">choose category: </label>
                                <select id="category" class="form-control" name="cat_ids[1]">
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">
                                            {{ $c->name }}
                                        </option>
                                        @if(count($c->subcategory))
                                            @foreach($c->subcategory as $sub)
                                                <option @if(isset($arr[0]) && $sub->id == $arr[0]) selected @endif value="{{$sub->id}}">--{{$sub->name}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  first Page  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingThree-1">
                    <h5 class="mb-0">
                        <a class="text-sm collapsed d-block move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseThree-1" aria-expanded="false" aria-controls="collapseThree-1">
                            Insert the first Banner And specific Product
                        </a>
                    </h5>
                </div>
                <div id="collapseThree-1" class="collapse" role="tabpanel" aria-labelledby="headingThree-1">
                    <div class="card-block">
                        <!-- select Page -->
                        <div class="form-group mx-auto">
                            <div class="form-check px-3">
                                <label for="category">choose Page: </label>
                                <select id="category" class="form-control" name="page_ids[first]">
                                    @if(isset($pages))
                                        @foreach($pages as $page)
                                            <option @if(isset($arr_2['first']) ? $arr_2['first']  == $page->id : '') selected @endif value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    @endif
                                </select>

                                <div class="form-outline mb-4 w-50">
                                    <label class="form-label" for="first_banner"> Image </label>
                                    @if(!empty($homeData->first_banner))
                                        <img src="{{ config('app.url').'/storage/images/'.$homeData->first_banner ?? $homeData->first_banner }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                                    @endif
                                    <input type="file" id="first_banner" class="form-control" name="image[first_banner]" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                                @foreach(config('app.languages') as $key => $lang)
                                    <div class="row ">
                                        <h4 class="text-center">
                                            <span class="px-6 bg-gradient-secondary text-white">{{ $lang }}</span>
                                        </h4>
                                        <div class="form-outline mb-4 col-md-6">
                                            <label class="form-label" for="first_banner_text"> Text </label>
                                            <input type="text" id="first_banner_text" class="form-control" value="@if(!empty($homeData->first_banner_text)) {{$homeData->translate($key)->first_banner_text}} @endif" name="{{$key}}[first_banner_text]" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  second Page  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingThree-1">
                    <h5 class="mb-0">
                        <a class="text-sm collapsed d-block move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseFour-1" aria-expanded="false" aria-controls="collapseFour-1">
                            Insert the second Banner And specific Product
                        </a>
                    </h5>
                </div>
                <div id="collapseFour-1" class="collapse" role="tabpanel" aria-labelledby="headingThree-1">
                    <div class="card-block">
                        <!-- select Page -->
                        <div class="form-group mx-auto">
                            <div class="form-check px-3">
                                <label for="category">choose Page: </label>
                                <select id="category" class="form-control" name="page_ids[second]">
                                    @if(isset($pages))
                                    @foreach($pages as $page)
                                            <option @if(isset($arr_2['second']) ? $arr_2['second']  == $page->id : '') selected @endif value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    @endif
                                </select>

                                <div class="form-outline mb-4 w-50">
                                    <label class="form-label" for="second_banner"> Image </label>
                                    @if(!empty($homeData->second_banner))
                                        <img src="{{ config('app.url').'/storage/images/'.$homeData->second_banner?? $homeData->second_banner }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                                    @endif
                                    <input type="file" id="second_banner" class="form-control" name="image[second_banner]" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                                @foreach(config('app.languages') as $key => $lang)
                                    <div class="row ">
                                        <h4 class="text-center">
                                            <span class="px-6 bg-gradient-secondary text-white">{{ $lang }}</span>
                                        </h4>
                                        <div class="form-outline mb-4 col-md-6">
                                            <label class="form-label" for="second_banner_text"> Text </label>
                                            <input type="text" id="second_banner_text" class="form-control" value="@if(!empty($homeData->second_banner_text)) {{$homeData->translate($key)->second_banner_text}} @endif" name="{{$key}}[second_banner_text]" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- second Products Category   --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingTwo-2">
                    <h5 class="mb-0">
                        <a class="text-sm collapsed d-block move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-2" aria-expanded="false" aria-controls="collapseTwo-2">
                            Select Products Category
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo-2" class="collapse" role="tabpanel" aria-labelledby="headingTwo-2">
                    <div class="card-block">
                        <!-- select category -->
                        <div class="form-group mx-auto">
                            <div class="form-check px-3">
                                <label for="category">choose category: </label>
                                <select id="category" class="form-control" name="cat_ids[2]">
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">
                                        {{ $c->name }}
                                        </option>
                                        @if(count($c->subcategory))
                                            @foreach($c->subcategory as $sub)
                                                <option @if(isset($arr[1]) && $sub->id == $arr[1]) selected @endif value="{{$sub->id}}">--{{$sub->name}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  third Page  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingOne-2">
                    <h5 class="mb-0">
                        <a class="text-sm d-block table-hover move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne-2">
                            Insert Page
                        </a>
                    </h5>
                </div>

                <div id="collapseOne-2" class="collapse px-3" role="tabpanel" aria-labelledby="headingOne-2">
                    <div class="card-block">
                        <div class="form-outline">
                            <label for="category">choose Page: </label>
                            <select id="category" class="form-control" name="page_ids[third]">
                                @if(isset($pages))
                                    @foreach($pages as $page)
                                        <option @if(isset($arr_2['third']) ? $arr_2['third']  == $page->id : '') selected @endif value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-outline mb-4 w-40 d-inline-block me-3">
                            <label class="form-label" for="third_banner_left"> Left Image </label>
                            @if(!empty($homeData->third_banner_left))
                                <img src="{{ config('app.url').'/storage/images/'.$homeData->third_banner_left?? $homeData->third_banner_left }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                            @endif
                            <input type="file" id="third_banner_left" class="form-control" name="image[third_banner_left]" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="form-outline mb-4 w-40 d-inline-block">
                            <label class="form-label" for="third_banner_right"> Right Image </label>
                            @if(!empty($homeData->third_banner_right))
                                <img src="{{ config('app.url').'/storage/images/'.$homeData->third_banner_right?? $homeData->third_banner_right }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                            @endif
                            <input type="file" id="third_banner_right" class="form-control" name="image[third_banner_right]" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        @foreach(config('app.languages') as $key => $lang)
                            <div class="row ">
                                <h4 class="text-center">
                                    <span class="px-6 bg-gradient-secondary text-white">{{ $lang }}</span>
                                </h4>
                                <div class="form-outline mb-4 col-md-6">
                                    <label class="form-label" for="third_banner_title"> Title </label>
                                    <input type="text" id="third_banner_title" class="form-control" value="@if(!empty($homeData->third_banner_title)) {{$homeData->translate($key)->third_banner_title}} @endif" name="{{$key}}[third_banner_title]" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                                <div class="form-outline mb-4 col-md-6">
                                    <label class="form-label" for="third_banner_text"> Text </label>
                                    <input type="text" id="third_banner_text" class="form-control" value="@if(!empty($homeData->third_banner_text)) {{$homeData->translate($key)->third_banner_text}} @endif" name="{{$key}}[third_banner_text]" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{--  Products Category  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingTwo-3">
                    <h5 class="mb-0">
                        <a class="text-sm collapsed d-block move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-3" aria-expanded="false" aria-controls="collapseTwo-3">
                            Select Products Category
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo-3" class="collapse" role="tabpanel" aria-labelledby="headingTwo-3">
                    <div class="card-block">
                        <!-- select category -->
                        <div class="form-group mx-auto">
                            <div class="form-check px-3">
                                <label for="category">choose category: </label>
                                <select id="category" class="form-control" name="cat_ids[3]">
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">
                                            {{ $c->name }}
                                        </option>
                                        @if(count($c->subcategory))
                                            @foreach($c->subcategory as $sub)
                                                <option @if(isset($arr[2]) && $sub->id == $arr[2]) selected @endif value="{{$sub->id}}">--{{$sub->name}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  fourth Page  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingThree-4">
                    <h5 class="mb-0">
                        <a class="text-sm collapsed d-block move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseThree-4" aria-expanded="false" aria-controls="collapseThree-4">
                            Insert the third Banner And specific Product
                        </a>
                    </h5>
                </div>
                <div id="collapseThree-4" class="collapse" role="tabpanel" aria-labelledby="headingThree-4">
                    <div class="card-block">
                        <!-- select Page -->
                        <div class="form-group mx-auto">
                            <div class="form-check px-3">
                                <label for="category">choose Page: </label>
                                <select id="category" class="form-control" name="page_ids[last]">
                                    @if(isset($pages))
                                        @foreach($pages as $page)
                                            <option @if(isset($arr_2['last']) ? $arr_2['last']  == $page->id : '') selected @endif value="{{ $page->id}}">{{ $page->title}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                <div class="form-outline mb-4 w-50">
                                    <label class="form-label" for="fourth_banner"> Image </label>
                                    @if(!empty($homeData->fourth_banner))
                                        <img src="{{ config('app.url').'/storage/images/'.$homeData->fourth_banner?? $homeData->fourth_banner }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                                    @endif
                                    <input type="file" id="fourth_banner" class="form-control" name="image[fourth_banner]" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                                @foreach(config('app.languages') as $key => $lang)
                                    <div class="row ">
                                        <h4 class="text-center">
                                            <span class="px-6 bg-gradient-secondary text-white">{{ $lang }}</span>
                                        </h4>
                                        <div class="form-outline mb-4 col-md-6">
                                            <label class="form-label" for="fourth_banner_title"> Title </label>
                                            <input type="text" id="fourth_banner_title" class="form-control" value="@if(!empty($homeData->fourth_banner_title)) {{$homeData->translate($key)->fourth_banner_title}} @endif" name="{{$key}}[fourth_banner_title]" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                        <div class="form-outline mb-4 col-md-6">
                                            <label class="form-label" for="fourth_banner_text"> Text </label>
                                            <input type="text" id="fourth_banner_text" class="form-control" value="@if(!empty($homeData->fourth_banner_text)) {{$homeData->translate($key)->fourth_banner_text}} @endif" name="{{$key}}[fourth_banner_text]" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  Products Category  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingTwo-5">
                    <h5 class="mb-0">
                        <a class="text-sm collapsed d-block move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-5" aria-expanded="false" aria-controls="collapseTwo-5">
                            Select Products Category
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo-5" class="collapse" role="tabpanel" aria-labelledby="headingTwo-5">
                    <div class="card-block">
                        <!-- select category -->
                        <div class="form-group mx-auto">
                            <div class="form-check px-3">
                                <label for="category">choose category: </label>
                                <select id="category" class="form-control" name="cat_ids[4]">
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">
                                            {{ $c->name }}
                                        </option>
                                        @if(count($c->subcategory))
                                            @foreach($c->subcategory as $sub)
                                                <option @if(isset($arr[3]) && $sub->id == $arr[3]) selected @endif value="{{ $sub->id }}"> -- {{ $sub->name }}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  Catalog Section  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingOne-6">
                    <h5 class="mb-0">
                        <a class="text-sm d-block table-hover move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-6" aria-expanded="true" aria-controls="collapseOne-6">
                            Catalog Section
                        </a>
                    </h5>
                </div>

                <div id="collapseOne-6" class="collapse px-3" role="tabpanel" aria-labelledby="headingOne-6">
                    <div class="card-block">

                        <div class="form-outline mb-4 w-40 d-inline-block me-3">
                            <label class="form-label" for="catalog_image"> Background Image </label>
                            @if(!empty($homeData->catalog_image))
                                <img src="{{ config('app.url').'/storage/images/'.$homeData->catalog_image?? $homeData->catalog_image }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                            @endif
                            <input type="file" id="catalog_image" class="form-control" name="image[catalog_image]" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="form-outline mb-4 w-40 d-inline-block">
                            <label class="form-label" for="catalog"> Catalog File </label>
                            @if(!empty($homeData->catalog))
                                <a href="{{ config('app.url').'/storage/images/'.$homeData->catalog?? $homeData->catalog }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">Download</a>
                            @endif
                            <input type="file" id="catalog" class="form-control" name="catalog" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        @foreach(config('app.languages') as $key => $lang)
                            <div class="row ">
                                <h4 class="text-center">
                                    <span class="px-6 bg-gradient-secondary text-white">{{ $lang }}</span>
                                </h4>
                                <div class="form-outline mb-4 col-md-6">
                                    <label class="form-label" for="catalog_text"> Text </label>
                                    <input type="text" id="catalog_text" class="form-control" value="@if(!empty($homeData->catalog_text)) {{$homeData->translate($key)->catalog_text}} @endif" name="{{$key}}[catalog_text]" onfocus="focused(this)" onfocusout="defocused(this)">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{--  Products Category  --}}
            <div class="card multi my-2">
                <div class="card-header py-2 bg-secondary" role="tab" id="headingTwo-7">
                    <h5 class="mb-0">
                        <a class="text-sm collapsed d-block move-on-hover text-white" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-7" aria-expanded="false" aria-controls="collapseTwo-7">
                            Select Products Category
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo-7" class="collapse" role="tabpanel" aria-labelledby="headingTwo-7">
                    <div class="card-block">
                        <!-- select category -->
                        <div class="form-group mx-auto">
                            <div class="form-check px-3">
                                <label for="category">choose category: </label>
                                <select id="category" class="form-control" name="cat_ids[5]">
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">
                                            {{ $c->name }}
                                        </option>
                                        @if(count($c->subcategory))
                                            @foreach($c->subcategory as $sub)
                                                <option @if(isset($arr[4]) && $sub->id == $arr[4]) selected @endif value="{{$sub->id}}">--{{$sub->name}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        <button class="btn btn-pinterest">save</button>
    </form>

@endsection


