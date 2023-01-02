<?php

namespace app\core;

abstract class DbModel extends Model
{
    public $stored_users = [];

    abstract public function attributes(): array;

    private function jsonFile()
    {
        return __DIR__ . '/../data.json';
    }

    public function save()
    {
        $this->stored_users = json_decode(
            file_get_contents($this->jsonFile()),
            true
        );

        $attributes = $this->attributes();
        array_push($this->stored_users, $attributes);

        if (
            file_put_contents(
                $this->jsonFile(),
                json_encode($this->stored_users, JSON_PRETTY_PRINT, LOCK_EX)
            )
        ) {
            $data['message'] = 'Success!';
            echo json_encode($data);
        }
    }
}
