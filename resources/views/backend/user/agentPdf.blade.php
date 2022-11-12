<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>

<section>
    <div class="message py-5">
        <div class="container">
            <div>
                <h5 class="text-center mb-4 h5-color">NAME OF THE COMPANY/STORE</h5>
                <div class="col-md-4">
                    <h5>Company Name:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['name_of_the_company'][0] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>Working Hours:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['name_of_the_company'][1] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>working Days</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['name_of_the_company'][2] }} </div>
                </div>
                <h5 class="text-center my-4 h5-color mt-3">(office) ADDRESS</h5>
                <div class="col-md-4">
                    <h5>House No.</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][0] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>Street Name:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][1] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>Postal Code:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][2] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>City:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][3] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>Region:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][4] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>Country:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][5] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>Shop Size:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][6] }} </div>
                </div>
                <div class="col-md-4">
                    <h5>How Many Branches:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][7] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>Street Name:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['office_address'][8] }} </div>
                </div>
                <h5 class="text-center my-2 h5-color mt-3">BILLING/S ADDRESS</h5>

                <div class="col-md-4">
                    <h2>Telephone No.:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['billing_address'][0] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>Contact Person:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['billing_address'][1] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>Designation Title:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['billing_address'][2] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>Fax No:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['billing_address'][3] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>Email Address:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['billing_address'][4] }} </div>
                </div>
                <h5 class="text-center my-2 h5-color mt-3">SHIPPING ADDRESS</h5>
                <div class="col-md-4">
                    <h2>House No:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipping_address'][0] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>Street Name:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipping_address'][1] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>Postal Code:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipping_address'][2] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>City:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipping_address'][3] }} </div>
                </div>

                <div class="col-md-4">
                    <h2>Region:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipping_address'][4] }} </div>
                </div>

                <div class="col-md-4">
                    <h2>Country:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipping_address'][5] }} </div>
                </div>
                <div class="col-md-4">
                    <h2>Website:</h2>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipping_address'][6] }} </div>
                </div>

                <!-- Sourcing Purpose -->
                <div class="col-md-4 mt-3">
                    <h5 class="fw-bold my-3">words.BUSINESS ORGANIZATION</h5>
                    <div class="col-md-4">
                        <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['business_organiz'] }} </div>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold my-3">TYPE OF Buyer</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['type_of_buyer'] }} </div>
                </div>
                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold my-3">PAYMENT METHOD</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['payment_method'] }} </div>
                </div>
                <div class="col-md-2 mt-3">
                    <h5 class="fw-bold my-3">CURRENCY</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['currency'] }} </div>
                </div>
                <h5 class="text-center my-4 h5-color mt-3">BANK DETAILS</h5>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">bank Name:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][0] }} </div>
                </div>

                <div class="col-md-4">
                    <h5 class="fw-bold my-3">bldg & street:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][1] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">City:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][2] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">Country:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][3] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">Postal Code:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][4] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">bank Account Name:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][6] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">bank Account No.:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][7] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">Swift Code:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][8] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">Iban Number:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][9] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">VAT:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['bank_details'][10] }} </div>
                </div>
                <!-- Privacy Policy -->

                <h5 class="fw-bold mt-5 mb-0">
                   words.Key Personnel & Contacts (Authorized To Sign And Accept PO/Contracts & Other Commercial Documents)
                </h5>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">Name:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['key_personnel_contact'][0] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">title/position:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['key_personnel_contact'][1] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold my-3">Signature:</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['key_personnel_contact'][2] }} </div>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mt-5 mb-0">ORDERS INFORMATION</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['order_info'] }} </div>
                </div>
                <div class="col-md-4 mt-3">
                    <h5 class="fw-bold my-3">Shipment Method</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['shipment_method'] }} </div>
                </div>

                <div class="col-md-3 mt-3">
                    <h5 class="fw-bold my-3">Ports Of Shipment</h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['port_of_shipment'] }} </div>
                </div>

                <div class="col-md-5 mt-3">
                    <h5 class="fw-bold my-3">
                        preferred Shipment And Pricing Conditions:
                    </h5>
                    <div class="form-control mb-3 border-0 shadow-sm p-3"> {{ $exactData['preferred_shipment_pricing'] }} </div>

                </div>
            </div>
        </div>
    </div>
</section>

</body>
