<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @property int            id
 * @property string         name
 * @property string         starts_at
 * @property string         ends_at
 * @property Attribute[]    service_attributes
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

    public function getServiceAttributes(): ActiveQuery
    {
        return $this->hasMany(Attribute::class, [
            'owner_class' => 'Service',
            'owner_id'    => 'id',
        ]);
    }
}
