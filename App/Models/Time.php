<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = ['reservation_id', 'book_id'];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
