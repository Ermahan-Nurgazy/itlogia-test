<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 */
class m240215_230853_create_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => 'TEXT',
        ]);

        $this->insert('{{%lesson}}',[
            'title' => 'Введение',
            'description' =>
                '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Morbi et velit quis mi viverra posuere. Donec sem lorem, mattis id pretium non, suscipit vel leo.
                Curabitur pharetra cursus sagittis. Donec tempus elementum vulputate. Vivamus sed pellentesque metus. 
                Morbi rhoncus, nunc in tincidunt cursus, ligula dui efficitur eros, a lobortis nibh ex ac diam. 
                Proin scelerisque ut sapien sit amet consectetur.</span></p>'
                .'<br><br>'
                .'<iframe width="420" height="315" src="https://www.youtube.com/embed/c9Wg6Cb_YlU"></iframe>'
        ]);
        $this->insert('{{%lesson}}',[
            'title' => 'Вайрфреймы и их типы',
            'description' =>
                '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Morbi et velit quis mi viverra posuere. Donec sem lorem, mattis id pretium non, suscipit vel leo.
                Curabitur pharetra cursus sagittis. Donec tempus elementum vulputate. Vivamus sed pellentesque metus. 
                Morbi rhoncus, nunc in tincidunt cursus, ligula dui efficitur eros, a lobortis nibh ex ac diam. 
                Proin scelerisque ut sapien sit amet consectetur.</span></p>'
                .'<br><br>'
                .'<iframe width="420" height="315" src="https://www.youtube.com/embed/c9Wg6Cb_YlU"></iframe>'
        ]);
        $this->insert('{{%lesson}}',[
            'title' => 'Кастомный дизайн для кроссплатформенного приложения',
            'description' =>
                '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Morbi et velit quis mi viverra posuere. Donec sem lorem, mattis id pretium non, suscipit vel leo.
                Curabitur pharetra cursus sagittis. Donec tempus elementum vulputate. Vivamus sed pellentesque metus. 
                Morbi rhoncus, nunc in tincidunt cursus, ligula dui efficitur eros, a lobortis nibh ex ac diam. 
                Proin scelerisque ut sapien sit amet consectetur.</span></p>'
                .'<br><br>'
                .'<iframe width="420" height="315" src="https://www.youtube.com/embed/c9Wg6Cb_YlU"></iframe>'
        ]);
        $this->insert('{{%lesson}}',[
            'title' => 'Разработки дизайна',
            'description' =>
                '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Morbi et velit quis mi viverra posuere. Donec sem lorem, mattis id pretium non, suscipit vel leo.
                Curabitur pharetra cursus sagittis. Donec tempus elementum vulputate. Vivamus sed pellentesque metus. 
                Morbi rhoncus, nunc in tincidunt cursus, ligula dui efficitur eros, a lobortis nibh ex ac diam. 
                Proin scelerisque ut sapien sit amet consectetur.</span></p>'
                .'<br><br>'
                .'<iframe width="420" height="315" src="https://www.youtube.com/embed/c9Wg6Cb_YlU"></iframe>'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lesson}}');
    }
}
