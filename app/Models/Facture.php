<?php

namespace App\Models;

use App\Models\Client;
use App\Models\FactureItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;
    //  protected $guarded = ['id'];
    protected $guarded = [];

    public function factureItem(): HasMany 
    { 
        return $this->hasMany(FactureItem::class); 
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }
    
   
    public function devis()
    {
        return $this->hasMany(Devis::class);
    }
    
}
