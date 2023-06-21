<?php

namespace app\models;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $phone
 * @property string $email
 * @property string $adress
 * @property string|null $place
 * @property string|null $post
 *
 * @property Child[] $children
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
/**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
     public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }
     public function getId()
    {
        return $this->id;
    }
     public function getAuthKey()
    {
        return ;
    }
     public function validateAuthKey($authKey)
    {
        return ;
    }
     public function validatePassword($password)
     {
     return $this->password==$password;
     }

     /*public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }*/

     public static function findByLogin($login)
     {
         return self::find()->where(['login' => $login])->one();
     }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'phone', 'email', 'adress', 'login', 'password'], 'required'],
            [['fio'], 'string', 'max' => 500],
            [['phone', 'email', 'place', 'post', 'login', 'password'], 'string', 'max' => 200],
            [['adress'], 'string', 'max' => 400],
            [['admin'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'phone' => 'Телефон',
            'email' => 'Почта',
            'adress' => 'Адрес проживания',
            'place' => 'Место работы (необязательно)',
            'post' => 'Должность (необязательно)',
            'login' => 'Логин',
            'password' => 'Пароль',
            'admin' => 'Админ',
        ];
    }

    /**
     * Gets query for [[Children]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::class, ['user_id' => 'id']);
    }
}
