<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kiro extends Model
{
    protected $fillable = ['kiro','detail'];
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
