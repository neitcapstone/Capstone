<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        
        <?php
        if (isset($_POST["EditData"]) == 'Edit/Update Data'){
            header("Location:tableCrud.php");
        } 
        else if (isset($_POST["ManageUsers"]) == 'Manage Users'){
            header("Location:sub_user_admin.php");
        }
        else if (isset($_POST["AddEntity"]) == 'Add New Entity'){
            header("Location:wizard_0.php");
        }
        
        
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
        <?php print_r($_SESSION); //if( isset($_SESSION['bool'])) echo $_SESSION; ?>
        <div id="divOne">

        </div>
        <br />
        <br />
         <div class="wrapper">
            <div id="form_wrapper" class="form_wrapper">
                <form class="login active" name="loginform" method="post">
                        <table>
                            <tr>
                            <td><input type="submit" name="EditData" value="Edit/Update Data"></input></td>
                            <td><input type="submit"  name="ManageUsers" value="Manage Users"</input></td>
                            </tr>
                            <tr>
                            <td><input type="submit"  name="AddEntity" value="Add New Entity"</input></td>
                            <td><input type="submit"  name="Themes" value="Themes"</input></td>
                            </tr>
                        </table>
                   
                </form>
            </div>
              <a href="admin.php?logout=1">LOGOUT</a>
        </div>
        
    </body>
</html>