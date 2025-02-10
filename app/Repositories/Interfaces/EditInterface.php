<?php

namespace App\Repositories\Interfaces;

interface EditInterface
{
    /**
     * Edit Resource
     */
    public function edit(int $id, array $data);
}
