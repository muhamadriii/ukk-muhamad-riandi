<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_id',
        'category_id',
        'nik',
        'date',
        'judul',
        'foto',
        'isi',
        'status',
    ];

    public function tanggapan(){
        return $this->hasOne(Tanggapan::class,);
    }

    public function pengadu(){
        return $this->belongsTo(Masyarakat::class,'nik','nik');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

}
