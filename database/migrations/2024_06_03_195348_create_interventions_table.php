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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->date('date');
            $table->enum('type', ['interne', 'externe']);
            $table->unsignedBigInteger('facture_id')->nullable();
            $table->unsignedBigInteger('vehicule_id')->nullable();
            $table->timestamps();

            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
