<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'title',
        'author_id',
        'duration'
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }
}
