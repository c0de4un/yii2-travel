<?php

use yii\db\Migration;

class m250520_180426_add_attributes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('attributes', [
            'id'          => $this->primaryKey(),
            'owner_id'    => $this->bigInteger(),
            'owner_class' => $this->string(32),
            'key'         => $this->string(32),
            'value'       => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('attributes');
        return true;
    }
}
