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
        Schema::create('personnels_interventions', function (Blueprint $table) {
            $table->unsignedBigInteger("idpersonnel");
            $table->unsignedBigInteger("idintervention");
            $table->foreign('idpersonnel')->references('id')->on('personnels')->onDelete('cascade');
            $table->foreign('idintervention')->references('id')->on('interventions')->onDelete('cascade');
            $table->primary(["idpersonnel", "idintervention"]);
            $table->index('idpersonnel');
            $table->index('idintervention');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels_interventions');
    }
};
