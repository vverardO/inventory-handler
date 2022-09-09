<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMovimentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'place_from_id',
        'place_to_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function from(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    public function to(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }
}
