<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "child".
 *
 * @property int $id
 * @property string $fio
 * @property string $date_birth
 * @property string $gender
 * @property int|null $group_id
 * @property int $user_id
 * @property string $adress
 * @property string $description
 * @property string $status
 *
 * @property Group $group
 * @property User $user
 */
class Child extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'child';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'date_birth', 'gender', 'user_id', 'adress', 'description'], 'required'],
            [['fio'], 'match', 'pattern'=>'/^[А-Яа-яЁё\s]{5,}$/u',  'message'=>'Используйте только символы кириллицы, минимум символов: 5'],
            //[['description', 'adress'], 'match', 'pattern'=>'/^[а-я]\w*$/i'],
            [['adress'], 'match', 'pattern'=>'/^[А-Яа-яЁё\s\d\W]{5,}$/u'],
            [['gender', 'status'], 'string'],
            [[ 'user_id'], 'integer'],
            [['fio', 'adress'], 'string', 'max' => 500],
            //[['date_birth'], 'string', 'max' => 200],
            
            [['date_birth'], 'date', 'max' => date('Y-m-d'), 'tooBig' => 'Выбранная дата не может быть позже сегодняшнего дня', 'format' => 'Y-m-d'],
            //[['date_birth'], 'date', 'max' => date('d-m-Y'), 'tooBig' => 'Выбранная дата не может быть больше сегодняшней даты.'],
            
            [['description'], 'string', 'max' => 700],
          //  [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
        
        
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО ребенка',
            'date_birth' => 'Дата рождения',
            'gender' => 'Пол',
            'group_id' => 'Группа',
            'user_id' => 'ФИО родителя',
            'adress' => 'Адрес проживания',
            'description' => 'Доп. информация',
            'status' => 'Статус',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
   
}
