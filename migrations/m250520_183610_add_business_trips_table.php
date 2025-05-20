<?php

use yii\db\Migration;

class m250520_183610_add_business_trips_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('business_trips', [
            'id'        => $this->primaryKey(),
            'name'      => $this->string('128'),
            'starts_at' => $this->dateTime()->null(),
            'ends_at'   => $this->dateTime()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('business_trips');

        return true;
    }
}
