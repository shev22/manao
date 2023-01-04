<?php

namespace app\core;

abstract class UserModel extends Model
{
    abstract public function attributes(): array;
    abstract public function getActiveUser($id): array;

    public function save()
    {
        $this->setjsonData();
        $attributes = $this->attributes();

        array_push($this->stored_users, $attributes);

        if (
            file_put_contents(
                $this->jsonStorage,
                json_encode($this->stored_users, JSON_PRETTY_PRINT, LOCK_EX)
            )
        ) {
            
            return Application::$app->login($attributes);
        }
    }
}
