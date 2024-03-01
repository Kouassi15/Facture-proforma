<?php

namespace App\Models;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    public function factures(): BelongsTo
    { 
        return $this->belongsTo(Facture::class); 
    }
    // public function clients(): HasMany 
    // { 
    //     return $this->hasMany(Client::class); 
    // }
}
