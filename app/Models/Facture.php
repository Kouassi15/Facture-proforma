<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;

    public function clients(): HasMany 
    { 
        return $this->hasMany(Client::class); 
    }

    // public function factures(): BelongsTo
    // { 
    //     return $this->belongsTo(Facture::class); 
    // }
}
