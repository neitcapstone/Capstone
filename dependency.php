
<?php

    spl_autoload_register(function($class) 
                { 
                    include 'class/'.$class . '.php';
                });

    session_start();
    session_regenerate_id(true);

    $token = uniqid();
    $_SESSION['token'] = $token;

    if ( isset( $_SESSION['last_activity'] ) && isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true && time() > $_SESSION['last_activity'] + Config::MAX_SESSION_TIME)
            {            
                echo "Sorry timed out<br />";
                session_destroy();
            }
            else
                {
                    $_SESSION['last_activity'] = time();
                }

?>