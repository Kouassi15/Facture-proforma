<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Secretariat extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class,'user_id','id');
    }
}
