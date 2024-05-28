<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'icon'
    ];
    public function acaras()
    {
        return $this->hasMany(Acara::class);
    }

    public function scopeSortByMostAcaras($query)
    {
        return $query->withCount('acaras')->orderBy('acaras_count', 'desc');
    }
}
