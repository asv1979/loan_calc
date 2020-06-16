<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%loans}}`.
 */
class m200616_120659_create_loans_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%loans}}', [
            'id' => $this->primaryKey(),
            'start_date' => $this->string(10),
            'sum' => $this->integer(),
            'month_term' => $this->integer(),
            'year_percent' => $this->integer(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%loans}}');
    }
}
