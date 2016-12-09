<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table`.
 */
class m161206_022442_create_table_table extends Migration
{
    public function up()
    {
        $this->createTable('table', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'description' => $this->string()->notNull(),
            'image' => $this->string(),
            'price' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('table');
    }
}
