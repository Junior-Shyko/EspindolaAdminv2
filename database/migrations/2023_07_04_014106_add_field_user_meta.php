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
        Schema::table('user_meta', function (Blueprint $table) {
            $table->string('type_object', 256)->nullable();
            $table->string('object_id', 256)->nullable();
            $table->string('type', 256)->nullable();
            $table->string('type_residence', 100)->nullable();
            $table->string('organ_issuing', 100)->nullable();
            $table->string('filiation', 100)->nullable();
            $table->integer('number_dependent')->nullable();         
            $table->integer('company_id')->nullable();         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_meta', function (Blueprint $table) {
            $table->dropColumn('type_object');
            $table->dropColumn('object_id');
            $table->dropColumn('type');
            $table->dropColumn('type_residence');
            $table->dropColumn('organ_issuing');
            $table->dropColumn('filiation');
            $table->dropColumn('number_dependent');
            $table->dropColumn('company_id');
        });
    }
};
