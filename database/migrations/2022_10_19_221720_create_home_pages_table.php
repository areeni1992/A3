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

            $table->json('cat_ids')->nullable();
            $table->json('page_ids')->nullable();

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
