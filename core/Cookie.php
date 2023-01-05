<?php

namespace app\core;

class Cookie
{
  public function setCookie($key, $value)
  {
    return setcookie($key, $value, time() + 86400 * 30, '/');
  }
}
