@extends('backend.index')

@section('content')

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
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Category</h3>
        </div>

        <form role="form" method="post">
            {{csrf_field()}}
            <div class="box-body">
                <div class="row">
                    @foreach( config('app.languages') as $key => $lang)
                        <div class="col-md-6 @if($key == 'ar') {{ 'text-end' }} @endif">
                            <h4>{{ $lang }}</h4>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="{{$key}}[name]" class="form-control" placeholder="Category name" value="{{old('name')}}" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category Slug*</label>
                                    <input type="text" name="{{$key}}[slug]" class="form-control" placeholder="Category name" value="{{old('slug')}}" required />
                                </div>
                            </div>

                        </div>
                    @endforeach
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Select parent category*</label>
                                <select type="text" name="parent_id" class="form-control">
                                    <option value="">None</option>
                                    @if($categories)
                                        @foreach($categories as $category)
                                                <?php $dash=''; ?>
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @if(count($category->subcategory))
                                                {{ $category->subcategory }}
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>

            </div>
        </form>

    </div>

@endsection
