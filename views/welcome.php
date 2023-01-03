<?php
    use app\core\Application;

   if( Application::$app->user)
   {
    echo '<h3> Welcome ' . Application::$app->user['name'] . '</h3>';
   }
    ?> 