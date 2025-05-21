<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property string|null $starts_at
 * @property string|null $ends_at
 *
 * @property User[] $users
 */
class BusinessTrip extends ActiveRecord
{
    public $userIds = [];

    public static function tableName()
    {
        return 'business_trips';
    }

    public function rules()
    {
        return [
            [['name', 'userIds'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['starts_at', 'ends_at'], 'safe'],
            [['userIds'], 'each', 'rule' => ['integer']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'userIds' => 'Участники',
            'starts_at' => 'Начало',
            'ends_at' => 'Окончание',
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])
            ->viaTable('users_business_trips', ['trip_id' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        // Обновляем связи с пользователями
        if (!empty($this->userIds)) {
            $this->updateUsers();
        }
    }

    protected function updateUsers()
    {
        $currentUserIds = $this->getUsers()->select('id')->column();
        $newUserIds = $this->userIds;

        // Удаляем отсутствующих пользователей
        $toDelete = array_diff($currentUserIds, $newUserIds);
        if (!empty($toDelete)) {
            UsersBusinessTrips::deleteAll(['trip_id' => $this->id, 'user_id' => $toDelete]);
        }

        // Добавляем новых пользователей
        $toInsert = array_diff($newUserIds, $currentUserIds);
        foreach ($toInsert as $userId) {
            $relation = new UsersBusinessTrips([
                'trip_id' => $this->id,
                'user_id' => $userId,
            ]);
            $relation->save();
        }
    }

    public static function getList()
    {
        return static::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();
    }
}