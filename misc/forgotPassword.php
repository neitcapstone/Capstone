<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Forgot Password</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <div class="wrapper">
            <h1>Capstone</h1>
            <div id="form_wrapper" class="form_wrapper">
                <form class="forgot_password active">
                    <h3>Forgot Password</h3>
                    <div>
                        <label>Username or Email:</label>
                        <input type="text" required />
                        <span class="error">This is an error</span>
                    </div>						
                    <div class="bottom">
                        <input type="submit" value="Send reminder"></input>
			<a href="login.php" rel="login" class="login linkform">Suddenly remebered? Log in here</a>
			<a href="register.php" rel="register" class="register linkform">You don't have an account? Register her</a>
                    </div>
		</form>
            </div>
        </div>
    </body>
</html>