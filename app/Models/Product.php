<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'minimum_amount',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    protected function valueFormatted(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->value, 2, ',', '.'),
        );
    }

    public function entries(): HasMany
    {
        return $this->hasMany(ProductEntry::class);
    }

    public function outputs(): HasMany
    {
        return $this->hasMany(ProductOutput::class);
    }

    public function places()
    {
        return $this->belongsToMany(Place::class);
    }
}
