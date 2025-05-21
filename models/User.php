<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int            id
 * @property string         name
 * @mixin ActiveRecord
 */
class User extends ActiveRecord
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

    public static function getList()
    {
        return static::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();
    }
}
