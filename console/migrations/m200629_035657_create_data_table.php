<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m200629_035657_create_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET UTF8';

        $this->createTable('{{%data}}', [
            'id' => $this->string(),
            'internal_id' => $this->string(),
            'last_modify' => $this->string(),
            'regulator' => $this->text(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data}}');
    }
}
