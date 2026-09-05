<?php

namespace app\src\domain;

use DomainException;

class Book
{
    private string $name;
    private int $publishYear;
    private string $description;
    private string $isbn;

    public function __construct(
        string $name,
        int $publishYear,
        string $description,
        string $isbn
    )
    {
        $this->assertValidName($name);
        $this->assertValidPublishYear($publishYear);

        $this->name = $name;
        $this->publishYear = $publishYear;
        $this->description = $description;
        $this->isbn = $isbn;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPublishYear(): int
    {
        return $this->publishYear;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    private function assertValidName(string $name)
    {
        if ($name === '' || trim($name) === '') {
            throw new DomainException('Name cannot be empty');
        }
    }

    private function assertValidPublishYear(int $year)
    {
        if ($year > date('Y')) {
            throw new DomainException('Publish year cannot be later than current');
        }
    }
}
