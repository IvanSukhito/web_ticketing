<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Acara extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'photos',
        'namaPelaksana',
        'lokasi',
        'waktu',
        'category_id',
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getThumbnailAttribute()
    {
        $photos = $this->photos;
        if ($photos && !empty($photos)) {
            return Storage::url($photos[0]);
        }

        return asset('img/images.jpg');
    }
    public function scopeWithCategory($query, $category)
    {
        return $query->where('category_id', $category);
    }
    public function scopeUpcoming($query)
    {
        return $query->orderBy('waktu', 'asc')->where('waktu', '>=', now());
    }
    public function scopeFetch($query, $slug)
    {
        return $query->with(['category', 'tickets'])
            ->withCount('tickets')
            ->where('slug', $slug)
            ->firstOrFail();
    }
}
