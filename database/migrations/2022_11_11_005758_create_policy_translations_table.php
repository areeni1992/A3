<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('policy_id')->nullable();
            $table->string('locale')->index();

            $table->string('page_title')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('desc')->nullable();
            $table->string('policy_name')->nullable();
            $table->text('policy_content')->nullable();

            $table->unique(['policy_id','locale']);
            $table->foreign('policy_id')->references('id')->on('policy')->cascadeOnDelete();
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
        Schema::dropIfExists('policy_tranlations');
    }
}
