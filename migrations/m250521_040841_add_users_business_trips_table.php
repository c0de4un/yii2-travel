<?php

use yii\db\Migration;

class m250521_040841_add_users_business_trips_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users_business_trips', [
            'id'        => $this->primaryKey(),
            'user_id'   => $this->integer()->notNull(),
            'trip_id'   => $this->integer()->notNull(),
            'starts_at' => $this->dateTime()->null(),
            'ends_at'   => $this->dateTime()->null(),
        ]);

        $this->addForeignKey(
            'fk_users_business_trips_trip_id',
            'users_business_trips',
            'trip_id',
            'business_trips',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_users_business_trips_user_id',
            'users_business_trips',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_users_business_trips_trip_id', 'users_business_trips');
        $this->dropForeignKey('fk_users_business_trips_user_id', 'users_business_trips');

        $this->dropTable('users_business_trips');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250521_040841_add_users_business_trips_table cannot be reverted.\n";

        return false;
    }
    */
}
