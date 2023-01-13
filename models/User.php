<?php

namespace app\models;

use app\core\UserModel;
use app\core\Model;

class User extends UserModel
{
    public $name;
    public $lastname;
    public $email;
    public $login;
    public $password;
    public $confirm_password;

    public function attributes(): array
    {
        $id = substr(str_shuffle('0123456789'), 0, 5);

        return [
            'id' => $id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'login' => $this->login,
            'password' => password_hash($this->password, PASSWORD_DEFAULT),
        ];
    }

    public function getActiveUser($id): array
    {
        $users = json_decode(
            file_get_contents(__DIR__ . '/../data.json'),
            true
        );
        $user = [];
        foreach ($users as $value) {
            if ($id == $value['id']) {
                $user = $value;
            }
        }

        return $user;
    }

    public function rules(): array
    {
        return [
            'name' => [
                self::RULE_REQUIRED,
                self::RULE_SPACES,
                self::RULE_ALPHABETICAL,
                [self::RULE_MIN, 'min' => 2],
            ],
            'lastname' => [
                self::RULE_REQUIRED,
                self::RULE_SPACES,
                self::RULE_ALPHABETICAL,
            ],

           'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'value'=>'email'],],
            'login' => [
                self::RULE_REQUIRED,
                self::RULE_SPACES,
                [self::RULE_UNIQUE, 'value' => 'login'],
                [self::RULE_MIN, 'min' => 6],
            ],
            'password' => [
                self::RULE_REQUIRED,
                self::RULE_SPACES,
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
