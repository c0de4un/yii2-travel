<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @property int            id
 * @property string         name
 * @property string|null    starts_at
 * @property string|null    ends_at
 * @mixin ActiveRecord
 */
class Service extends ActiveRecord
{
    public int $id;
    public string $name;
    public ?string $starts_at;
    public ?string $ends_at;

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%business_trips}}';
    }
}
