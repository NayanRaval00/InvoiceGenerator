@extends('layouts.admin')

@section('title', 'Create Invoice')

@section('content')
<div class="dashboard-main-body">

    <div class="container mt-4">
        <div class="card p-4 shadow">
            <h2 class="text-center mb-4">Generate Invoice</h2>
            <form action="{{ route('invoice.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Customer Name:</label>
                    <input type="text" name="customer_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address:</label>
                    <textarea name="customer_address" class="form-control" required></textarea>
                </div>

                <h4>Items</h4>
                <div id="items">
                    <div class="row g-2 item">
                        <div class="col-md-3">
                            <input type="text" name="items[0][description]" class="form-control" placeholder="Description" required>
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="items[0][hsn_sac]" class="form-control" placeholder="HSN/SAC" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="items[0][quantity]" class="form-control" placeholder="Qty" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="items[0][rate]" class="form-control" placeholder="Rate" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="items[0][amount]" class="form-control" placeholder="Amount" required>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger" onclick="removeItem(this)">X</button>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-secondary mt-3" onclick="addItem()">Add Item</button>
                <button type="submit" class="btn btn-primary mt-3">Generate Invoice</button>
            </form>
        </div>
    </div>
</div>

<script>
    let itemIndex = 1;

    function addItem() {
        let itemHtml = `<div class="row g-2 item">
            <div class="col-md-3"><input type="text" name="items[${itemIndex}][description]" class="form-control" placeholder="Description" required></div>
            <div class="col-md-2"><input type="text" name="items[${itemIndex}][hsn_sac]" class="form-control" placeholder="HSN/SAC" required></div>
            <div class="col-md-2"><input type="number" name="items[${itemIndex}][quantity]" class="form-control" placeholder="Qty" required></div>
            <div class="col-md-2"><input type="number" name="items[${itemIndex}][rate]" class="form-control" placeholder="Rate" required></div>
            <div class="col-md-2"><input type="number" name="items[${itemIndex}][amount]" class="form-control" placeholder="Amount" required></div>
            <div class="col-md-1"><button type="button" class="btn btn-danger" onclick="removeItem(this)">X</button></div>
        </div>`;
        document.getElementById("items").insertAdjacentHTML("beforeend", itemHtml);
        itemIndex++;
    }

    function removeItem(button) {
        button.parentElement.parentElement.remove();
    }

    document.addEventListener('input', function(event) {
        if (event.target.matches('input[name*="quantity"], input[name*="rate"]')) {
            let item = event.target.closest('.item');
            let quantity = item.querySelector('input[name*="quantity"]').value || 0;
            let rate = item.querySelector('input[name*="rate"]').value || 0;
            item.querySelector('input[name*="amount"]').value = (quantity * rate).toFixed(2);
        }
    });
</script>
@endsection