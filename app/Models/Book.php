<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    protected $fillable = [
        'id',
        'title',
        'write_at',
        'author_id',
        'publisher_id',
    ];

    protected function casts(): array
    {
        return [];
    }

    public function author(): HasOne
    {
        return $this->hasOne(Author::class);
    }

    public function publisher(): HasOne
    {
        return $this->hasOne(Publisher::class);
    }


}
