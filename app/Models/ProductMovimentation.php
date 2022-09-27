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
        'user_id',
        'quantity',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function from(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'place_from_id');
    }

    public function to(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'place_to_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
