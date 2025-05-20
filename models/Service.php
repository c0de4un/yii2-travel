<?php

use yii\db\ActiveRecord;

/**
 * @property int            id
 * @property string         name
 * @property string         starts_at
 * @property string         ends_at
 * @mixin ActiveRecord
 */
class Service extends ActiveRecord
{
    public int $id;
    public string $name;
    public string $starts_at;
    public string $ends_at;

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%services}}';
    }
}
