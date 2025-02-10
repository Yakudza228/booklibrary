<?php

namespace App\Repositories;

use App\Repositories\Interfaces\GetInterface;
use App\Repositories\Interfaces\AddInterface;
use App\Repositories\Interfaces\EditInterface;
use App\Repositories\Interfaces\DeleteInterface;

use App\Models\Book;

use \Illuminate\Database\Eloquent\Collection;

class BookRepository implements GetInterface, AddInterface, EditInterface, DeleteInterface
{
    public function __construct(
        protected AuthorRepository $authorRepository,
        protected PublisherRepository $publisherRepository
    ){}
    public function getAll(): Collection
    {
        return Book::query()->with(['author', 'publisher'])->get();
    }

    public function getById(int $id): array
    {
        return Book::query()->with(['author', 'publisher'])->where('id', $id)->get()->toArray();
    }

    public function add(array $data): Book
    {
        $book = Book::updateOrCreate(['title' => $data['title'],'write_at' => $data['write_at']]);
        $book->author()->create(['name' => $data['author'],'book_id' => $book->id]);
        $book->publisher()->create(['name' => $data['publisher'],'book_id' => $book->id]);
        $book->update(['author_id' => $book->author->id, 'publisher_id' => $book->publisher->id]);
        return $book;
    }

    public function edit(int $id, array $data): Book
    {
        return Book::find($id)->update($data)->fresh();
    }

    public function delete(int $id): array
    {
        return ['id' => $id, 'delete' => Book::find($id)->delete()];
    }
}
