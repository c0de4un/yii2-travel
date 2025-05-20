<?php

use yii\db\Schema;
use yii\db\Migration;

class m250520_164050_add_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('services', [
            'id'        => Schema::TYPE_PK,
            'name'      => Schema::TYPE_STRING . ' NOT NULL',
            'starts_at' => Schema::TYPE_DATETIME,
            'ends_at'   => Schema::TYPE_DATETIME,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('services');

        return true;
    }
}
