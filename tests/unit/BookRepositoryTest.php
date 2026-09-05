<?php

namespace app\tests\unit;

use PHPUnit\Framework\TestCase;
use Yii;
use app\src\domain\interfaces\BookRepositoryInterface;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;
use app\src\domain\Book;

class BookRepositoryTest extends TestCase
{
    private BookRepositoryInterface $repository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = Yii::$container->get(BookRepositoryInterface::class);
    }

    #[Test]
    #[DataProvider('bookDataProvider')]
    public function testSave(
        string $name,
        int $publishYear,
        string $description,
        string $isbn
    ): void
    {
        $book = new Book(
            name: $name,
            publishYear: $publishYear,
            description: $description,
            isbn: $isbn
        );

        $this->repository->save($book);

        $found = $this->repository->findByIsbn($isbn);
        $this->assertNotNull($found);
        $this->assertEquals($book->getName(), $found->getName());
        $this->assertEquals($book->getPublishYear(), $found->getPublishYear());
        $this->assertEquals($book->getDescription(), $found->getDescription());
        $this->assertEquals($book->getIsbn(), $found->getIsbn());
    }

    public static function bookDataProvider(): iterable
    {
        yield [
            'SQL Performance Explained',
            2012,
            'Практическое руководство для разработчиков, которое помогает оптимизировать производительность баз данных.',
            '3950307826'
        ];
    }
}
