<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('desc')->nullable();
            $table->text('background')->nullable();

            $table->enum('insert_by', ['admin', 'user'])->default('user')->nullable();

            $table->json('name_of_the_company')->nullable();
            $table->json('office_address')->nullable();
            $table->json('billing_address')->nullable();
            $table->json('shipping_address')->nullable();
            $table->string('business_organiz')->nullable();
            $table->string('type_of_buyer')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('currency')->nullable();
            $table->json('bank_details')->nullable();
            $table->json('key_personnel_contact')->nullable();
            $table->string('order_info')->nullable();
            $table->string('shipment_method')->nullable();
            $table->string('port_of_shipment')->nullable();
            $table->string('preferred_shipment_pricing')->nullable();
            $table->text('attachment')->nullable();




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
