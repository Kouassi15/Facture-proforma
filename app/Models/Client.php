<?php

namespace App\Models;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
     protected $guarded = ['id']; 


    public function factures(): HasMany
    { 
        return $this->hasMany(Facture::class, 'facture_id', 'id'); 
    }
    // public function clients(): HasMany 
    // { 
    //     return $this->hasMany(Client::class, 'client_id', 'id'); 
    // }
}
