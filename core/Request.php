<?php

namespace app\core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? false;
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);  //return url before "?"
    }

    
    public function method()  // get request method *(GET / POST)
    {
        return strtolower($_SERVER['REQUEST_METHOD']);  
    }

    public function getData()   // Sanitize special chars from GET and POST request 
    {
        $data = [];

        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $data[$key] = filter_input(
                    INPUT_GET,
                    $key,
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $data[$key] = filter_input(
                    INPUT_POST,
                    $key,
                    FILTER_SANITIZE_SPECIAL_CHARS
                );
            }
        }
      //  var_dump( $data );
        return $data;
    }

}