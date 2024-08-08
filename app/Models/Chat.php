<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasFactory;

    // Each chat belongs to one service
    function service(): BelongsTo 
    {
        return $this->belgonsTo(Service::class);
    }
}
