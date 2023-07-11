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
use Illuminate\Http\Request;

class InvoiceController extends Controller
{



    public function index(Request $request)
    {
        $sortBy = $request->query('sortBy');
        if ($sortBy) {
            $data = Invoice::with(['items', 'customer', 'delivery_agency'])
                // ->whereBetween('created_at', [$startDate, $endDate])
                // ->orderBy('payment_status', 'asc')
                // ->orderBy('id', 'asc')
                ->orderBy($sortBy, 'desc')
                // ->orderBy('delivery_agency_id', 'desc')
                ->get();
            return view('invoice', ['invoices' => $data,]);
        }


        // dd($request);
        $startDate = '2023-01-05';
        $endDate = '2023-01-06';

        // $posts = DB::table('posts')
        //             ->whereBetween('created_at', [$startDate, $endDate])
        //             ->get();
        $data = Invoice::with(['items', 'customer', 'delivery_agency'])
            // ->whereBetween('created_at', [$startDate, $endDate])
            // ->orderBy('payment_status', 'asc')
            // ->orderBy('id', 'asc')
            ->orderBy('created_at',)
            // ->orderBy('delivery_agency_id', 'desc')
            ->get();

        return view('invoice', ['invoices' => $data,]);
    }



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


    public function store(StoreInvoiceRequest $request)
    {


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
        $invoice->cost_total_price =  $request->cost_total_price;
        $invoice->note = $request->note ?? 'null';
        $invoice->discount = $request->descount ?? 0;
        $invoice->payment_status = $request->payment_status;
        $invoice->delivery_agency_id = $request->delivery_agency_id;
        $invoice->customer_id = $customer->id;





        foreach ($items as $itemData) {
            $item = new Item([
                'item_name' => $itemData['item_name'],
                'quantity' => $itemData['quantity'],
                'price' => $itemData['price'],
                // 'total_price' => $itemData['total_price'],
                'original_price' => $itemData['original_price'],
                // 'total_original_price' => $itemData['total_original_price'],
            ]);
            $invoice->items()->save($item);
        }
        $invoice->save();
        // $invoice_model = Invoice::find($invoice->id);
        // $invoice_model->items()->createMany($items);
        // $invoice_model->customer()->associate($customer);
        // // $invoice_model->delivery_agency_id = $de->id;
        // // $invoice_model->delivery_agency()->associate($de);
        // $invoice_model->save();





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


    public function show(Invoice $invoice)
    {
    }
    public function generateInvoice(Request $request)
    {
        $getid = $request->route('id');

        $id = $request->id;

        $invoice = Invoice::find($id);

        $pdf = PDF::loadView('print-invoice', compact('invoice', 'invoice'));
        return $pdf->download('invoice.pdf');
    }


    public function edit(Invoice $invoice)
    {
        $invoice_delivery = DeliveryAgency::find($invoice->delivery_agency_id);
        $deliveries = DeliveryAgency::all();
        $items = Item::where("invoice_id", $invoice->id)->get();
        $customer = Customer::find($invoice->customer_id);
        return view('components.invoice.edit-invoice', [
            'invoice' => $invoice,
            'invoice_delivery' => $invoice_delivery,
            'deliveries' => $deliveries,
            'items' => $items,
            'customer' => $customer
        ]);
    }


    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {

        //update customer
        $customer =  Customer::find($invoice->customer_id);

        $customer->update([
            'name' => $request->customer_name,
            'phone' => $request->customer_phone,
            'address' => $request->customer_address
        ]);
        $customer->save();

        //update delivery agency 



        //get items array from requers
        $items = $request['items'];



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


    public function destroy(Invoice $invoice)
    {
        $task = Invoice::findOrFail($invoice->id);
        $task->delete();
        return redirect()->route('invoices.index')->with('success', 'Task deleted successfully');
    }
    public function getProfits(Request $request)
    {

        $totalPrice = Invoice::all()->sum('total_price');
        $payed = Invoice::where('payment_status', 'yes')->count();
        $notPayed = Invoice::where('payment_status', 'no')->count();
        $total = Invoice::all()->count();



        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');


        // $startDate = $dateRange[0];
        // $endDate = $dateRange[1];


        if ($startDate && $endDate) {
            dd($request);
            $invoices = Invoice::whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate)
                ->get();
            $totalPrice = $invoices->sum('total_price');
            $payed = $invoices->where('payment_status', 'yes')->count();
            $notPayed = $invoices->where('payment_status', 'yes')->count();
            $total = $invoices->count();

            $profites = $invoices->sum('total_price');
            return view('components.invoice.profits', [
                'profits' => $profites,
                'invoices' => $invoices,
                'totalPice' => $totalPrice,
                'payed' => $payed,
                'notPayed' => $notPayed,
                'total' => $total,

            ]);
        }
        $invoices = Invoice::all();


        $profites = $invoices->sum('total_price');
        return view('components.invoice.profits', [
            'profits' => $profites,
            'invoices' => $invoices,
            'totalPice' => $totalPrice,
            'payed' => $payed,
            'notPayed' => $notPayed,
            'total' => $total,

        ]);
    }
}
