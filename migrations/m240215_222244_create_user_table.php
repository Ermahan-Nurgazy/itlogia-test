<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m240215_222244_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull()->unique(),
            'username' => $this->string(20)->notNull()->unique(),
            'password_hash' => $this->string(60)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'recovery_token' => $this->string(50)->unique()
        ]);

        $this->insert('{{%user}}',[
            'name' => 'Ермахан',
            'username' => 'ermahan',
            'password_hash' => Yii::$app->security->generatePasswordHash('Qwerty'),
            'auth_key' => Yii::$app->security->generateRandomString()
        ]);
        $this->insert('{{%user}}',[
            'name' => 'Нургазы',
            'username' => 'nurgazy',
            'password_hash' => Yii::$app->security->generatePasswordHash('Qwerty'),
            'auth_key' => Yii::$app->security->generateRandomString()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
