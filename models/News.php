<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property int $group_id
 * @property string $description
 * @property string $time
 * @property string|null $photo
 *
 * @property Group $group
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'group_id', 'description'], 'required'],
            [['group_id'], 'integer'],
            [['time'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500],
            [['photo'], 'file',  'extensions' => ['png', 'jpg', 'gif'],'skipOnEmpty' => false ],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Заголовок',
            'group_id' => 'Номер группы',
            'description' => 'Описание записи',
            'time' => 'Время создания',
            'photo' => 'Изображение',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Group::class, ['id' => 'group_id']);
    }
}
