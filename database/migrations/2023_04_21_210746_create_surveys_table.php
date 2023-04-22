<?php

use Carbon\Carbon;
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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->date('survey_date')->default(Carbon::now());
            $table->longText('survey_general_aspects')->nullable();
            $table->longtext('survey_reservation')->nullable();
            $table->string('survey_status')->default('Rascunho');
            $table->timestamp('survey_finalized_date');
            $table->longtext('survey_keys')->nullable();
            $table->string('survey_code')->nullable();
            $table->string('survey_link_tour')->nullable();
            $table->longtext('survey_provisions')->nullable();
            $table->boolean('survey_filed')->default(0)->comment('Se a vistoria foi arquivada');
            $table->string('survey_type')->nullable();
            $table->string('survey_address_immobile')->nullable();
            $table->string('survey_type_immobile')->nullable();
            $table->string('survey_energy_meter')->nullable()->default('---');
            $table->string('survey_energy_load')->nullable()->default('---');
            $table->string('survey_water_meter')->nullable()->default('---');
            $table->string('survey_water_load')->nullable()->default('---');
            $table->string('survey_gas_meter')->nullable()->default('---');
            $table->string('survey_gas_load')->nullable()->default('---');
            $table->timestamp('survey_date_register')->nullable();
            $table->string('survey_inspetor_name')->nullable();
            $table->string('survey_inspetor_cpf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
