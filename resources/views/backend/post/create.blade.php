@extends('backend.index')

@section('content')
    <a class="btn btn-success" href="{{ route('posts') }}">Posts Page</a>
    <form class='row justify-content-center flex-column' action="{{ route('storePost') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="col-md-5">
            <!-- title  -->
            <div class="form-outline mb-4">
                <label class="form-label" for="title">title</label>
                <input type="text" id="title" class="form-control" name="title"/>
            </div>

            <!-- slug  -->
            <div class="form-outline mb-4">
                <label class="form-label" for="slug">slug</label>
                <input type="text" id="slug" class="form-control" name="slug"/>
            </div>
            <!-- body -->
            <div class="form-outline mb-4">
                <label class="form-label" for="body">body</label>
                <textarea class="form-control" id="myeditorinstance" rows="4" name="body"></textarea>
            </div>
            <!-- image -->
            <div class="form-outline mb-4">
                <label class="form-label" for="image">image</label>
                <input type="file" id="image" class="form-control" name="image"/>
            </div>

            <!-- select category -->
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    @if($cats)
                        @foreach($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <hr class="col-1 bg-secondary">
{{--        <div class="col-md-5">--}}
{{--            <!-- title  -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <label class="form-label" for="title">title</label>--}}
{{--                <input type="text" id="title" class="form-control" name="title"/>--}}
{{--            </div>--}}

{{--            <!-- slug  -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <label class="form-label" for="slug">slug</label>--}}
{{--                <input type="text" id="slug" class="form-control" name="slug"/>--}}
{{--            </div>--}}

{{--            <!-- body -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <label class="form-label" for="body">body</label>--}}
{{--                <textarea class="form-control" id="body" rows="4" name="body"></textarea>--}}
{{--            </div>--}}

{{--            <!-- image -->--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <label class="form-label" for="image">image</label>--}}
{{--                <input type="file" id="image" class="form-control" name="image"/>--}}
{{--            </div>--}}

{{--            <!-- select category -->--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlSelect1">Select Category</label>--}}
{{--                <select class="form-control" id="exampleFormControlSelect1" name="category_id">--}}
{{--                    @if($cats)--}}
{{--                        @foreach($cats as $cat)--}}
{{--                            <option value="{{ $cat->name}}"> {{ $cat->name }} </option>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}
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
