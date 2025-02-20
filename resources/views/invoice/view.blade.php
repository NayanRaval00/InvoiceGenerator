@extends('layouts.admin')

@section('title', 'Invoice Details')

@section('content')
<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Invoice View</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Invoice View</li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <a href="{{ route('invoice.pdf', $invoice->id) }}" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
                    Download
                </a>
                <button type="button" class="btn btn-sm btn-danger radius-8 d-inline-flex align-items-center gap-1" onclick="printInvoice()">
                    <iconify-icon icon="basil:printer-outline" class="text-xl"></iconify-icon>
                    Print
                </button>
            </div>
        </div>
        <div class="card-body py-40">
            <div class="row justify-content-center" id="invoice">
                <div class="col-lg-8">
                    <div class="shadow-4 border radius-8">
                        <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
                            <div>
                                <h3 class="text-xl">Invoice #{{ $invoice->id }}</h3>
                                <p class="mb-1 text-sm">Date Issued: {{ $invoice->date }}</p>
                                <p class="mb-0 text-sm">Date Due: {{ $invoice->date }}</p>
                            </div>
                            <div>
                                <h4 class="mb-1 text-xl">BAGHA, BEGUSARAI - BIHAR - 851218</h4>
                                <p class="mb-0 text-sm">10BUGPD0824C1ZN, +91 9857323537, +91 7549854893</p>
                            </div>
                        </div>
                        <div class="py-28 px-20">
                            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3">
                                <div>
                                    <h6 class="text-md">Issus For:</h6>
                                    <table class="text-sm text-secondary-light">
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td class="ps-8">:{{ $invoice->customer_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td class="ps-8">:{{ $invoice->customer_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone number</td>
                                                <td class="ps-8">:+1 543 2198</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <table class="text-sm text-secondary-light">
                                        <tbody>
                                            <tr>
                                                <td>Issus Date</td>
                                                <td class="ps-8">:{{ $invoice->date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order ID</td>
                                                <td class="ps-8">:#{{ $invoice->id }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-24">
                                <div class="table-responsive scroll-sm">
                                    <table class="table bordered-table text-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-sm">SL.</th>
                                                <th scope="col" class="text-sm">Description</th>
                                                <th scope="col" class="text-sm">HSN/SAC</th>
                                                <th scope="col" class="text-sm">Qty</th>
                                                <th scope="col" class="text-sm">Rate</th>
                                                <th scope="col" class="text-end text-sm">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($invoice->items as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->hsn_sac }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>₹{{ number_format($item->rate, 2) }}</td>
                                                <td class="text-end">₹{{ number_format($item->amount, 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between gap-3">
                                    <div>
                                        <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">Sales By:</span> {{ $invoice->customer_name }}</p>
                                        <p class="text-sm mb-0">Thanks for your business</p>
                                        <p class="text-sm mb-0">
                                        <table class="text-sm">
                                            <tbody>
                                                <hr>
                                                <tr>
                                                    <td class="pe-64 pt-4">
                                                        <span class="text-primary-light fw-semibold">Bank Details:</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64"><span class="text-primary-light">Pavitra Hardware<span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64"><span class="text-primary-light fw-semibold">Bank: &nbsp;</span><span class="text-primary-light"> (A M Y Panhana) Begusarai<span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64"><span class="text-primary-light fw-semibold">A/c No: &nbsp;</span><span class="text-primary-light"> 40653569747<span></td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64"><span class="text-primary-light fw-semibold">IFSC Code: &nbsp;</span><span class="text-primary-light"> SBIN0006429<span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    </div>
                                    <div>
                                        <table class="text-sm">
                                            <tbody>
                                                <tr>
                                                    <td class="pe-64">Total Amount Before Tax:</td>
                                                    <td class="pe-16">
                                                        <span class="text-primary-light fw-semibold">&#8377; {{ number_format($totalBeforeTax, 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64">CGST @ 9%:</td>
                                                    <td class="pe-16">
                                                        <span class="text-primary-light fw-semibold">&#8377;{{ number_format($cgst, 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64">SGST @ 9%:</td>
                                                    <td class="pe-16">
                                                        <span class="text-primary-light fw-semibold">&#8377;{{ number_format($sgst, 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64 border-bottom pb-4">Round Off:</td>
                                                    <td class="pe-16 border-bottom pb-4">
                                                        <span class="text-primary-light fw-semibold">{{ number_format($invoice->round_off, 2) }}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pe-64 pt-4">
                                                        <span class="text-primary-light fw-semibold">Total Amount After Tax:</span>
                                                    </td>
                                                    <td class="pe-16 pt-4">
                                                        <span class="text-primary-light fw-semibold">&#8377;{{ number_format($totalAfterTax, 2) }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-64">
                                <p class="text-center text-secondary-light text-sm fw-semibold">Thank you for your purchase!</p>
                            </div>

                            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">
                                <div class="text-sm border-top d-inline-block px-12">Signature of Customer</div>
                                <div class="text-sm border-top d-inline-block px-12">Signature of Authorized</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <a href="{{ route('invoice.pdf', $invoice->id) }}" class="btn btn-success">Download PDF</a>
</div> -->
<script>
    function printInvoice() {
        var printContents = document.getElementById('invoice').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection