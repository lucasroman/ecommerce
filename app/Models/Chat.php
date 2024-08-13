<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'service_id',
        'owner',
        'guest',
        'message',
    ];

    // Each chat belongs to one service
    function service(): BelongsTo 
    {
        return $this->belongsTo(Service::class);
    }
}
