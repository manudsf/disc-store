<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disc extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 
        'price', 
        'genre_id', 
        'artist_id', 
        'format_id', 
        'cover_image' 
    ];

  
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

 
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

 
    public function format()
    {
        return $this->belongsTo(Format::class);
    }
}
