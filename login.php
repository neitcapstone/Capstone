<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <div class="wrapper">
            <h1>Capstone</h1>
            <div id="form_wrapper" class="form_wrapper">
                <form class="login active">
                    <h3>Login</h3>
                    <div>
                        <label>Username:</label>
                        <input type="text" autofocus required />
                        <span class="error">This is an error</span>
                    </div>
                    <div>
                        <label>Password: <a href="forgotPassword.php" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
                        <input type="password" required/>
                        <span class="error">This is an error</span>
                    </div>
                    <div class="bottom">
                        <div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>
                        <input type="submit" value="Login"></input>
                        <a href="register.php" rel="register" class="register linkform">You don't have an account yet? Register here</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>