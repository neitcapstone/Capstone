<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product or Service?</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <?php
        if($_POST["Product"] == 'Product'){
            header("Location:wizard_1.php");
        }

        ?>
        
            <div class="wrapper">
            <div id="form_wrapper" class="form_wrapper">
                <form class="login active" method="post">
                    <h3>What do you provide?</h3>
                  
                    <div id="footer" class="bottom">
                        <table>
                            <tr>
                            <td><input type="submit" name="Product" onclick="" value="Product"></input></td>
                            <td><input type="submit"  name="Service" value="Service"</input></td>
                            </tr>
                        </table>
                        </div>
                </form>
            </div>
        </div>
        
    </body>
</html>
