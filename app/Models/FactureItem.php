<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function facture() {
        return $this->belongsTo(Facture::class);

    }

    public function devis(): BelongsTo
    {
        return $this->belongsTo(Devis::class);
    }
}
