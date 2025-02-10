<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

use App\Repositories\AuthorRepository;

use App\Http\Resources\DataResource;

use \Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    public function __construct(
        protected AuthorRepository $authorRepository
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(DataResource::make($this->authorRepository->getAll()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(DataResource::make($this->authorRepository->getById($id)));
    }
}
