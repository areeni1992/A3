
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>

{{--<table id="customers">--}}
{{--    <thead>--}}
{{--        <th>Product ID</th>--}}
{{--        <th>Description</th>--}}
{{--        <th>Supplier</th>--}}
{{--        <th>Quantity Per Unit</th>--}}
{{--        <th>Unit Price</th>--}}
{{--    </thead>--}}
{{--    <tr>--}}
{{--        <td>{{$exactData['id'] ?? ''}}</td>--}}
{{--        <td>{{$exactData['f_name'] ?? ''}}</td>--}}
{{--        <td>{{$exactData['l_name'] ?? ''}}</td>--}}
{{--        <td>{{$exactData['prod_name'] ?? ''}}</td>--}}
{{--        <td align='right'>{{$exactData['country'] ?? ''}}</td>--}}
{{--    </tr>--}}
{{--</table>--}}
<section>
    <div class="message quotation py-4">
        <div class="container">

            <div class="row shadow">
                @csrf
                <h5 class="text-center mb-4 h5-color">Persondal Information</h5>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['l_name'] }}</div>

                </div>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['l_name'] }}</div>
                </div>

                <div class="col-md-4">
                    <div class="form-select mb-3 text-muted border-0 shadow-sm p-3">
                        <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['country'] }}</div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['email'] }}</div>
                </div>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['mobile'] }}</div>
                </div>

                <h5 class="text-center my-2 h5-color">Basic Product Information</h5>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['b_name'] }}</div>
                </div>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['prod_name'] }}</div>
                </div>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['category'] }}</div>
                </div>

                {{--                    <div class="col-md-4">--}}
                {{--                        <select class="form-select mb-3 text-muted border-0 shadow-sm p-3">--}}
                {{--                            <option class="option" selected="" disabled="">Sourcing Type</option>--}}
                {{--                            <option value="1">One</option>--}}
                {{--                            <option value="2">Two</option>--}}
                {{--                            <option value="3">Three</option>--}}
                {{--                        </select>--}}
                {{--                    </div>--}}

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['quantity'] }}</div>
                </div>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['budget'] }}</div>
                </div>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['currency'] }}</div>
                </div>

                <div class="col-md-4">
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['details'] }}</div>
                </div>

                {{--                    <div class="col-md-4">--}}
                {{--                        <input type="file" name="second_attach" placeholder="Attachments" style="content: 'Attachment'!important;" class="form-control mb-3 border-0 shadow-sm p-2 input-file-2">--}}
                {{--                    </div>--}}

                <!-- Sourcing Purpose -->
                <div class="col-md-12 mt-3">
                    <h5 class="fw-bold my-3">Sourcing Purpose</h5>
                    <div class="form-check">
                        <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['sourcing_purp'] }}</div>
                    </div>
                </div>

                <!-- Shipping & Payments -->
                <h5 class="text-center h5-color mt-3 mt-md-0">
                    Shipping & Payments
                </h5>
                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold my-3">Shipment Method</h5>
                    <div class="form-check">
                        <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipment_method'] }}</div>
                    </div>
                </div>

                <div class="col-md-6 mt-3">
                    <h5 class="fw-bold my-3">
                        preferred Shipment And Pricing Conditions:
                    </h5>
                    <div class="form-check">
                        <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipment_price'] }}</div>
                    </div>
                </div>

                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold my-3">PAYMENT METHOD</h5>

                    <div class="form-check">
                        <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['source_purp'] }}</div>
                    </div>
                </div>

                <!-- Privacy Policy -->
                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold">.Contact Information</h5>

                    <div class="form-check">
                        <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['contact_info'] }}</div>
                    </div>
                </div>

                <div class="col-md-9 mt-3">
                    <h5 class="fw-bold">Time Period Of Receiving Goods (In Days)</h5>

                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['time_period'] }}</div>
                </div>
            </d>
        </div>
    </div>
    </div>
</section>
</body>

