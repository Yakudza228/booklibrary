<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publisher extends Model
{

    protected $fillable = [
        'id',
        'name',
        'book_id',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

}
