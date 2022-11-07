<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('desc')->nullable();
            $table->text('background')->nullable();

            $table->enum('insert_by', ['admin', 'user'])->default('user')->nullable();

            $table->string('country')->nullable();
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->text('attachment')->nullable();
            $table->string('b_name')->nullable();
            $table->string('prod_name')->nullable();
            $table->string('currency')->nullable();
            $table->string('category')->nullable();
            $table->string('quantity')->nullable();
            $table->string('budget')->nullable();
            $table->string('details')->nullable();
            $table->text('second_attach')->nullable();
            $table->string('sourcing_purp')->nullable();
            $table->string('shipment_methode')->nullable();
            $table->string('shipment_price')->nullable();
            $table->string('source_purp')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('time_period')->nullable();
            $table->enum('agree', ['yes', 'no'])->default('no')->nullable();
            $table->enum('read', ['yes', 'no'])->default('no')->nullable();

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
        Schema::dropIfExists('quotations');
    }
}
