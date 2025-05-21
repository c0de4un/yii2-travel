<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int            id
 * @property int            user_id
 * @mixin ActiveRecord
 */
class UserBusinessTrip extends ActiveRecord
{
    public int $id;
    public string $name;

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }
}
