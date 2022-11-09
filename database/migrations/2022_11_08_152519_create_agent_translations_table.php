<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('agents_id')->nullable();
            $table->string('locale')->index();

            $table->string('page_title')->nullable();
            $table->string('short_desc')->nullable();
            $table->longText('desc')->nullable();

            $table->unique(['agents_id','locale']);
            $table->foreign('agents_id')->references('id')->on('agents')->onDelete('cascade');


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
        Schema::dropIfExists('agent_translations');
    }
}
