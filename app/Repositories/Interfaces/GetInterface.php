<?php

namespace App\Repositories\Interfaces;

interface GetInterface
{
    /**
     * Get all Resource
     */
    public function getAll();
    /**
     * Get Resource by id
     */
    public function getById(int $id);
}
