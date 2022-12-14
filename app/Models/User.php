<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'access_role_id',
        'password',
        'status',
    ];

    public function movimentations(): HasMany
    {
        return $this->hasMany(ProductMovimentation::class);
    }

    public function entries(): HasMany
    {
        return $this->hasMany(ProductEntry::class);
    }

    public function outputs(): HasMany
    {
        return $this->hasMany(ProductOutput::class);
    }

    public function accessRole(): BelongsTo
    {
        return $this->belongsTo(AccessRole::class);
    }
}
