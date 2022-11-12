@extends('backend.index')

@section('content')


    <h1>All Agents Messages</h1>
    <table class="table table-striped text-center">
        <thead>
        <th scope="col">#</th>
        <th scope="col">Attachment</th>
        <th scope="col">PDF</th>
        </thead>
        <?php $i = 1; ?>
        @foreach($agents as $q)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td><a href="{{ config('app.url').'/storage/images/'.$q->attachment  }}">attachment</a></td>
                    <td align='right'>
                        <form class="text-center" action="{{ route('agent_pdf', $q->id) }}" method="get" enctype="multipart/form-data">
                            @csrf
                            <button type="submit"> PDF <i class="fas fa-file-pdf"></i> </button>
                        </form>
                    </td>
                </tr>
        @endforeach
    </table>



@endsection
