<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AddInterface;
use App\Repositories\Interfaces\GetInterface;

use App\Models\Author;

use \Illuminate\Database\Eloquent\Collection;

class AuthorRepository implements GetInterface, AddInterface
{
    public function getAll(): Collection
    {
        return Author::query()->with(['book'])->get();
    }

    public function getById(int $id): Collection
    {
        return Author::query()->with(['book'])->where('id', $id)->get();
    }

    public function add(array $data): Author
    {
        return Author::updateOrCreate($data)->fresh();
    }
}
