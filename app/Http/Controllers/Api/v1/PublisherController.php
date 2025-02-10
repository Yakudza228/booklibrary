<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

use App\Repositories\PublisherRepository;

use App\Http\Resources\DataResource;

use \Illuminate\Http\JsonResponse;

class PublisherController extends Controller
{
    public function __construct(
        protected PublisherRepository $publisherRepository
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(DataResource::make($this->publisherRepository->getAll()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(DataResource::make($this->publisherRepository->getById($id)));
    }
}
