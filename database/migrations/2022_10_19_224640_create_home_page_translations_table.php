<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('home_id')->unsigned();
            $table->string('locale')->index();

            $table->string('slider_title')->nullable();
            $table->string('slider_text')->nullable();

            $table->string('first_banner_text')->nullable();

            $table->string('second_banner_text')->nullable();

            $table->string('third_banner_title')->nullable();
            $table->string('third_banner_text')->nullable();

            $table->string('fourth_banner_title')->nullable();
            $table->string('fourth_banner_text')->nullable();

            $table->text('catalog_text')->nullable();

            $table->unique(['home_id','locale']);
            $table->foreign('home_id')->references('id')->on('home_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_page_translations');
    }
}
