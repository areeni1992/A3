@extends('backend.index')

@section('content')


    <h1>All Request Quotations</h1>
    <table class="table table-striped text-center">
        <thead>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">Attachment</th>
            <th scope="col">PDF</th>
        </thead>
            @foreach($quots as $q)
               @if($q->f_name !== null || $q->l_name !== null || $q->emali !== null)
                    <tr>
                        <td>{{$q->id}}</td>
                        <td>{{$q->f_name}}</td>
                        <td>{{$q->l_name}}</td>
                        <td>{{$q->email}}</td>
                        <td>{{$q->country}}</td>
                        <td><a href="{{ config('app.url').'/storage/images/'.$q->attachment }}">CV</a></td>
                        <td align='right'>
                            <form class="text-center" action="{{ route('generate_pdf', $q->id) }}" method="get" enctype="multipart/form-data">
                                @csrf
                                <button type="submit"> PDF <i class="fas fa-file-pdf"></i> </button>
                            </form>
                        </td>
                    </tr>
               @endif
            @endforeach
    </table>



@endsection
