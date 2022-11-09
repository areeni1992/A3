
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        tr:nth-child(even){background-color: #f2f2f2;}
        tr:hover {background-color: #ddd;}
        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        h1{ text-align: center;}
    </style>
</head>
<body>

<table id="customers">
    <thead>
        <th>Product ID</th>
        <th>Description</th>
        <th>Supplier</th>
        <th>Quantity Per Unit</th>
        <th>Unit Price</th>
    </thead>
    <tr>
        <td>{{$exactData['id'] ?? ''}}</td>
        <td>{{$exactData['f_name'] ?? ''}}</td>
        <td>{{$exactData['l_name'] ?? ''}}</td>
        <td>{{$exactData['prod_name'] ?? ''}}</td>
        <td align='right'>{{$exactData['country'] ?? ''}}</td>
    </tr>
</table>
</body>

