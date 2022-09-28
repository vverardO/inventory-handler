<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function movimentations(): HasMany
    {
        return $this->hasMany(ProductMovimentation::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity as place_quantity');
    }
}
