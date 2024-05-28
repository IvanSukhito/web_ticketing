<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = [
        'acara_id',
        'name',
        'harga',
        'kuantitas',
        'max_buy',
    ];
    use HasFactory;
    public function Acara()
    {
        return $this->belongsTo(Acara::class);
    }
}
