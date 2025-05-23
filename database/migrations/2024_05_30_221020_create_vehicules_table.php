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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('couleur');
            $table->date('annee');
            $table->decimal('prix', 10, 2);
            $table->string('image');
            $table->string('detail');
            // $table->unsignedBigInteger('client_id')->nullable();
            $table->timestamps();

            // Ajout des contraintes de clé étrangère
            // $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
