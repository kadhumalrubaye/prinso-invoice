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
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->unsignedBigInteger('delivery_agency_id')->nullable();
            $table->foreign('delivery_agency_id')->references('id')->on('delivery_agency')->onDelete('cascade');
            // $table->bigInteger('destination_phone');
            $table->enum('payment_status', ['yes', 'no']);
            // $table->string('customer_name');
            // $table->string('delivery_agency');
            $table->double('delivery_price');
            $table->text('note');
            $table->double('total_price'); // delivery + item_total  price

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
