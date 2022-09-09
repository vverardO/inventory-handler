<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'real_time_quantity',
        'minimum_amount',
    ];

    public function entries(): HasMany
    {
        return $this->hasMany(ProductEntry::class);
    }

    public function outputs(): HasMany
    {
        return $this->hasMany(ProductOutput::class);
    }
}
