<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    // Permitir preenchimento de massa apenas no campo 'name'
    protected $fillable = ['name'];
}
