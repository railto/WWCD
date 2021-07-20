<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_comms_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('search_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->string('time');
            $table->string('call_sign');
            $table->text('message');
            $table->text('action')->nullable();
            $table->timestamps();
        });
    }
};
