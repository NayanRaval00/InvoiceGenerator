<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('invoice.create');
    }

    public function store(Request $request)
    {
        $invoice = Invoice::create([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'date' => Carbon::now()
        ]);

        foreach ($request->items as $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $item['description'],
                'hsn_sac' => $item['hsn_sac'],
                'quantity' => $item['quantity'],
                'rate' => $item['rate'],
                'amount' => $item['amount'],
            ]);
        }

        return redirect()->route('invoice.view', ['id' => $invoice->id]); // Ensure it matches the route name
    }

    public function view($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        $totalBeforeTax = $invoice->items->sum('amount');
        $cgst = $totalBeforeTax * 0.09;
        $sgst = $totalBeforeTax * 0.09;
        $totalAfterTax = $totalBeforeTax + $cgst + $sgst;

        return view('invoice.view', compact('invoice', 'totalBeforeTax', 'cgst', 'sgst', 'totalAfterTax'));
    }

    public function generatePdf($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        // Calculate totals
        $totalBeforeTax = $invoice->items->sum('amount');
        $cgst = $totalBeforeTax * 0.09;
        $sgst = $totalBeforeTax * 0.09;
        $totalAfterTax = $totalBeforeTax + $cgst + $sgst;

        // Pass calculated totals to PDF view
        $pdf = Pdf::loadView('invoice.pdf', compact('invoice', 'totalBeforeTax', 'cgst', 'sgst', 'totalAfterTax'));

        return $pdf->download('invoice_' . $id . '.pdf');
    }
}
