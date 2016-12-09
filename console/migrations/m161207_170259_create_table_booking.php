<?php

use yii\db\Migration;

class m161207_170259_create_table_booking extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%booking}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'table' => $this->integer()->notNull(),
            'employee_id' => $this->string(32)->notNull(),
            'eat_time' => $this->integer()->notNull(),
            'book_time' => $this->integer()->notNull(),
            'book_status' => $this->string()->notNull()->defaultValue('wait'),
            'money_payed' => $this->integer()->notNull()->defaultValue(0),
            'cost' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%booking}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
