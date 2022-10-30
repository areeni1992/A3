@extends('layouts.app')

@section('content')
    <div class="container my-4 py-3">
        <div class="row">
            <h3>{{ $post->title }}</h3>
            <div class="col-md-6">
                <p>
                    {!! $post->body !!}
                </p>
            </div>
            <div class="col-md-6">
                <img class="w-100" src="{{ config('app.url').'/storage/'.$post->image }}" alt="">
            </div>
        </div>
    </div>
@endsection
