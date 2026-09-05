<?php

namespace app\controllers;

use yii\web\Controller;
use app\src\domain\interfaces\BookRepositoryInterface;
use app\models\forms\BookForm;
use yii\web\BadRequestHttpException;
use app\src\domain\Book;

class BookController extends Controller
{
    private BookRepositoryInterface $repository;

    public function __construct(
        $id,
        $module,
        BookRepositoryInterface $repository,
        array $config = []
    )
    {
        $this->repository = $repository;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $form = new BookForm();

        if ($this->request->getIsPost()) {
            $form->load($this->request->post());

            if (!$form->validate()) {
                throw new BadRequestHttpException('Validation errors: ' . implode(', ', $form->getErrorSummary(true)));
            }

            $book = new Book(
                name: $form->name,
                publishYear: $form->publishYear,
                description: $form->description,
                isbn: $form->isbn
            );

            $this->repository->save($book);
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }
}
