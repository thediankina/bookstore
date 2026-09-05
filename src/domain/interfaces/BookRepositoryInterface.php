<?php

namespace app\src\domain\interfaces;

use app\src\domain\Book;

interface BookRepositoryInterface
{
    public function save(Book $book): void;

    public function findByIsbn(string $isbn): ?Book;
}
