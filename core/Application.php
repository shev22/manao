<?php

namespace app\core;

use app\core\View;
use app\models\User;
use app\core\Response;

class Application
{
    public ?array $user;
    public Router $router;
    public Cookie $cookie;
    public Request $request;
    public Session $session;
    public string $userClass;
    public Response $response;
    public static Application $app;

    public function __construct($config)
    {
        self::$app = $this;
        $this->cookie = new Cookie();
        $this->request = new Request();
        $this->session = new Session();
        $this->response = new Response();
        $this->userClass = $config['userClass'];
        $this->router = new Router($this->request, $this->response);

        $sessionId = $this->session->get('user');

        if ($sessionId) {
            $this->user = $this->userClass::getActiveUser($sessionId);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function login(array $user)
    {
        $this->user = $user;
        $userId = $user['id'];
        $this->session->set('user', $userId);
        $this->cookie->setCookie('user', $userId);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
}
