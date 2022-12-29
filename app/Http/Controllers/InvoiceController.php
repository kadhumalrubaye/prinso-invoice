<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Customer;
use App\Models\DeliveryAgency;
use App\Models\Item;
use App\Models\ReportA;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Invoice::join('customers', 'customers.id', '=', 'invoices.customer_id')
            ->join('delivery_agencies', 'delivery_agencies.id', '=', 'invoices.delivery_agency_id')
            ->join('items', 'items.id', '=', 'invoices.item_id')
            ->select(
                'invoices.id as invoice_id',
                'invoices.note as note',
                'invoices.total_price as total_price',
                'invoices.delivery_price as delivery_price',
                'invoices.payment_status as payment_status',
                'invoices.created_at as created_at',
                'delivery_agencies.name as delivery_name',
                'items.price as item_price',
                'items.total_price',
                'invoices.location as invoice_address',
                'items.name as item_name',
                'customers.name as customer_name',


            )
            ->get(['invoice_id', 'created_at', 'invoice_address', 'note', 'total_price', 'delivery_price', 'payment_status', 'customer_name', 'delivery_name', 'item_name']);

        //dump($data);
        return view('invoice', ['invoices' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $deliveries = DeliveryAgency::all();
        $customers = Customer::all();
        return view('components.invoice.create-invoice', [
            'items' => $items,
            'deliveries' => $deliveries,
            'customers' => $customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        $invoice =  Invoice::create(
            [
                'location' => $request->location,
                'delivery_price' => $request->delivery_price,
                'total_price' => $request->total_price,
                'customer_id' => $request->customer_id,
                'item_id' => $request->item_id,
                'delivery_agency_id' => $request->delivery_agency_id,
                'note' => $request->note,
                'payment_status' => $request->payment_status,
            ]

        );
        ReportA::create(
            [
                'invoice_id' => $invoice->id
            ]
        );
        // $x = DB::table('invoices')->latest()->paginate(10);

        return redirect(route('invoices.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoices = Invoice::all();
        return view('invoice', ['invoices' => $invoices]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
