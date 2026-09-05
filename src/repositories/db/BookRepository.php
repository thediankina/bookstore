<?php

namespace app\src\repositories\db;

use app\src\domain\interfaces\BookRepositoryInterface;
use app\src\domain\Book;
use app\models\ar\BookAr;
use Yii;
use DateTimeImmutable;

class BookRepository implements BookRepositoryInterface
{
    public function save(Book $book): void
    {
        $ar = BookAr::findOne(['isbn' => $book->getIsbn()]);

        if ($ar === null) {
            $ar = new BookAr();
            $ar->id = Yii::$app->snowflake->next();
        }

        $ar->name = $book->getName();
        $ar->publish_year = $book->getPublishYear();
        $ar->description = $book->getDescription();
        $ar->isbn = $book->getIsbn();

        if ($ar->getIsNewRecord()) {
            $ar->created_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');
        } else {
            $ar->updated_at = (new DateTimeImmutable())->format('Y-m-d H:i:s');
        }

        $ar->save(false);
    }

    public function findByIsbn(string $isbn): ?Book
    {
        $ar = BookAr::findOne(['isbn' => $isbn]);

        if ($ar === null) {
            return null;
        }

        return new Book(
            name: $ar->name,
            publishYear: $ar->publish_year,
            description: $ar->description,
            isbn: $ar->isbn
        );
    }
}
