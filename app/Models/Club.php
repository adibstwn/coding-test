<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $table = 'club'; //display table in db

    public function liga()
    {
        return $this->hasOne(Liga::class);
    }
}
