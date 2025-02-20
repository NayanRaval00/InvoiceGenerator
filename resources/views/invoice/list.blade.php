@extends('layouts.admin')

@section('title', 'Invoice List')

@section('content')
<div class="dashboard-main-body">
    <div class="container mt-4">
        <div class="card ">
            <div class="card-header">
                <h5 class="card-title mb-0">Invoice List</h5>
                
            </div>

           
            <div class="card-body">
            <div class="mb-3">
                <input type="text" id="search" class="form-control" placeholder="Search Invoice...">
            </div>
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="invoiceTable">
                                @foreach ($invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $invoice->customer_name }}</td>
                                    <td>{{ $invoice->created_at->format('d-m-Y') }}</td>
                                    <td>${{ number_format($invoice->total_amount, 2) }}</td>
                                    <td>
                                        <a href="{{route('invoice.view',$invoice->id)}}" class="btn btn-sm btn-info">View</a>
                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{url('invoice-delete/'.$invoice->id.'')}}" method="post" class="d-inline">
                                            @csrf
                                            @method('post')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $invoices->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>

<!-- Search Script -->
<script>
    document.getElementById("search").addEventListener("input", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#invoiceTable tr");

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>
@endsection