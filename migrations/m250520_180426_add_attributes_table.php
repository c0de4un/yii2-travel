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

        $this->createIndex('attributes_owner_idx', 'attributes', 'owner_id, owner_class');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('attributes_owner_idx', 'attributes');

        $this->dropTable('attributes');

        return true;
    }
}
