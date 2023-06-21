<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $day
 * @property string $breakfast
 * @property string $second_br
 * @property string $lunch
 * @property string $dinner
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day', 'breakfast', 'second_br', 'lunch', 'dinner'], 'required'],
            [['day'], 'string'],
            [['breakfast', 'second_br', 'lunch', 'dinner'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day' => 'День недели',
            'breakfast' => 'Завтрак',
            'second_br' => 'Второй завтрак',
            'lunch' => 'Обед',
            'dinner' => 'Полдник',
        ];
    }
}
