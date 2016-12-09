<?php

use yii\db\Migration;

class m161206_125322_create_table_shift extends Migration
{
    public function up()
    {
        $this->createTable('shift', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'time' => $this->string()->notNull(),
            'description' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shift');
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
