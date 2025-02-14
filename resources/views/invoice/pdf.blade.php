<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/DejaVuSans.ttf') }}") format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
        }

        .gst-details {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
        }

        table {
            width: 100%;
            line-height: 1.5;
            text-align: left;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="gst-details">
            <p><strong>GSTIN:</strong> 10BUGPD0824C1ZN</p>
            <p><strong>Mobile:</strong> 9857323537, 7549854893</p>
        </div>
        <h2>PAVITRA HARDWARE</h2>
        <p>BAGHA, BEGUSARAI - BIHAR - 851218</p>
        <p><strong>Invoice No:</strong> {{ $invoice->invoice_no }}</p>
        <p><strong>Date:</strong> {{ $invoice->date }}</p>
        <p><strong>Customer Name:</strong> {{ $invoice->customer_name }}</p>
        <p><strong>Address:</strong> {{ $invoice->customer_address }}</p>

        <table>
            <tr>
                <th>Sl. No</th>
                <th>Description</th>
                <th>HSN/SAC</th>
                <th>Qty</th>
                <th>Rate</th>
                <th>Amount</th>
            </tr>
            @foreach($invoice->items as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->hsn_sac }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ number_format($item->rate, 2) }}</td>
                <td>₹{{ number_format($item->amount, 2) }}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr>
                <td><strong>Amount (in words):</strong></td>
                <td>{{ $invoice->amount_in_words }}</td>
            </tr>
            <tr>
                <td><strong>Total Amount Before Tax:</strong></td>
                <td>₹{{ number_format($invoice->total_before_tax, 2) }}</td>
            </tr>
            <tr>
                <td><strong>CGST @ 9%:</strong></td>
                <td>₹{{ number_format($invoice->cgst, 2) }}</td>
            </tr>
            <tr>
                <td><strong>SGST @ 9%:</strong></td>
                <td>₹{{ number_format($invoice->sgst, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Round Off:</strong></td>
                <td>₹{{ number_format($invoice->round_off, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Total Amount After Tax:</strong></td>
                <td>₹{{ number_format($invoice->total_after_tax, 2) }}</td>
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
        
        <div class="total">
            <p>For PAVITRA HARDWARE</p>
            <p>Authorized Signature</p>
        </div>
    </div>
</body>

</html>
