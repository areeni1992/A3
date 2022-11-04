@extends('backend.index')

@section('content')
    <h3> Subscribers </h3>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach($subscribers as $subscribe)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $subscribe->user_email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
