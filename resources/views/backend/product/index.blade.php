@extends('backend.index')

@section('content')
    <a href="{{ route('createProduct') }}" class="btn btn-success"> Create Product </a>
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
    <div class="row mb-6">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm w-35 ms-auto">
                            <input type="text" name="table_search" class="form-control float-start" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default m-0">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap text-center table-hover table-striped">
                        <thead>
                        <tr class="bg-secondary text-light">
                            <th>#</th>
                            <th>{{ __('words.title') }}</th>
                            <th>{{ __('words.image') }}</th>
                            <th>{{ __('words.price') }}</th>
                            <th>{{ __('words.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="align-middle">

                        <?php $i = 1; ?>
                        @foreach($products as $product)
                            {{--                            @if($page->title !== null)--}}
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{ config('app.url').'/storage/'.$product->image }}" class="img w-40 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                                </td>
                                <td><span class="tag tag-success">{{ $product->price }}</span></td>
                                <td>
                                    <a href="{{ route('editProduct',$product->id) }}" class="btn btn-sm btn-behance">{{ __('words.edit') }}</a>
                                    <a href="{{ route('deleteProduct', $product->id) }}" class="btn btn-sm btn-dribbble">{{ __('words.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
