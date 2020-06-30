<?php

use yii\db\Migration;

/**
 * Class m200629_034118_add_default_user
 */
class m200629_034118_add_default_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => 'OmjL4IQ5zMVu9k189Y9UuQ_Iq19VW7sO',
            'password_hash' => '$2y$13$NLnueZOFjKW2uzSIRJSF5OGnxCGcXQdWGHUdecA1vkjg6KsIz7LRy', // password
            'email' => 'admin@admin.com',
            'status' => 10,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['username' => 'admin']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200629_034118_add_default_user cannot be reverted.\n";

        return false;
    }
    */
}
