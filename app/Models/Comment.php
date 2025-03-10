<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{


    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replay(): HasMany
    {
//        return $this->belongsTo(__CLASS__);  // Comment::class
        return $this->hasMany(Comment::class, 'parent_id');  // Comment::class
    }
}
