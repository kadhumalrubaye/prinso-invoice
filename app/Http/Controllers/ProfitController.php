<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class ProfitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $totalPrice = Invoice::all()->sum('total_price');
        $payed = Invoice::where('payment_status', 'yes')->count();
        $notPayed = Invoice::where('payment_status', 'no')->count();
        $total = Invoice::all()->count();



        // $startDate = $request->input('startDate');
        // $endDate = $request->input('endDate');


        // $startDate = $dateRange[0];
        // $endDate = $dateRange[1];


        // if ($startDate && $endDate) {
        //     dd($request);
        //     $invoices = Invoice::whereDate('created_at', '>=', $startDate)
        //         ->whereDate('created_at', '<=', $endDate)
        //         ->get();
        //     $profites = $invoices->sum('total_price');
        //     return view('components.invoice.profits', [
        //         'profits' => $profites,
        //         'invoices' => $invoices,
        //         'totalPice' => $totalPrice,
        //         'payed' => $payed,
        //         'notPayed' => $notPayed,
        //         'total' => $total,

        //     ]);
        //}
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');


        $totalPrice = Invoice::all()->sum('total_price');
        $payed = Invoice::where('payment_status', 'yes')->count();
        $notPayed = Invoice::where('payment_status', 'no')->count();
        $total = Invoice::all()->count();
        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();

        // Invoice::whereDate('created_at', '>=', $startDate)
        //     ->whereDate('created_at', '<=', $endDate)
        //     ->get();


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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterData(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $data = Invoice::whereBetween('created_at', [$start_date, $end_date])->get();

        $totalPrice = Invoice::all()->sum('total_price');
        $payed = Invoice::where('payment_status', 'yes')->count();
        $notPayed = Invoice::where('payment_status', 'no')->count();
        $total = Invoice::all()->count();
        $invoices = Invoice::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

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

    public function show($id)
    {
        //
    }
    public function sort(Request $request)
    {

        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');


        $totalPrice = Invoice::all()->sum('total_price');
        $payed = Invoice::where('payment_status', 'yes')->count();
        $notPayed = Invoice::where('payment_status', 'no')->count();
        $total = Invoice::all()->count();
        $invoices = Invoice::whereDate('created_at', '>=', $startDate)
            ->whereDate('created_at', '<=', $endDate)
            ->get();

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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
