@extends('layouts.app')

@section('content')

    <h3 class="mx-auto text-center text-capitalize"> {{ $catId->translate(app()->getLocale())->name }}</h3>
    <nav class="nav nav--filters">
        <ul class="navbar my-4 list-unstyled d-flex justify-content-center w-100">
            @foreach($categories as $cat)
                @foreach($cat->subcategory as $sub)
                    @if($catId->id == $sub->parent_id)
                        <a href="{{ route('getSubCategories', $sub->id) }}" class="text-decoration-none">
                            <li class="btn btn-light rounded-0 px-3 text-capitalize">
                                    {{ $sub->translate(app()->getLocale())->name }}
                            </li>
                        </a>
                    @endif
                @endforeach
            @endforeach
        </ul>
    </nav>
    <!-- Start Post -->
    <section>
        <div class="post">
            <div class="container-fluid p-0">
                <div class="row box-1">
                    @foreach($categories as $cat_main)
                        {{--   Main Category Posts  --}}
                        @foreach($cat_main->posts as $post)
                            @if(request('id') == $post->category_id)
                                <div class="col-md-3 p-0">
                                        <a href="{{ route('showPost', $post->id) }}">

                                            <div class="box">
                                                <div class="imgBx">
                                                    <img src="{{ config('app.url').'/storage/'.$post->image }}" />
                                                </div>
                                                <div class="content">
                                                    <div>
                                                        <h2>{{ $post->translate(app()->getLocale())->title }}</h2>
                                                        <p>
                                                            {!! \Illuminate\Support\Str::limit($post->translate(app()->getLocale())->body) !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @foreach($cat_main->subcategory as $subcat)
                                    @foreach($subcat->posts as $post)
                                        <div class="col-md-3 p-0">
                                            <a href="{{ route('showPost', $post->id) }}">

                                                <div class="box">
                                                    <div class="imgBx">
                                                        <img src="{{ config('app.url').'/storage/'.$post->image }}" />
                                                    </div>
                                                    <div class="content">
                                                        <div>
                                                            <h2>{{ $post->translate(app()->getLocale())->title }}</h2>
                                                            <p>
                                                                {!! \Illuminate\Support\Str::limit($post->translate(app()->getLocale())->body) !!}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach

                        {{--   Sub Category Posts  --}}
                        @foreach($cat_main->subcategory as $subcat)
                            @foreach($subcat->posts as $post)
                                @if(request('id') == $post->category_id)
                                    <div class="col-md-3 p-0">
                                        <a href="{{ route('showPost', $post->id) }}">

                                            <div class="box">
                                                <div class="imgBx">
                                                    <img src="{{ config('app.url').'/storage/'.$post->image }}" />
                                                </div>
                                                <div class="content">
                                                    <div>
                                                        <h2>{{ $post->translate(app()->getLocale())->title }}</h2>
                                                        <p>
                                                            {!!\Illuminate\Support\Str::limit( $post->translate(app()->getLocale())->body) !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Post -->
@endsection
