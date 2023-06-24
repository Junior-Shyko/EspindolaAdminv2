<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cpf',50)->nullable();
            $table->string('nick',50)->nullable();
            $table->string('receive_proposal',50)->nullable();
            $table->string('cep',50)->nullable();
            $table->string('address',150)->nullable();
            $table->string('number',50)->nullable();
            $table->string('complement',50)->nullable();
            $table->string('district',150)->nullable();
            $table->string('city',150)->nullable();
            $table->string('state',50)->nullable();
            $table->string('nationality', 150)->nullable();
            $table->string('naturalness', 150)->nullable();
            $table->string('marital_status', 150)->nullable();
            $table->float('rental_finance', 8,2)->nullable();
            $table->string('rg', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('sholarity', 100)->nullable();
            $table->string('sex', 100)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_meta');
    }
};
