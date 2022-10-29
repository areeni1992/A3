@extends('backend.index')

@section('content')
    <a href="{{ route('createCategory') }}" class="btn btn-success"> create category</a>
            <div class="card my-3">
                <div class="card-header">
                    <h3>Categories</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($cats as $cat)
                            <li class="list-group-item">
                                @if($cat->parent_id == null)
                                    <div class="d-flex justify-content-between">
                                        @foreach(config('app.languages') as $key => $langs)
                                         <div class="@if($langs == 'ar' ) float-end @endif" >
                                           <span class="font-weight-bold text-danger">{{ $langs }} |</span> {{ $cat->translate($key)->name }}
                                         </div>
                                        @endforeach
                                        <div class="button-group d-flex">
                                            <a href="{{ Route('editCategory', $cat->id) }}" class="btn btn-sm btn-primary mr-1 edit-category">
                                                Edit
                                            </a>
                                            <a  href="{{ route('deleteCategory', $cat->id) }}" class="btn btn-sm btn-danger">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                @if ($cat->subcategory)
                                    <ul class="list-group mt-2">
                                        @foreach ($cat->subcategory as $sub)
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between">
                                                    @foreach(config('app.languages') as $key => $langs)
                                                        <div class="@if($langs == 'ar' ) float-end @endif" >
                                                            <span class="font-weight-bold text-danger">{{ $langs }} |</span> {{ $sub->translate($key)->name }}
                                                        </div>
                                                    @endforeach

                                                    <div class="button-group d-flex">
                                                        <a href="{{ Route('editCategory', $sub->id) }}" class="btn btn-sm btn-primary mr-1 edit-category">
                                                            Edit
                                                        </a>

                                                        <a href="{{ Route('deleteCategory', $sub->id) }}" class="btn btn-sm btn-danger">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
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
