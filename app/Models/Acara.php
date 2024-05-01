<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'deskripsi',
        'gambar',
        'namaPelaksana',
        'lokasi',
        'waktu',
        'jenis_acara',
    ];

    protected $casts = [
        'photos' => 'array',
        'waktu' => 'datetime',
    ];
    //relasi ke tiket
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    //AMBIL DATA TICKET PALING MURAH 
    public function getStartFromAttribute()
    {
        //NYARI DATA PRICE  PERTAMA KALO GADA DI ISI DENGAN 0 
        return $this->tickets()->orderBy('harga')->first()->harga ?? 0;
    }
}
