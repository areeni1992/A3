@extends('backend.index')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Category</h3>
        </div>

        <form role="form" method="post" action="{{ route('updateCategory', $cats->id) }}">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Category name*</label>
                            <input type="text" name="name" class="form-control" placeholder="Category name" value="{{ $cats->name }}" required />
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Category Slug*</label>
                            <input type="text" name="slug" class="form-control" placeholder="Category name" value="{{ $cats->slug }}" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary">Edit</button>

            </div>
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

    </div>

@endsection
