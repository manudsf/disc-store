<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = ['sale_id', 'disc_id', 'quantity', 'price'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function disc()
    {
        return $this->belongsTo(Disc::class);
    }
}
