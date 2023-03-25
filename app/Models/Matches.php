<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Matches extends Model
{
    use HasFactory;
    protected $table = 'matches';

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function home()
    {
        return $this->hasOne('App\Models\Club', 'id', 'home');
    }
    public function away()
    {
        return $this->hasOne('App\Models\Club', 'id', 'away');
    }
}
