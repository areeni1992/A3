<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('slider_image')->nullable();
            $table->string('slider_title')->nullable();
            $table->string('slider_text')->nullable();

            $table->integer('cat_id')->unsigned()->nullable();
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('page_id')->unsigned()->nullable();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');

            $table->text('first_banner')->nullable();
            $table->string('first_banner_text')->nullable();

            $table->text('second_banner')->nullable();
            $table->string('second_banner_text')->nullable();

            $table->text('third_banner_right')->nullable();
            $table->text('third_banner_left')->nullable();
            $table->string('third_banner_title')->nullable();
            $table->string('third_banner_text')->nullable();

            $table->text('fourth_banner')->nullable();
            $table->string('fourth_banner_title')->nullable();
            $table->string('fourth_banner_text')->nullable();

            $table->text('catalog_image')->nullable();
            $table->text('catalog')->nullable();
            $table->text('catalog_text')->nullable();

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
        Schema::dropIfExists('home_pages');
    }
}
