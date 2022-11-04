@extends('backend.index')
@php $i=1; @endphp
@section('content')
    <h3>messages</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Order Number</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Message Content</th>
            <th scope="col">Attachments</th>
        </tr>
        </thead>
        <tbody>
        @foreach($msgs as $msg)
            <tr>
                <th scope="row">{{ $i++ }}</th>
                <td>{{ $msg->user_email }}</td>
                <td>{{ $msg->order_number }}</td>
                <td>{{ $msg->phone_number }}</td>
                <td width="200px" >
                    <p style="width: 250px; overflow: scroll; height: 150px">
                        {{ $msg->message }}
                    </p>
                </td>
                <td><a href="{{ config('app.url').'/storage/images/'.$msg->attachment}}" class="btn btn-secondary">Download</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
