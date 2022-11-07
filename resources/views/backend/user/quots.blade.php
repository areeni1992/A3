{{--@extends('backend.index')--}}

{{--@section('content')--}}


{{--    <h1>Product Price List</h1>--}}
{{--    <table id='products'>--}}
{{--        <thead>--}}
{{--            <th>Product ID</th>--}}
{{--            <th>Description</th>--}}
{{--            <th>Supplier</th>--}}
{{--            <th>Quantity Per Unit</th>--}}
{{--            <th>Unit Price</th>--}}
{{--            <th>PDF</th>--}}
{{--        </thead>--}}
{{--            @foreach($quots as $q)--}}
{{--                @foreach($arr as $index => $row)--}}
{{--                    @if($q->id == $index)--}}
{{--                       @if($q->f_name !== null || $q->l_name !== null || $q->emali !== null)--}}
{{--                        <tr>--}}
{{--                            <td>{{$q->id}}</td>--}}
{{--                            <td>{{$q->f_name}}</td>--}}
{{--                            <td>{{$q->l_name}}</td>--}}
{{--                            <td>{{$q->prod_name}}</td>--}}
{{--                            <td align='right'>{{$q->country}}</td>--}}
{{--                            <td align='right'><a href="{{ $row->download('document.pdf') }}"> PDF </a></td>--}}
{{--                        </tr>--}}
{{--                       @endif--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            @endforeach--}}
{{--    </table>--}}



{{--@endsection--}}
