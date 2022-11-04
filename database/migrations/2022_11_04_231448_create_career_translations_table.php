<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('career_id')->nullable();
            $table->string('locale')->index();

            $table->string('page_title')->nullable();
            $table->longText('desc')->nullable();
            $table->longText('short_desc')->nullable();

            $table->unique(['career_id','locale']);
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');

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
        Schema::dropIfExists('career_translations');
    }
}
