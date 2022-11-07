<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('quotation_id')->nullable();
            $table->string('locale')->index();

            $table->string('page_title')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('desc')->nullable();

            $table->unique(['quotation_id','locale']);
            $table->foreign('quotation_id')->references('id')->on('quotations')->onDelete('cascade');


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
        Schema::dropIfExists('quotation_translations');
    }
}
