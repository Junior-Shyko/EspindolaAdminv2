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
        Schema::create('contact_sites', function (Blueprint $table) {
            $table->id();
            $table->string('cep',15)->nullable();
            $table->string('address',150)->nullable();
            $table->integer('number')->nullable();
            $table->string('complements',150)->nullable();
            $table->string('district',150)->nullable();
            $table->string('city',150)->nullable();
            $table->string('state',50)->nullable();
            $table->string('email',256)->nullable();
            $table->string('creci',25)->nullable();
            $table->string('cnpj',25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_sites');
    }
};
