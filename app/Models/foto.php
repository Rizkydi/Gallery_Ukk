<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class foto extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(like_foto::class);
    }

    public function komentars()
    {
        return $this->hasMany(komentar::class);
    }
    
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
