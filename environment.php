<?php

use Dotenv\Dotenv;
use Dotenv\Repository\RepositoryBuilder;

$repository = RepositoryBuilder::createWithNoAdapters()
    ->addAdapter('Dotenv\Repository\Adapter\EnvConstAdapter')
    ->immutable()
    ->make();

$dotenv = Dotenv::create($repository, __DIR__);
$dotenv->load();
