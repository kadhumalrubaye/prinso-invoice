<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAgency;
use App\Http\Requests\StoreDeliveryAgencyRequest;
use App\Http\Requests\UpdateDeliveryAgencyRequest;

class DeliveryAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('delivery', ['deliveries' => DeliveryAgency::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.delivery.create-delivery');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeliveryAgencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryAgencyRequest $request)
    {
        DeliveryAgency::create(
            [
                'name' => $request->name,
                'phone' => $request->phone,

            ]

        );

        return view('delivery', ['deliveries' => DeliveryAgency::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryAgency  $deliveryAgency
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryAgency $deliveryAgency)
    {
        $delivery = DeliveryAgency::all();
        return view('delivery', ['delivery' => $delivery]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryAgency  $deliveryAgency
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryAgency $deliveryAgency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryAgencyRequest  $request
     * @param  \App\Models\DeliveryAgency  $deliveryAgency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryAgencyRequest $request, DeliveryAgency $deliveryAgency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryAgency  $deliveryAgency
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryAgency $deliveryAgency)
    {
        deliveryAgency->delete();
    }
}
