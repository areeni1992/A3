@extends('backend.index')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Post</h3>
        </div>
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
        <form role="form" method="post" action="{{ route('updatePost', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Post Title*</label>
                            <input type="text" name="title" class="form-control" placeholder="Category name" value="{{ $post->title }}" required />
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Post Slug*</label>
                            <input type="text" name="slug" class="form-control" placeholder="Category name" value="{{ $post->slug }}" required />
                        </div>
                    </div>

                    <!-- image -->
                    <div class="form-outline mb-4 d-flex flex-column">
                        <label class="form-label" for="image">image</label>
                        <img src="{{ config('app.url').'/storage/'.$post->image }}" class="img w-20 h-20 img-thumbnail me-3" alt="img">
                        <input type="file" id="image" class="form-control" name="image"/>
                    </div>

                    <!-- select category -->
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Change Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @if($cats)
                                @foreach($cats as $cat)
                                    <option value="{{ $cat->id }}" @if($cat->id == $post->category_id) selected @endif>{{ $cat->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- body -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="body">body</label>
                        <textarea class="form-control" id="myeditorinstance" rows="4" name="body">{{ $post->body }}</textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary">Edit</button>

            </div>
        </form>

    </div>

@endsection
