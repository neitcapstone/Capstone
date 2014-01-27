<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <?php
        
        if ( !empty($errorMsg) ) {
            echo "<p>",$errorMsg,"</p>";
        }
        
        if ( !empty($sucessMsg) ) {
            echo "<p>",$sucessMsg,"</p>";
        }
        
        ?>
        <div class="wrapper">
            <h1>Capstone</h1>
            <div id="form_wrapper" class="form_wrapper">
                <form class="register active" name="registerform" action="signupprocess.php" method="post">
                    <h3>Register</h3>							
                    <div>
                        <label>First Name:</label>
                        <input type="text" name="fName" required/>
                        <span class="error">This is an error</span>
                    </div>
                    <div>
                        <label>Last Name:</label>
                        <input type="text" name="lName" required/>
                        <span class="error">This is an error</span>
                    </div>
                    <div>
                        <label>Email:</label>
                        <input type="text" name="email" required/>
                        <span class="error">This is an error</span>
                    </div>
                    <div>
                        <label>Password:</label>
                        <input type="password" name="password" required/>
                        <span class="error">This is an error</span>
                    </div>
                    <div class="bottom">
                        <input type="submit" value="Submit" />
                        <a href="login.php" rel="login" class="register linkform">You have an account already? Log in here</a>
                    </div>
                </form>
            </div>		
        </div>
    </body>

</html>
