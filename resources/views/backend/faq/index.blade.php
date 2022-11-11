@extends('backend.index')

@section('content')
    <h4>FAQ's</h4>
    <a href="{{ route('faqName') }}" class="btn btn-secondary"> Create FAQ's Categories </a>


    <div class="card-body">
        <ul class="list-group">
            @foreach ($faqs as $faq)
                <li class="list-group-item">
                    @if($faq !== null)
                        <div class="d-flex justify-content-between">
                            @foreach(config('app.languages') as $key => $langs)
                                <div class="@if($langs == 'ar' ) float-end @endif" >
                                    <span class="font-weight-bold text-danger">{{ $langs }} |</span> {{ $faq->translate($key)->faq_name }}
                                </div>
                            @endforeach
                            <div class="button-group d-flex">
                                <form action="{{ route('editFaqName', $faq->id ?? '') }}" method="get">
                                    <button class="btn btn-primary">Edit</button>
                                </form>
                                <form action="{{ route('deleteFaqName', $faq->id ?? '') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
