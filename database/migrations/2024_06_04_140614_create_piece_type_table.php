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
            $table->unsignedBigInteger("piece_id");
            $table->unsignedBigInteger("type_piece_id");
            $table->foreign('piece_id')->references('id')->on('pieces')->onDelete('cascade');
            $table->foreign('type_piece_id')->references('id')->on('type_pieces')->onDelete('cascade');
            $table->primary(["piece_id", "type_piece_id"]);
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
