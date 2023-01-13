<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\core\Application;
use app\core\LoginForm;
use app\models\User;

class AuthController
{
    public static array $data;

    public function login()
    {
        $loginForm = new LoginForm();
        $loginForm->loadData(Application::$app->request->getData());
        if ($loginForm->validate() && $loginForm->login()) {
            self::$data['success'] = true;
            self::$data['message'] = 'Signing in...';
        } else {
            self::$data['success'] = false;
            self::$data['errors'] = $loginForm->errors;
        }
        echo json_encode(self::$data);
    }

    public function register()
    {
        $user = new User();
        $user->loadData(Application::$app->request->getData());
        if ($user->validate() && $user->register()) {
            self::$data['success'] = true;
            self::$data['message'] = 'Registering...';
        } else {
            self::$data['success'] = false;
            self::$data['errors'] = $user->errors;
        }
        echo json_encode(self::$data);
    }

    public function logout()
    {
        Application::$app->logout();
        Application::$app->response->redirect('/');
    }
}
