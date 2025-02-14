<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .invoice {
            width: 700px;
            margin: auto;
            background: yellow;
            padding: 20px;
            border: 2px solid black;
        }

        .header {
            text-align: center;
            font-weight: bold;
            position: relative;
        }

        .header .gst-details {
            position: relative;
            top: 0;
            right: 0;
            text-align: right;
        }

        .details,
        .table-container {
            margin-top: 10px;
        }

        .details p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
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
</head>

<body>
    <div class="invoice">
        <div class="gst-details">
            <p><strong>GSTIN:</strong> 10BUGPD0824C1ZN</p>
            <p><strong>Mobile:</strong> 9857323537, 7549854893</p>
        </div>
        <div class="header">
            <h2>PAVITRA HARDWARE</h2>
            <p>BAGHA, BEGUSARAI - BIHAR - 851218</p>

        </div>
        <div class="details">
            <p><strong>Invoice No:</strong> 10</p>
            <p><strong>Date:</strong> 27-01-2025</p>
            <p><strong>Name:</strong> RASESH HARDWARE</p>
            <p><strong>Address:</strong> BUS STAND, MAUJA CHOWK, OPP. MAGADH BANK, BIHAR</p>
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Sl. No</th>
                    <th>Particulars</th>
                    <th>HSN/SAC Code</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>XP-MT-605 5M</td>
                    <td>9078010</td>
                    <td>10 Pcs</td>
                    <td>339.90</td>
                    <td>3390.00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>XP-MT-603 3M</td>
                    <td>9078010</td>
                    <td>100 Pcs</td>
                    <td>56.48</td>
                    <td>5648.00</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Cut off Wheel 104mm X-Power</td>
                    <td>6804290</td>
                    <td>10 Pcs</td>
                    <td>58.50</td>
                    <td>585.00</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Platinum Saw Blade 110mm XP</td>
                    <td>82023910</td>
                    <td>100 Pcs</td>
                    <td>56.78</td>
                    <td>5678.00</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Bond Grip (GR) 30ML</td>
                    <td>35069999</td>
                    <td>24 Pcs</td>
                    <td>313.56</td>
                    <td>7525.44</td>
                </tr>
            </table>
        </div>
        <table class="amount-table">
            <tr>
                <td><strong>Amount (in words):</strong></td>
                <td>THIRTY-THREE THOUSAND ONE HUNDRED EIGHTY-THREE ONLY</td>
            </tr>
            <tr>
                <td><strong>Total Amount Before Tax:</strong></td>
                <td>28,121.44</td>
            </tr>
            <tr>
                <td><strong>CGST @ 9%:</strong></td>
                <td>2,530.93</td>
            </tr>
            <tr>
                <td><strong>SGST @ 9%:</strong></td>
                <td>2,530.93</td>
            </tr>
            <tr>
                <td><strong>Round Off:</strong></td>
                <td>0</td>
            </tr>
            <tr>
                <td><strong>Total Amount After Tax:</strong></td>
                <td>33,183.00</td>
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
</body>

</html>