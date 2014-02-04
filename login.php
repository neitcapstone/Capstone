<?php include 'dependency.php'; ?> 

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <?php
       
        $err = "";
        if (isset($_POST['email']) )
            {
                if ( Validator::loginIsValidPost() ) 
                    { 
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION["isLoggedIn"] = true;
                        $_SESSION['iduser'] = StoredProc::getUserAdminId($_POST['email']);
                    }else{
                            $_SESSION["isLoggedIn"] = false; 
                            $err = "Email or Password incorrect";                
                         }
            }  
  
        if ( isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == true ) 
            {
                header("Location: admin.php");
            }   
      
        if( !isset($_SESSION['token']) )
            {
                $_SESSION['token'] = $token;
            }else{
                    if ( isset($_POST['token']) && $_SESSION['token'] != $_POST['token'] )
                        {
                            session_destroy();
                            header("Location:login.php");
                            exit();
                        }
                  }
         ?> 

        <div class="wrapper">
            <h1>Capstone</h1>
            <div id="form_wrapper" class="form_wrapper">
                <form class="login active" name="loginform" action="login.php" method="post">
                    <h3>Login</h3>
                    <div>
                        <label>Email:</label>
                        <input type="text" autofocus required name="email" />
                    </div>
                    <div>
                        <label>Password: <a href="forgotPassword.php" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
                        <input type="password" required name="password"/>
                    </div>
                    <div class="bottom">
                        <div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>
                        <?php echo '<p id="err">', $err, '</p>'; ?>              
                        <input type="submit" value="Submit" />
                        <a href="signup.php" rel="signup" class="register linkform">You don't have an account yet? Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>