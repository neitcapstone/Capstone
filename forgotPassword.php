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
        <?php

            
    
        ?>
        <div class="wrapper">
            <h1>Capstone</h1>
            <div id="form_wrapper" class="form_wrapper">
                <form class="forgot_password active">
                    <h3>Forgot Password</h3>
                    <div>
                        <label>Email</label>
                        <input type="text" name="email" required />
                        <label>What is your mother's maiden name?</label>
                        <input type="text" name="maiden_name" required />
                    </div>						
                    <div class="bottom">
                        <input type="submit" value="submit"></input>
			<a href="login.php" rel="login" class="login linkform">Suddenly remembered? Log in here</a>
                        <a href="signup.php" rel="signup" class="register linkform">You don't have an account? Register her</a>
                    </div>
		</form>
            </div>
        </div>
    </body>
</html>