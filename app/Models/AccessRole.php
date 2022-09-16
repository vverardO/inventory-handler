<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessRole extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
