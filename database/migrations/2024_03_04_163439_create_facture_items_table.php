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
        Schema::create('facture_items', function (Blueprint $table) {
            $table->id();
            $table->integer('facture_id')->nullable();
            $table->integer('devis_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('quantite')->nullable();
            $table->string('prix_unit')->nullable();
            $table->string('montant_total')->nullable();
            // $table->string('montant_net')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture_items');
    }
};
