@extends('backend.index')

@section('content')
    <a href="{{ route('createPost') }}" class="btn btn-success">Create Post</a>
    @if(\Session::has('success'))
        <div>
            <li class="alert alert-success">{!! \Session::get('success') !!}</li>
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Posts table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 text-center">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">#</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9">title</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-9 ps-2">image</th>
                                    <th class="text-secondary opacity-9"> actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $num = 1; ?>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $num++ }} -</td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $post->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="{{ config('app.url').'/storage/'.$post->image }}" class="img w-20 h-20 img-thumbnail me-3" alt="img">
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('editPost', $post->id) }}" class="text-success font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit post">
                                                Edit
                                            </a>
                                            |
                                            <a href="{{ route('deletePost', $post->id) }}" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="delete Post">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
