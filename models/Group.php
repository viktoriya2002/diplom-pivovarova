<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string $name
 * @property int $age_id
 * @property string $number
 *
 * @property AgeGroup $age
 * @property Child[] $children
 * @property News[] $news
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'age_id', 'number'], 'required'],
            [['age_id'], 'integer'],
            [['name'], 'string', 'max' => 400],
            [['number'], 'number'],
            [['number'], 'string', 'max' => 200],
            [['age_id'], 'exist', 'skipOnError' => true, 'targetClass' => AgeGroup::class, 'targetAttribute' => ['age_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название группы',
            'age_id' => 'Возрастная категория группы',
            'number' => 'Количество детей в группе (чел.)',
        ];
    }

    /**
     * Gets query for [[Age]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAge()
    {
        return $this->hasOne(AgeGroup::class, ['id' => 'age_id']);
    }

    /**
     * Gets query for [[Children]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::class, ['group_id' => 'id']);
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['group_id' => 'id']);
    }
}
