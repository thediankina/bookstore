<?php

use yii\db\Migration;

class m260904_145139_create_books_table extends Migration
{
    public string $table = '{{%books}}';
    public string $primaryKey = 'id';

    public function safeUp()
    {
        $this->createTable($this->table, [
            $this->primaryKey => $this->bigInteger()->unsigned()->notNull(),
            'name' => $this->string()->notNull(),
            'publish_year' => $this->smallInteger()->notNull(),
            'description' => $this->text()->notNull(),
            'isbn' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->null(),
            'PRIMARY KEY ([[' . $this->primaryKey . ']])',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
