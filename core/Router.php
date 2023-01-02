<?php
namespace app\core;

class Router
{
    protected array $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        //  echo '<pre>';
        //  var_dump(   $callback);
        //  echo   '<pre>';

        if ($callback === false) {
            return 'not found';
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        echo call_user_func($callback);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
        //include_once Application::$ROOT_DIR."/views/$view.php";
    }

    protected function layoutContent()
    {
        ob_start();
        include_once __DIR__ . '/../views/layouts/main.php';
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }
}
