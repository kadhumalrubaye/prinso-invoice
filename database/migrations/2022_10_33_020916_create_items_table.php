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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('item_name',);
            $table->integer('quantity',);
            $table->double('price',);
            $table->double('original_price',);
            // $table->unsignedBigInteger('invoice_id')->nullable(); // Make it nullable
            // $table->foreign('invoice_id')
            //     ->references('id')
            //     ->on('invoices')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
