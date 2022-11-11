@extends('backend.index')

@section('content')
    <h4>Questions & Answers</h4>
    <a href="{{ route('createQuestion') }}" class="btn btn-secondary"> Create FAQ's Questions & Answers </a>


    <div class="card-body">
        <ul class="list-group">
            @foreach ($questions as $question)
                <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            @if(isset($question))
                            @foreach(config('app.languages') as $key => $langs)
                                <div class="@if($langs == 'ar' ) float-end @endif" >
                                    <span class="font-weight-bold text-danger">{{ $langs }} |</span> {{ $question->translate($key)->question }}
                                    <hr>
                                    <span class="font-weight-bold text-danger">{{ $langs }} |</span> {{ $question->translate($key)->answer }}
                                </div>
                            @endforeach
                            @endif
                            <div class="button-group d-flex">
                                <form action="{{ route('editQuestion', $question->id) }}" method="get">
                                    <button class="btn btn-primary">Edit</button>
                                </form>
                                <form action="{{ route('deleteQuestion', $question->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
