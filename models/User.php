<?php

namespace app\models;

use app\core\DbModel;
use app\core\Model;

class User extends DbModel
{
    public $name;
    public $email;
    public $login;
    public $password;
    public $confirm_password;

    public function attributes(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'login' => $this->login,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
        ];
    }

    public function rules(): array
    {
        return [
            'name' => [
                self::RULE_REQUIRED,
                self::RULE_ALPHABETICAL,
                [self::RULE_MIN, 'min' => 2],
            ],
            'login' => [
                self::RULE_REQUIRED,
                self::RULE_EXISTS,
                [self::RULE_MIN, 'min' => 6],
            ],
            'email' => [self::RULE_EXISTS, self::RULE_REQUIRED],
            'password' => [
                self::RULE_REQUIRED,
                self::RULE_ALPHA_NUMERICAL,
                [self::RULE_MIN, 'min' => 6],
            ],
            'confirm_password' => [
                self::RULE_REQUIRED,
                [self::RULE_MATCH, 'match' => 'password'],
            ],
        ];
    }

    public function register()
    {
        return $this->save();
    }
}
