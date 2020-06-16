<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payments}}`.
 */
class m200616_165137_create_payments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%payments}}', [
            'id' => $this->primaryKey(),
            'loan_id' => $this->integer(),
            'date' => $this->string(10),
            'whole_sum' => $this->integer(),
            'body_sum' => $this->integer(),
            'percent_sum' => $this->integer(),
            'balance_owed' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('{{%fk-payments-loan_id}}', '{{%payments}}', 'loan_id', '{{%loans}}', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payments}}');
    }
}
