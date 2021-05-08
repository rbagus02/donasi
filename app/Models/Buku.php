<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Buku extends Model
{
    protected $table='buku';

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'jumlah',
        'foto_depan',
        'foto_belakang',
        'foto_samping',
        'status',
        'penerima',
        'users_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User','users_id');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('d F Y');
    }
}
