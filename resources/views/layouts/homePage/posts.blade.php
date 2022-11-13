@extends('layouts.app')


@section('content')

    <section>
        <div class="post">
            <div class="container-fluid p-0">
                <div class="row box-1">
                  @if($posts)
                        @foreach ($posts as $post)
                            @foreach($img as $row)
                                @if($post->post_id == $row->id)
                                    <div class="col-md-6 p-0">
                                        <div class="box">
                                            <a href="{{ route('showPost', $row->id) }}">
                                                <div class="imgBx">
                                                    <img src="{{config('app.url').'/storage/'.$row->image}}">
                                                </div>
                                                <div class="content">
                                                    <div>
                                                        <h2>{{ $row->translate(app()->getLocale())->title }}</h2>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                  @else
                        <li class="list-group-item list-group-item-danger text-center">Not Found.</li>
                  @endif
                </div>
            </div>
        </div>
    </section>

@endsection
