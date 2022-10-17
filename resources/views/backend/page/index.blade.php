@extends('backend.index')

@section('content')
    <a href="{{ route('createPage') }}" class="btn btn-success"> Create Page </a>

    <div class="row mb-6">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pages</h3>

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
                            <th>{{ __('words.status') }}</th>
                            <th>{{ __('words.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1; ?>
                        @foreach($pages as $page)
{{--                            @if($page->title !== null)--}}
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $page->{'title'} }}</td>
                                <td>
                                    <img src="{{ config('app.url').'/storage/'.$page->image }}" class="img w-80 h-25 img-thumbnail me-3" style="height: 118px!important;" alt="img">
                                </td>
                                <td><span class="tag tag-success">{{ $page->status }}</span></td>
                                <td>
                                    <a href="{{ route('editPage',$page->id) }}" class="btn btn-sm btn-behance">{{ __('words.edit') }}</a>
                                    <a href="{{ route('deletePage', $page->id) }}" class="btn btn-sm btn-dribbble">{{ __('words.delete') }}</a>
                                </td>
                            </tr>
{{--                            @endif--}}
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
