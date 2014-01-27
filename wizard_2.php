<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        
        <div class="wrapper">
            <div id="form_wrapper" class="form_wrapper">
                <form class="login active" method="post">
                    <h3>What type of Service-entities are you tracking?</h3>
                    <div id="checkbox">
                        <input text-align="center" type="checkbox" name="customer" value="customer">Customer<br/>
                        <input type="checkbox" name="location" value="location">Location<br/>
                        <input type="checkbox" name="employees" value="employees">Employees<br/>
                        <input type="checkbox" name="inventory" value="inventory">Inventory<br/>
                        <input type="checkbox" name="sales" value="sales">Sales<br/><br/>
                    </div>
                    <div id="footer" class="bottom">
                        <input type="submit" value="Next"></input>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>
