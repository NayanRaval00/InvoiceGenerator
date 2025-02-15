@extends('layouts.admin')

@section('title', 'Create Invoice')

@section('content')
<div class="dashboard-main-body">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Generate Invoice</h6>
            </div>
            <div class="card-body">

                <form action="{{ route('invoice.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="customer_name">Customer Name:</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="Enter Customer Name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_address">Address:</label>
                        <textarea id="customer_address" name="customer_address" class="form-control" placeholder="Enter Customer Address" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_address">Gst Number:</label>
                        <input type="text" id="gst_number" name="gst_number" class="form-control" placeholder="Enter GST Number" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_address">Aadhar Card Number:</label>
                        <input type="text" id="aadhar_card_number" name="aadhar_card_number" class="form-control" placeholder="Enter Aadhar Card Number" required>
                    </div>

                    <h6 class="mt-4">Items:</h6>
                    <div class="form-group">
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
                                    <input type="number" name="items[0][amount]" class="form-control" placeholder="Amount" required readonly>
                                </div>
                                <!-- <div class="col-md-1 d-flex align-items-center justify-content-center">
                            <button type="button" class="btn btn-danger" onclick="removeItem(this)">X</button>
                        </div> -->
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary mt-3" onclick="addItem()">Add Item</button>
                    <button type="submit" class="btn btn-primary mt-3">Generate Invoice</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let itemIndex = 1;

    function addItem() {
        let itemHtml = `<div class="row g-2 item mt-2">
            <div class="col-md-3">
                <input type="text" name="items[${itemIndex}][description]" class="form-control" placeholder="Description" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="items[${itemIndex}][hsn_sac]" class="form-control" placeholder="HSN/SAC" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="items[${itemIndex}][quantity]" class="form-control" placeholder="Qty" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="items[${itemIndex}][rate]" class="form-control" placeholder="Rate" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="items[${itemIndex}][amount]" class="form-control" placeholder="Amount" required readonly>
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-danger" onclick="removeItem(this)">X</button>
            </div>
        </div>`;
        document.getElementById("items").insertAdjacentHTML("beforeend", itemHtml);
        itemIndex++;
    }

    function removeItem(button) {
        button.closest('.item').remove();
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