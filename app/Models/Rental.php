<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['email', 'book_id', 'rented_at', 'returned_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}