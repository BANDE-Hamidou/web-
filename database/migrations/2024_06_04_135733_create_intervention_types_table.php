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
        Schema::create('intervention_types', function (Blueprint $table) {
            $table->unsignedBigInteger("idtypeintervention");
            $table->unsignedBigInteger("idintervention");
            $table->foreign('idtypeintervention')->references('id')->on('typeinterventions')->onDelete('cascade');
            $table->foreign('idintervention')->references('id')->on('interventions')->onDelete('cascade');
            $table->primary(["idtypeintervention", "idintervention"]);
            $table->index('idtypeintervention');
            $table->index('idintervention');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervention_types');
    }
};
