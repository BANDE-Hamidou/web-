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
        Schema::create('piece_type', function (Blueprint $table) {
            $table->unsignedBigInteger("idpiece");
            $table->unsignedBigInteger("idtypepiece");
            $table->foreign('idpiece')->references('id')->on('pieces')->onDelete('cascade');
            $table->foreign('idtypepiece')->references('id')->on('type_pieces')->onDelete('cascade');
            $table->primary(["idpiece", "idtypepiece"]);
            $table->index('idpiece');
            $table->index('idtypepiece');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piece_type');
    }
};
