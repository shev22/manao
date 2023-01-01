<?php
namespace app\core;




class Application
{

    public Router $router;
    public static Application $app;
    public Request $request;

    public function __construct()
    {
       self::$app = $this;
        $this->request = new Request;
        $this->router = new Router( $this->request);
    }

   
        public function run()
        {
          echo $this->router->resolve();
        }
    
}