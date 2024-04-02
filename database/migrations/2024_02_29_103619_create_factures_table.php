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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->integer('editeur_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('numero')->nullable();
            $table->string('numero_proforma')->nullable();
            $table->string('objet')->nullable();
            $table->string('montant_HT')->nullable();
            $table->string('TVA')->nullable();
            $table->string('taxes')->nullable();
            $table->string('remise')->nullable();
            $table->string('montant_net')->nullable();
            // $table->string('lieu')->nullable();
            // $table->string('ligne')->nullable();
            $table->string('immatriculation')->nullable();
            $table->string('marque')->nullable();
            $table->string('incident')->nullable();
            $table->string('commentaire')->nullable();
            $table->string('montant_lettre')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
