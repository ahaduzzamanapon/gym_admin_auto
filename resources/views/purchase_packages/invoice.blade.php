<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $sale->id }}</title>
    <link href="http://fonts.cdnfonts.com/css/vcr-osd-mono" rel="stylesheet">
    <style>
        body {
            font-family: 'VCR OSD Mono';
            color: #000;
            text-align: center;
            display: flex;
            justify-content: center;
            font-size: 14px;
            line-height: 23px;
        }
        .bill {
            width: 300px;
            box-shadow: 0 0 3px #aaa;
            padding: 10px 10px;
            box-sizing: border-box;
        }
        .flex {
            display: flex;
        }
        .justify-between {
            justify-content: space-between;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        .table .header {
            border-top: 2px dashed #000;
            border-bottom: 2px dashed #000;
        }
        .table {
            text-align: left;
        }
        .table .total td:first-of-type {
            border-top: none;
            border-bottom: none;
        }
        .table .total td {
            border-top: 2px dashed #000;
            border-bottom: 2px dashed #000;
        }
        .table .net-amount td:first-of-type {
            border-top: none;
        }
        .table .net-amount td {
            border-top: 2px dashed #000;
        }
        .table .net-amount {
            border-bottom: 2px dashed #000;
        }
        @media print {
            .hidden-print,
            .hidden-print * {
                display: none !important;
            }
        }
    </style>
</head>
{{-- "member_id" => 28
    "package_id" => 1
    "coupons_id" => null
    "amount" => 600
    "tax" => 5
    "coupon_amount" => 0
    "gross_amount" => 630
    "pay_amount" => 630
    "due_amount" => 0
    "status" => 3
    "created_at" => "2024-12-01 05:03:54"
    "updated_at" => "2024-12-01 05:03:54"
    "pack_name" => "3 month"
    "member_name" => "Shakil2" --}}
<body>
    <div class="bill">
        <div class="brand">
            {{(!empty($SiteSetting))?$SiteSetting->name:'Gym Master'}}
        </div>
        
        <div>RETAIL INVOICE</div>
        <div class="bill-details">
            <div class="flex justify-between">
                <div>BILL NO: {{ $sale->id }}</div>
               
            </div>
            <div class="flex justify-between">
                <div>BILL DATE: {{ date('d/M/Y', strtotime($sale->created_at)) }}</div>
                <div>TIME: {{ date('H:i', strtotime($sale->created_at)) }}</div>
            </div>
        </div>
        <table class="table">
            <tr class="header">
                <th>Particulars</th>
                <th>Rate</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>{{ $sale->pack_name }}</td>
                <td>{{ number_format($sale->amount, 2) }}</td>
                <td>1</td>
                <td>{{ number_format($sale->amount, 2) }}</td>
            </tr>
            <tr class="total">
                <td></td>
                <td>Total</td>
                <td>1</td>
                <td>{{ number_format($sale->subtotal, 2) }}</td>
            </tr>

            
            <tr class="total">
                <td></td>
                <td>Coupon</td>
                <td></td>
                <td>{{ number_format($sale->coupon_amount)}}</td>
            </tr>
           
            <tr>
                <td></td>
                <td>Vat</td>
                <td>{{ $sale->tax }}%</td>
                <td>{{ number_format($sale->subtotal * ($sale->tax / 100), 2) }}</td>
            </tr>
           
            <tr class="net-amount">
                <td></td>
                <td>Net Amnt</td>
                <td></td>
                <td>{{ number_format($sale->gross_amount, 2) }}</td>
            </tr>
            <tr class="net-amount">
                <td></td>
                <td>Pay Amount</td>
                <td></td>
                <td>{{ number_format($sale->pay_amount, 2) }}</td>
            </tr>
            <tr class="net-amount">
                <td></td>
                <td>Due Amount</td>
                <td></td>
                <td>{{ number_format($sale->due_amount, 2) }}</td>
            </tr>

        </table>
        Payment Method: {{ $sale->payment_method }}<br>
        Transaction ID: 082098082783<br>
        Username: Pradeep [Biller]<br>
        Thank You! Please visit again
        <button onclick="window.print();" class="hidden-print btn btn-primary">Print Invoice</button>
    </div>
    

