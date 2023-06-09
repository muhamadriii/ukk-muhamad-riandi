<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengaduan_id',
        'petugas_id',
        'date',
        'isi',
    ];
    
    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
