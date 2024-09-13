<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('location');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->unsignedBigInteger('delivery_agency_id');
            $table->foreign('delivery_agency_id')->references('id')->on('delivery_agencies')->onDelete('cascade');
            
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

            $table->enum('payment_status', ['yes', 'no'])->default('no');
            $table->double('delivery_price');
            $table->string('note', length: 255);
            $table->double('discount'); // delivery + item_total  price
            $table->double('total_price'); // delivery + item_total  price
            $table->double('cost_total_price'); // delivery + item_total  price

            // $table->double('price', 8, 3); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
