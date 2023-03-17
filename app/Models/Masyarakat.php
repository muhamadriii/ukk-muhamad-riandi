<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Masyarakat extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'village_id',
        'nik',
        'name',
        'username',
        'password',
        'telp',
    ];

    public function village(){
        return $this->belongsTo(Village::class);
    }

}
