@extends('layouts.admin')

@section('title', 'Invoice create')

@section('content')
<div class="dashboard-main-body">
<h1>Invoice #{{ $invoice->id }}</h1>
<p><strong>Name:</strong> {{ $invoice->customer_name }}</p>
<p><strong>Address:</strong> {{ $invoice->customer_address }}</p>
<p><strong>Date:</strong> {{ $invoice->date }}</p>

<table border="1">
    <tr>
        <th>Description</th>
        <th>HSN/SAC</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Amount</th>
    </tr>
    @foreach($invoice->items as $item)
    <tr>
        <td>{{ $item->description }}</td>
        <td>{{ $item->hsn_sac }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->rate }}</td>
        <td>{{ $item->amount }}</td>
    </tr>
    @endforeach
</table>

<h3>Total Amount: {{ $invoice->items->sum('amount') }}</h3>

</div>
@endsection