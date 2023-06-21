<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $login;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['login', 'password'], 'required'],
            [['password'], 'match', 'pattern'=>'/^[A-aZ-z0-9\s]{5,}$/u',  'message'=>'Используйте только символы латинского языка, минимум символов: 5'],
            [['login'], 'match', 'pattern'=>'/^[A-aZ-z0-9\s]{3,}$/u', 'message'=>'Используйте только символы латинского языка, минимум символов: 3'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if ($user && Yii::$app->security->validatePassword($this->password, $user->password)) { 
                return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0); 
            } else { 
                $this->addError($attribute, 'Неправильный логин или пароль'); 
        }
    }
}

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
          return Yii::$app->user->login($this->getUser(),  $this->rememberMe ? 3600*24*30 : 0);
        
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByLogin($this->login);
        }

        return $this->_user;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }
}
