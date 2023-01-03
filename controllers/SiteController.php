<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\core\Application;
use app\models\RegisterModel;

class SiteController
{
    public function index()
    {
        return Application::$app->router->renderView('index');
    }

    public function login()
    {
        return Application::$app->router->renderView('login');
    }

    public function register()
    {
        return Application::$app->router->renderView('register');
    }

    public function logout()
    {
       Application::$app->logout();
       Application::$app->response->redirect('/');
    }

    public function welcome()
    {
        return Application::$app->router->renderView('welcome');
    }
}
