<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\core\Application;
use app\models\User;

class AuthController
{
    public function login()
    {
        // $data = Application::$app->request->getData();
    }

    public function register()
    {
        $User = new User();
        $User->loadData(Application::$app->request->getData());

        if ($User->validate()) {
            $User->register();
        } else {
            echo json_encode($User->errors);
        }
    }
}
