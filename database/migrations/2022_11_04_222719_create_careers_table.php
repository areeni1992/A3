<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->longText('desc')->nullable();
            $table->longText('short_desc')->nullable();

            $table->text('background')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('desired_position')->nullable();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('educational_background')->nullable();
            $table->string('date_of_barth')->nullable();
            $table->string('visa_status')->nullable();
            $table->json('general_questions')->nullable();
            $table->json('employment_questions')->nullable();
            $table->text('attachment')->nullable();
            $table->enum('ok', ['true', 'false'])->default('false')->nullable();
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
        Schema::dropIfExists('careers');
    }
}
