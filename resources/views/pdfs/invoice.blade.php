<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .w-100 { width: 100%; }
        .bg-primary { background-color: #F4F9F1; }

        table, td, th {
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 8px;
            vertical-align: top;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h1>{{ $invoice->invoice_number }}</h1>

    <table class="w-100 p-5 bg-primary">
        <thead>
        <tr>
            <th>invoice number</th>
            <th>invoice date</th>
            <th>expiry date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $invoice->invoice_number }}</td>
            <td>{{ $invoice->invoice_date->format('d-m-Y') }}</td>
            <td>{{ $invoice->expiration_date->format('d-m-Y') }}</td>
        </tr>
        </tbody>
    </table>
</body>
</html>
