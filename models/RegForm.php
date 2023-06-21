<?php

namespace app\models;

use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
use Yii;

class RegForm extends User 
{
    public $confirm_password;
    public $agree;

    /*public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }*/

    public function rules()
    {   
        return [
            [['fio', 'phone', 'email', 'adress', 'password', 'agree', 'login', 'confirm_password'], 'required'],
            [['fio'], 'match', 'pattern'=>'/^[А-Яа-яЁё\s]{5,}$/u',  'message'=>'Используйте только символы кириллицы, минимум символов: 5'],
            [['password'], 'match', 'pattern'=>'/^[A-aZ-z0-9\s]{5,}$/u',  'message'=>'Используйте только символы латинского языка, минимум символов: 5'],
            [['login'], 'match', 'pattern'=>'/^[A-aZ-z0-9\s]{3,}$/u', 'message'=>'Используйте только символы латинского языка, минимум символов: 3'],
            [['fio'], 'string', 'max' => 250],
            [['email'], 'email'],
            [['login'], 'unique'],
            [['phone', 'email', 'place', 'post', 'login', 'password'], 'string', 'max' => 200],
            [['phone'], 'number'],
            [['agree'], 'compare', 'compareValue'=>true, 'message'=>''],
            [['confirm_password'], 'compare', 'compareAttribute'=>'password'],
            [['adress'], 'string', 'max' => 400],
            [['place', 'post', 'adress'], 'match', 'pattern'=>'/^[А-Яа-яЁё\s\d\W]{3,}$/u'],
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
            'confirm_password' => 'Повторите пароль',
            'agree' => 'Согласие на обработку персональных данных',
        ];
    }
}

 ?>