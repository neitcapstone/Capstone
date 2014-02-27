<?php include 'dependency.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    
    <body>
        <?php

         $entryErrors = array();
         if ( count($_POST) ) 
             {             
                $signupClass = new Signup();            
                if($signupClass->entryIsValid() )
                    {  
                        
                    $signupClass->saveEntry();

                            
                            $userID = intval($_SESSION["iduser"]["iduser"]);
                            $db = new DB();
                            $db = $db->getDB();
                            if (null != $db) {
                                $stmt = $db->prepare('insert into tablesused set iduser = :iduserValue;'
                                        .'update tablesused set type = 3 where iduser = :iduserValue; ');
                                $stmt->bindParam(':iduserValue', $userID, PDO::PARAM_INT);
                                $stmt->execute();
                                header("Location: login.php");
                            }
                           

             }
             }
        ?>
        
        <div class="wrapper">
            <h1>Capstone</h1>
            <div id="form_wrapper" class="form_wrapper">
                <form class="register active" name="registerform" action="signup.php" method="post">
                    <h3>Register</h3>							
                    <div>
                        <label>First Name:</label>
                        <input type="text" name="fName" required/>
                        <?php if (!empty($entryErrors['fName']) ) 
                            {
                                echo '<p>' , $entryErrors['fName'], ' </p>';
                            }  
                        ?>  
                    </div>
                    
                    <div>
                        <label>Last Name:</label>
                        <input type="text" name="lName" required/>
                        <?php if (!empty($entryErrors['lName']) ) 
                            {
                                echo '<p>' , $entryErrors['lName'], ' </p>';
                            }  
                        ?>
                    </div>
                    
                    <div>
                        <label>Email:</label>
                        <input type="text" name="email" required/>
                        <?php if (!empty($entryErrors['email']) ) 
                            {
                                echo '<p>' , $entryErrors['email'], ' </p>';
                            }  
                        ?>
                    </div>
                    
                    <div>
                        <label>Password:</label>
                        <input type="password" name="password" required/>
                        <?php if (!empty($entryErrors['password']) ) 
                            {
                                echo '<p>' , $entryErrors['password'], ' </p>';
                            }  
                        ?>
                    </div>
                     <div>
                         <label>Select a security question.</label>
                         <p><select name="Security" method=''>
                             <option value="1">What is your mother's maiden name?</option>
                             <option value="2">What was your first car?</option>
                             <option value="3">What is your first pet's name?</option>
                             <option value="4">What is street did you grow up on?</option>
                         </select>
                             </p>
                    </div>
                    <div>
                        <label>Security Answer:</label>
                        <input type="text" name="security_answer" required/>
                        <?php if (!empty($entryErrors['password']) ) 
                            {
                                echo '<p>' , $entryErrors['password'], ' </p>';
                            }  
                        ?>
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