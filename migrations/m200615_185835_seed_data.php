<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m200615_185835_seed_data
 */
class m200615_185835_seed_data extends Migration
{
    public function safeUp(): void
    {
        $this->insert('{{%users}}', [
            'username' => 'webmaster',
            'auth_key' => Yii::$app->getSecurity()->generateRandomString(),
            'password_hash' => Yii::$app->getSecurity()->generatePasswordHash('webmaster'),
            'password_reset_token' => 'empty',
            'email' => 'webmaster@example.com',
            'status' => User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    public function safeDown(): void
    {
        $this->delete('{{%users}}', [
            'id' => 1
        ]);
    }
}
