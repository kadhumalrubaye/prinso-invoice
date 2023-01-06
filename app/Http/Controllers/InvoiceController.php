<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Customer;
use App\Models\DeliveryAgency;
use App\Models\Item;
use App\Models\ReportA;
use Barryvdh\DomPDF\Facade\pdf;


use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Invoice::with(['items', 'customer', 'delivery_agency'])->get();


        return view('invoice', ['invoices' => $data,]);
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
            'customers' => $customers,
            'id' => Invoice::latest()->take(1)->get(),
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

        dump($request);
        //create customer
        $customer = new Customer();
        $customer->name = $request->customer_name;
        $customer->phone = $request->customer_phone;
        $customer->address = $request->customer_address;
        $customer->save();

        // $de = new DeliveryAgency();
        // $de->name = 'kadhum';
        // $de->phone = 98;

        // $de->save();




        //get items array from requers
        $items = $request['items'];


        $invoice = new Invoice();
        $invoice->location = $request->customer_address ?? 'null';
        $invoice->delivery_price = $request->delivery_price ?? 0;
        $invoice->total_price =  $request->total_price;
        $invoice->note = $request->note ?? 'null';
        $invoice->discount = $request->descount ?? 0;
        $invoice->payment_status = $request->payment_status;
        $invoice->delivery_agency_id = $request->delivery_agency_id;
        $invoice->customer_id = $customer->id;


        $invoice->save();




        $invoice_model = Invoice::find($invoice->id);
        $invoice_model->items()->createMany($items);
        $invoice_model->customer()->associate($customer);
        // $invoice_model->delivery_agency_id = $de->id;
        // $invoice_model->delivery_agency()->associate($de);
        $invoice_model->save();





        ReportA::create(
            [
                'invoice_id' => $invoice->id
            ]
        );
        // $x = DB::table('invoices')->latest()->paginate(10);

        return redirect(route('invoices.index'));
    }

    public function createInvoice()
    {

        // $pdf = Pdf::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {

        $delivery = DeliveryAgency::find($invoice->id);
        $items = Item::where("invoice_id", $invoice->id)->get();
        $customer = Customer::find($invoice->customer_id);
        return view('components.invoice.edit-invoice', [
            'invoice' => $invoice,
            'delivery' => $delivery,
            'items' => $items,

            'customer' => $customer
        ]);
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

        //create customer

        $customer =  Customer::find($invoice->customer_id);

        $customer->update([
            'name' => $request->customer_name,
            'phone' => $request->customer_phone,
            'address' => $request->customer_address
        ]);
        $customer->save();
        // $de = new DeliveryAgency();
        // $de->name = 'kadhum';
        // $de->phone = 98;

        // $de->save();




        //get items array from requers
        $items = $request['items'];


        // $invoice =  Invoice::find($invoice->id);
        // $invoice->location = $request->customer_address ?? 'null';
        // $invoice->delivery_price = $request->delivery_price ?? 0;
        // $invoice->total_price =  $request->total_price;
        // $invoice->note = $request->note ?? 'null';
        // $invoice->discount = $request->descount ?? 0;
        // $invoice->payment_status = $request->payment_status;
        // $invoice->delivery_agency_id = $request->delivery_agency_id;
        // $invoice->customer_id = $customer->id;
        //$invoice->save();

        $invoice->update($request->all());
        $itemsModel = [];
        $invoice->items()->delete();
        foreach ($items as $item) {
            array_push($itemsModel,  new Item($item));
        }
        $invoice->items()->saveMany($itemsModel);
        $invoice->save();







        // $invoice_model = Invoice::find($invoice->id);
        // $invoice_model->items()->createMany($items);
        // $invoice_model->customer()->associate($customer);
        // // $invoice_model->delivery_agency_id = $de->id;
        // // $invoice_model->delivery_agency()->associate($de);
        // $invoice_model->save();

        return redirect()->route('invoices.index')->with('success', ' updated successfully');
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
