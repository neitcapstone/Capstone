<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome - Week 5</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        
        <?php
        
        if ( !isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != true)
            {
                header('Location: login.php');
                session_destroy();        
            }

        if (isset($_GET['logout']) && $_GET['logout'] == 1)
            {
                header('Location: login.php');
                session_destroy();
            }      
        
        ?>
        <h1 id="h">Welcome <?php if( isset($_SESSION['email'])) echo $_SESSION['email']; 
        print_r($_SESSION);
        ?></h1>
        <a href="tableCrud.php">CRUD</a>
        <div id="divOne">
            
        </div>
        <br />
        <br />
        
        <a href="admin.php?logout=1">LOGOUT</a>
    </body>
</html>