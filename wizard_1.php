<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sales Entity Selection</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <?php
 
        
        if (isset($_POST["customer"]) || isset($_POST["location"])
                 || isset($_POST["employees"]) || isset($_POST["inventory"])
                || isset($_POST["sales"])){
            var_dump($_POST);
        }
        else
        {
            echo"<h1>BOO!!</h1>";
        }
        


        ?>
        <div class="wrapper">
            <div id="form_wrapper" class="form_wrapper">
                <form class="login active" method="post">
                    <h3>What type of Sales-entities are you tracking?</h3>
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
