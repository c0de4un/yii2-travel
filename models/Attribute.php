<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int            id
 * @property int            owner_id
 * @property string         owner_class
 * @property string         key
 * @property string         value
 * @mixin ActiveRecord
 */
class Attribute extends ActiveRecord
{
    public int $id;
    public int $owner_id;
    public string $owner_class;
    public string $key;
    public string $value;

    /**
     * @inheritDoc
     */
    public static function tableName()
    {
        return '{{%attributes}}';
    }
}
