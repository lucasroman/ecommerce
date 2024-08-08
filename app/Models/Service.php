<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Each service belongs to a user
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    // Each service has many chats
    public function chats(): HasMany 
    {
        return $this->hasMany(Chat::class);
    }
}
