    <?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use app\controllers\SiteController;
    use app\core\Application;
    use app\controllers\AuthController;

    $config = ['userClass' => \app\models\User::class];


    $app = new Application($config);

    $app->router->get('/', [SiteController::class, 'index']);
    $app->router->get('/login', [SiteController::class, 'login']);
    $app->router->get('/register', [SiteController::class, 'register']);
    $app->router->get('/logout', [SiteController::class, 'logout']);
    $app->router->get('/welcome', [SiteController::class, 'welcome']);

    $app->router->post('/login', [AuthController::class, 'login']);
    $app->router->post('/register', [AuthController::class, 'register']);

    $app->run();
