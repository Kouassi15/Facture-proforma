<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function factureitem() {
        return $this->hasMany(FactureItem::class);
    }

    public function facture() {
        return $this->belongsTo(Facture::class);
    }
}
