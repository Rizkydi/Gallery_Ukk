<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
