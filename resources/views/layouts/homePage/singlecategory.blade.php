@extends('layouts.app')

@section('content')

    <h3 class="mx-auto text-center text-capitalize"> {{ $catId->name }}</h3>
    <nav class="nav nav--filters">
        <ul class="navbar my-4 list-unstyled d-flex justify-content-center w-100">
            @foreach($categories as $cat)
                @foreach($cat->subcategory as $sub)
                    @if($catId->id == $sub->parent_id)
                        <li class="btn btn-light rounded-0 px-3 text-capitalize">
                            {{ $sub->translate(app()->getLocale())->name }}
                        </li>
                    @endif
                @endforeach
            @endforeach
        </ul>
    </nav>
@endsection
