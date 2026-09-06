<?php

use yii\db\Migration;

class m260906_102443_create_idx_books_isbn_index extends Migration
{
    public string $table = '{{%books}}';
    public string $index = 'idx_books_isbn';

    public function safeUp()
    {
        $this->createIndex(
            $this->index,
            $this->table,
            ['isbn']
        );
    }

    public function safeDown()
    {
        $this->dropIndex(
            $this->index,
            $this->table
        );
    }
}
