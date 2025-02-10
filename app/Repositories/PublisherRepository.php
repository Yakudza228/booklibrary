<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AddInterface;
use App\Repositories\Interfaces\GetInterface;

use App\Models\Publisher;

use \Illuminate\Database\Eloquent\Collection;

class PublisherRepository implements GetInterface, AddInterface
{
    public function getAll(): Collection
    {
        return Publisher::query()->with(['book'])->get();
    }

    public function getById(int $id): Collection
    {
        return Publisher::query()->with(['book'])->where('id', $id)->get();
    }

    public function add(array $data): Publisher
    {
        return Publisher::updateOrCreate($data);
    }
}
