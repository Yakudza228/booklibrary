<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;

use App\Http\Requests\BookRequest;

use App\Repositories\BookRepository;

use App\Http\Resources\DataResource;

use \Illuminate\Http\JsonResponse;

class BookController extends Controller
{

    public function __construct(
        protected BookRepository $bookRepository,
    ){}
    /**cache_locks
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(DataResource::make($this->bookRepository->getAll()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request): JsonResponse
    {
        return response()->json(DataResource::make($this->bookRepository->add($request->validated())->toArray()));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        return response()->json(DataResource::make($this->bookRepository->getById($id)));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, BookRequest $request): JsonResponse
    {
        return response()->json(DataResource::make($this
            ->bookRepository->edit($id, $request->validated())->toArray()));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json($this->bookRepository->delete($id));
    }
}
