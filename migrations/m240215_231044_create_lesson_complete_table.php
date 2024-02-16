<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson_complete}}`.
 */
class m240215_231044_create_lesson_complete_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson_complete}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'lesson_id' => $this->integer()->notNull(),
            'is_read' => $this->boolean()->notNull(),
        ]);

        $this->addForeignKey('fk-lesson_complete-user','{{%lesson_complete}}','user_id','{{%user}}','id', 'CASCADE');
        $this->addForeignKey('fk-lesson_complete-lesson','{{%lesson_complete}}','lesson_id','{{%lesson}}','id', 'CASCADE');

        $this->insert('{{%lesson_complete}}',['user_id' => '1', 'lesson_id' => '1', 'is_read' => false]);
        $this->insert('{{%lesson_complete}}',['user_id' => '1', 'lesson_id' => '2', 'is_read' => false]);
        $this->insert('{{%lesson_complete}}',['user_id' => '1', 'lesson_id' => '3', 'is_read' => false]);
        $this->insert('{{%lesson_complete}}',['user_id' => '1', 'lesson_id' => '4', 'is_read' => false]);
        $this->insert('{{%lesson_complete}}',['user_id' => '2', 'lesson_id' => '1', 'is_read' => false]);
        $this->insert('{{%lesson_complete}}',['user_id' => '2', 'lesson_id' => '2', 'is_read' => false]);
        $this->insert('{{%lesson_complete}}',['user_id' => '2', 'lesson_id' => '3', 'is_read' => false]);
        $this->insert('{{%lesson_complete}}',['user_id' => '2', 'lesson_id' => '4', 'is_read' => false]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lesson_complete}}');
    }
}
