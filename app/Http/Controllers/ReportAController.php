<?php

namespace App\Http\Controllers;

use App\Models\ReportA;
use App\Http\Requests\StoreReportARequest;
use App\Http\Requests\UpdateReportARequest;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class ReportAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Invoice::latest()->join(
            'report_a_s',
            'invoices.id',
            '=',
            'report_a_s.invoice_id'
        )->join('customers', 'customers.id', '=', 'invoices.customer_id')
            ->join('delivery_agencies', 'delivery_agencies.id', '=', 'invoices.delivery_agency_id')
            ->join('items', 'items.id', '=', 'invoices.item_id')
            ->select(
                'invoices.id as invoice_id',
                'invoices.note as note',
                'invoices.total_price as total_price',
                'invoices.delivery_price as delivery_price',
                'invoices.payment_status as payment_status',
                'invoices.location as invoice_address',
                'items.name as item_name',
                'customers.name as customer_name',
                'delivery_agencies.name as delivery_name',
                'invoices.created_at as created_at',
                'report_a_s.id as reporta_id'
            )
            ->get(['invoice_id', 'created_at', 'invoice_address', 'note', 'total_price', 'delivery_price', 'payment_status', 'customer_name', 'delivery_name', 'reporta_id', 'item_name']);
        // dump($data);

        return view('reporta', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($request)
    {
        //     $book = Book::latest() 
        // ->leftjoin('subjects', 'books.id', '=', 'subjects.book_id') 
        // ->select('books.*', 'subjects.subject')
        // ->distinct()
        // ->where('subject', 'like', '%' .$search. '%')
        // ->paginate(20);
        $reports = ReportA::search();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportARequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportARequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportA  $reportA
     * @return \Illuminate\Http\Response
     */
    public function show(ReportA $reportA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportA  $reportA
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportA $reportA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportARequest  $request
     * @param  \App\Models\ReportA  $reportA
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportARequest $request, ReportA $reportA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportA  $reportA
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportA $reportA)
    {
        //
    }
}
