<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy', function (Blueprint $table) {
            $table->id();

            $table->string('page_title')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('background')->nullable();
            $table->text('desc')->nullable();

            $table->string('policy_name')->nullable();
            $table->text('policy_content')->nullable();
            $table->enum('publish_for', ['admin', 'user'])->default('user');
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
        Schema::dropIfExists('ploicy');
    }
}
