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
        Schema::create('search_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('search_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by')->references('id')->on('users');
            $table->string('name');
            $table->string('team_leader');
            $table->string('medic');
            $table->string('responder_1')->nullable();
            $table->string('responder_2')->nullable();
            $table->string('responder_3')->nullable();

            $table->timestamps();
        });
    }
};
