<!DOCTYPE html>
<?php include 'dependency.php'; ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Service Entity Selection</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <?php
        if (isset($_POST["Next"]) == 'Next') {
    if (isset($_POST["customer"]) || isset($_POST["location"]) || isset($_POST["employees"]) || isset($_POST["sale_service"])) {

        $dbCls = new DB();
        $db = $dbCls->getDB();
        $userID = intval($_SESSION['iduser']['iduser']);
        if (isset($_POST["customer"])) {
            if (NULL != $db) {
                $stmt = $db->prepare('update tablesused set customer_table = 1 where iduser = :iduserValue;'
                        . 'update customer set iduser = :iduserValue, active = 0)');
                $stmt->bindParam(':iduserValue', $userID, PDO::PARAM_STR);
                $stmt->execute();
            }
        }
        if (isset($_POST["location"])) {
            if (NULL != $db) {
                $stmt = $db->prepare('update tablesused set location_table = 1 where iduser = :iduserValue;'
                        . 'update location set iduser = :iduserValue, active = 0)');
                $stmt->bindParam(':iduserValue', $userID, PDO::PARAM_STR);
                $stmt->execute();
            }
        }
        if (isset($_POST["employees"])) {
            if (NULL != $db) {
                $stmt = $db->prepare('update tablesused set employee_table = 1 where iduser = :iduserValue;'
                        . 'update employees set iduser = :iduserValue, active = 0)');
                $stmt->bindParam(':iduserValue', $userID, PDO::PARAM_STR);
                $stmt->execute();
            }
        }
        if (isset($_POST["sales_service"])) {
            if (NULL != $db) {
                $stmt = $db->prepare('update tablesused set service_table = 1 where iduser = :iduserValue;'
                        . 'update sales_service set iduser = :iduserValue, active = 0)');
                $stmt->bindParam(':iduserValue', $userID, PDO::PARAM_STR);
                $stmt->execute();
            }
        }
        if (isset($_POST["schedule"])) {
            if (NULL != $db) {
                $stmt = $db->prepare('update tablesused set service_schedule_table = 1 where iduser = :iduserValue;'
                        . 'update schedule set iduser = :iduserValue, active = 0)');
                $stmt->bindParam(':iduserValue', $userID, PDO::PARAM_STR);
                $stmt->execute();
            }
        }
        header("Location:admin.php");
    }
}
        if (isset($_POST["Back"]) == 'Back'){
            header("Location:wizard_0.php");
        }
?>
        
        <div class="wrapper">
            <div id="form_wrapper" class="form_wrapper">
                <form class="login active" method="post">
                    <h3>What type of Service-entities are you tracking?</h3>
                    <div id="checkbox">
                        <input text-align="center" type="checkbox" name="customer" value="customer">Customer<br/>
                        <input type="checkbox" name="location" value="location">Location<br/>
                        <input type="checkbox" name="employees" value="employees">Employees<br/>
                        <input type="checkbox" name="sales_service" value="sales_service">Sales of Service<br/><br/>
                        <input type="checkbox" name="schedule" value="schedule">Schedule<br/><br/>
                    </div>
                    <div id="footer" class="bottom">
                        <input type="submit" name="Next" value="Next"></input>
                        <input type="submit" name="Back" value="Back"></input>
                    </div>
                </form>
            </div>
        </div>
        
    </body>
</html>
