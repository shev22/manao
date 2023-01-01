<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\core\Application;
use app\models\RegisterModel;

class AuthController 

{

    public function login()
    {

           // $data = Application::$app->request->getData();
      
    }

    public function register()
    {
        $registerModel = new RegisterModel;
       
            $registerModel->loadData( Application::$app->request->getData());

            if( $registerModel->validate() &&  $registerModel->register())
            {
                return 'success';
            }
               echo' <pre>';
            var_dump($registerModel->errors);
                  echo' </pre>';
              //  echo json_encode( $registerModel->errors );

                $registerModel->errors;
              
             
           // return  Application::$app->router->renderView('register',   ['model'=>   $registerModel ] );
    }
    
}