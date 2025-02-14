@extends('layouts.admin')

@section('title', 'Invoice Details')

@section('content')
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        background: yellow;
    }

    .header {
        text-align: center;
        font-weight: bold;
    }

    .gst-details {
        text-align: right;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    .amount-table {
        margin-top: 10px;
        width: 100%;
    }

    .signature {
        text-align: right;
        margin-top: 20px;
        font-weight: bold;
    }
</style>

<div class="invoice-box">
    <div class="gst-details">
        <p><strong>GSTIN:</strong> 10BUGPD0824C1ZN</p>
        <p><strong>Mobile:</strong> 9857323537, 7549854893</p>
    </div>
    <div class="header">
        <h2>PAVITRA HARDWARE</h2>
        <p>BAGHA, BEGUSARAI - BIHAR - 851218</p>
    </div>
    <p><strong>Invoice No:</strong> {{ $invoice->id }}</p>
    <p><strong>Date:</strong> {{ $invoice->date }}</p>
    <p><strong>Name:</strong> {{ $invoice->customer_name }}</p>
    <p><strong>Address:</strong> {{ $invoice->customer_address }}</p>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>HSN/SAC</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td>{{ $item->description }}</td>
                <td>{{ $item->hsn_sac }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->rate, 2) }}</td>
                <td>₹{{ number_format($item->amount, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <table class="amount-table">
        <tr>
            <td><strong>Amount (in words):</strong></td>
            <td>{{ $invoice->amount_in_words }}</td>
        </tr>
        <tr>
            <td><strong>Total Amount Before Tax:</strong></td>
            <td>₹{{ number_format($totalBeforeTax, 2) }}</td>
        </tr>
        <tr>
            <td><strong>CGST @ 9%:</strong></td>
            <td>₹{{ number_format($cgst, 2) }}</td>
        </tr>
        <tr>
            <td><strong>SGST @ 9%:</strong></td>
            <td>₹{{ number_format($sgst, 2) }}</td>
        </tr>
        <tr>
            <td><strong>Round Off:</strong></td>
            <td>₹{{ number_format($invoice->round_off, 2) }}</td>
        </tr>
        <tr>
            <td><strong>Total Amount After Tax:</strong></td>
            <td>₹{{ number_format($totalAfterTax, 2) }}</td>
        </tr>
        <tr>
            <td><strong>Bank Details:</strong></td>
            <td>
                <p><strong>Pavitra Hardware</strong></p>
                <p><strong>Bank:</strong> SBI (A M Y Panhana) Begusarai</p>
                <p><strong>A/c No:</strong> 40653569747</p>
                <p><strong>IFSC Code:</strong> SBIN0006429</p>
            </td>
        </tr>
    </table>

    <div class="signature">
        <p>For PAVITRA HARDWARE</p>
        <p>Authorized Signature</p>
    </div>
    
</div>
<div class="container">
    <a href="{{ route('invoice.pdf', $invoice->id) }}" class="btn btn-success">Download PDF</a>
</div>
@endsection
