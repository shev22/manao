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
        Application::$app->router->title = 'Manao Home';
        return Application::$app->router->renderView('index');
    }

    public function login()
    {
        Application::$app->router->title = 'Login';
        if (Application::$app->user) {
            Application::$app->response->redirect('/');        
        }
        return Application::$app->router->renderView('login');
    }

    public function register()
    {
        Application::$app->router->title = 'Register';
        if (Application::$app->user) {
            Application::$app->response->redirect('/');
        }

        return Application::$app->router->renderView('register');
    }

    public function welcome()
    {
        Application::$app->router->title = 'Welcome';

        if (Application::$app->user) {
            return Application::$app->router->renderView('welcome');
        }
       
        Application::$app->response->redirect('login');
        Application::$app->session->setFlash('warning', 'Please Login to access this Page');
    }

    public function profile()
    {
        Application::$app->router->title = 'My Profile';
        if (Application::$app->user) {
            return Application::$app->router->renderView('profile');
        }
        Application::$app->response->redirect('login');
    }
}
