<?php

namespace app\core;

use app\models\User;

class LoginForm extends Model
{
    public $login;
    public $password;

    public function rules(): array
    {
        return [
                   'login' => [self::RULE_REQUIRED],
                     'password' => [self::RULE_REQUIRED],
            ];
    }

    public function login()
    {
        $user = [];
        $this->setjsonData();
        foreach ($this->stored_users as $value) {
            if ($this->login == $value['login']) {
                if (password_verify($this->password, $value['password'])) {
                            $user = $value;
                         return Application::$app->login( $user);
                        //return true;
                }else{
                    $this->addError('password', $this->errorMessages()['password']);
                    return false;
                }
            }
        }
         $this->addError('login', $this->errorMessages()['login']);
     
    }



}
