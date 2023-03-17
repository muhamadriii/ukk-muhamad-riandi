<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Petugas extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'village_id',
        'name',
        'username',
        'password',
        'telp',
        'level',
    ];

    public function village(){
        return $this->belongsTo(Village::class);
    }

}
