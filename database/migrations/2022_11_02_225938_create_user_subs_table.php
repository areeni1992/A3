<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subs', function (Blueprint $table) {
            $table->id();
            $table->string('user_email')->nullable();
            $table->string('order_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->longText('message')->nullable();
            $table->text('attachment')->nullable();
            $table->enum('status', ['subscriber', 'sender'])->default('sender');
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
        Schema::dropIfExists('user_subs');
    }
}
