<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Berita extends Model
{
    protected $table='berita';
    protected $fillable = [
        'judul',
        'gambar',
        'isi',
    ];

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created-at'])->translatedFormat('d F Y');
    // }
}
