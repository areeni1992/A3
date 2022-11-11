<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('faqs_id')->nullable();
            $table->string('locale')->index();

            $table->string('page_title')->nullable();
            $table->string('desc')->nullable();
            $table->string('short_desc')->nullable();
            $table->string('faq_name')->nullable();

            $table->unique(['faqs_id','locale']);
            $table->foreign('faqs_id')->references('id')->on('faqs')->cascadeOnDelete();
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
        Schema::dropIfExists('faq_translations');
    }
}
