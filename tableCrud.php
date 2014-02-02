<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Config::PAGE_TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <?php 
        $_SESSION["userid"] = 3;
        $userAdmin = $_SESSION["userid"];
        print_r($_SESSION);        
        $tUsed = StoredProc::findTablesUsed($userAdmin);
        //print_r($tUsed);
        ?>
        <div class="wrapper">
            <div id="tabLinks" style="width: 20%;float:left;">
                <?php
                if($tUsed["sale_service_table"]){
                    echo '<a href="?Service-Sales=1">My Service Sales</a><br /><br />';
                }
                
                if($tUsed["sale_product_table"]){
                    echo '<a href="?Product-Sales=1">My Product Sales</a><br /><br />';
                }
                
                if($tUsed["customer_table"]){
                    echo '<a href="?Customers=1">My Customers</a><br /><br />';
                }
                
                if($tUsed["inventory"]){
                    echo '<a href="?Inventory=1">My Inventory</a><br /><br />';
                }
                
                if($tUsed["employee_table"]){
                    echo '<a href="?Employees=1">My Employees</a><br /><br />';
                }
                
                if($tUsed["location_table"]){
                    echo '<a href="?Location=1">My Locations</a><br /><br />';
                }
                
                if($tUsed["product_table"]){
                    echo '<a href="?Products=1">My Products</a><br /><br />';
                }
                
                if($tUsed["service_schedule_table"]){
                    echo '<a href="?Service-Schedule=1">My Service Schedule</a><br /><br />';
                }
                
                if($tUsed["service_table"]){
                    echo '<a href="?Service=1">My Services</a><br /> <br />'; 
                }
                ?>
            </div>
        <?php        
        //$_SESSION["userid"] = 3;
        //$userAdmin = $_SESSION["userid"];     
        
        $tableModel;
        if(isset($_GET["Service-Sales"])){
            $tableModel = StoredProc::getCompanyServiceSales($userAdmin);
        }else if(isset($_GET["Product-Sales"])){
            $tableModel = StoredProc::getCompanyProductSales($userAdmin);
        }else if(isset($_GET["Customers"])){
            $tableModel = StoredProc::getCustByCompany($userAdmin);
        }else if(isset($_GET["Inventory"])){
            $tableModel = StoredProc::getInvByCompany($userAdmin);
        }else if(isset($_GET["Employees"])){
            $tableModel = StoredProc::getEmpByCompany($userAdmin);
        }else if(isset($_GET["Location"])){
            $tableModel = StoredProc::getLocByCompany($userAdmin);
        }else if(isset($_GET["Products"])){
            $tableModel = StoredProc::getProdByCompany($userAdmin);
        }else if(isset($_GET["Service-Schedule"])){
            $tableModel = StoredProc::getSerSchedByCompany($userAdmin);
        }else if(isset($_GET["Service"])){
            $tableModel = StoredProc::getSerByCompany($userAdmin);
        }else{
            $tableModel = 0;
        }   
        
        //retrieve info from stored procedures based on GET
        $addTableModel;
        $addFieldModel;
        if(isset($_GET["add"])){
            if($_GET["add"]=="Customers"){
                $addTableModel = StoredProc::getAddingCust($userAdmin);
                $addFieldModel = StoredProc::getCustFields($userAdmin);
                //print_r($addTableModel);
            }else if($_GET["add"]=="Employees"){
                $addTableModel = StoredProc::getAddingEmp($userAdmin);
                $addFieldModel = StoredProc::getEmpFields($userAdmin);
            }else if($_GET["add"]=="Location"){
                $addTableModel = StoredProc::addingLoc($userAdmin);
                $addFieldModel = StoredProc::getLocFields($userAdmin);
            }else if($_GET["add"]=="Products"){
                $addTableModel = StoredProc::addingProd($userAdmin);
                $addFieldModel = StoredProc::getProdFields($userAdmin);
            }else if($_GET["add"]=="Service"){
                $addTableModel = StoredProc::addingServ($userAdmin);
                $addFieldModel = StoredProc::getServFields($userAdmin);
            }
        }
        
        //CRUD DIV
        echo '<div style="width: 79%;float:right;">';
            $getGet1 = explode(" ",implode(" ",array_keys($_GET)))[0];
            
            //build edit table
            if(isset($_GET["edit"])){
                echo 'EDIT';                
            }    
            
            //build add table
            if(isset($_GET["add"])){
                echo 'Table to Add data<br />';
                   //print_r($_POST);
                   $AUObEdit = new AddUpdate();
                   if(isset($_POST["create"])){
                        //$displayAddForm = $AUObEdit->addEntryToTable($_POST, $getGet1, $userAdmin);
                        //echo '<br />' , sizeof($_POST);
                   }
                   //echo $displayAddForm;
                    
                    echo '<form action="#" method="post">';
                    //create add table
                    if($_GET["add"]=="Inventory"){
                        $inv = StoredProc::gettingInvByCompany($userAdmin);
                        $loc = StoredProc::gettingLocByCompany($userAdmin);
                        //print_r($loc);
                        
                        echo '<table ><caption>',  $getGet1 ,'</caption><thead><tr>';
                        echo '</tr><tr>';               
                        echo '</tr></thead><tbody>';
                        echo '<tr><th>Product</th>';
                        echo '<th><select name="idproduct">';
                        echo '<option value="">Choose..</option>';
                        for($i=0;$i<sizeof($inv);$i++){
                            echo '<option value="'.$inv[$i]["idproduct"].'">'.$inv[$i]["name"].'</option>';
                        }                        
                        echo '</select>';
                        echo '<th>Location</th>';
                        echo '<th><select name="idlocation">';
                        echo '<option value="">Choose..</option>';
                        for($i=0;$i<sizeof($loc);$i++){
                            echo '<option value="'.$loc[$i]["idlocation"].'">'.$loc[$i]["address"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th>';
                        echo '<th>Amount</th>';
                        echo '<th><input type="text" name="count" value="" />';; 
                        echo '</th>';
                        echo '</tr>';                        
                        echo '</tbody></table>';
                        echo '<input type="hidden" name="id" value="',$userAdmin,'" />';
                        echo '<input type="submit" name="create" value="ADD" />';
                        
                    //product sales add table
                    }else if($_GET["add"]=="Service-Sales"){
                        $serv = StoredProc::gettingServByCompany($userAdmin);
                        $loc = StoredProc::gettingLocByCompany($userAdmin);
                        $cust  = StoredProc::gettingCustByCompany($userAdmin);
                        //print_r($serv);
                        //echo '<form action="#" method="post">';
                        echo '<table ><caption>',  $getGet1 ,'</caption><thead><tr>';
                        echo '</tr><tr>';               
                        echo '</tr></thead><tbody><tr>';
                        
                        echo '<th>Location</th>';
                        echo '<th><select name="idlocation">';
                        echo '<option value="">Choose..</option>';
                        for($i=0;$i<sizeof($loc);$i++){
                            echo '<option value="'.$loc[$i]["idlocation"].'">'.$loc[$i]["address"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th>';
                        
                        echo '<th>Service</th>';
                        echo '<th><select name="idservice">';
                        echo '<option value="">Choose..</option>';
                        for($i=0;$i<sizeof($serv);$i++){
                            echo '<option value="'.$serv[$i]["idservice"].'">'.$serv[$i]["serviceName"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th><th>Customer</th>';
                        
                        echo '<th><select name="idcustomer">';
                        echo '<option value="">Choose..</option>';
                        echo '<option value="9999">Unregistered</option>';
                        for($i=0;$i<sizeof($cust);$i++){
                            echo '<option value="'.$cust[$i]["idcustomer"].'">'.$cust[$i]["fName"].' '.$cust[$i]["lName"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th>';
                        echo '</tr><tr>';
                        
                        echo '<th>Hours Billed</th>';
                        echo '<th><input type="text" name="hours" value="" />';; 
                        echo '</th>';
                        
                        echo '<th>Date</th>';
                        echo '<th><input type="text" name="date" value="" />';; 
                        echo '</th>';
                        
                        echo '</tr></tbody></table>';
                        echo '<input type="hidden" name="id" value="',$userAdmin,'" />';
                        echo '<input type="submit" name="create" value="ADD" />';
                        
                    }else if($_GET["add"]=="Service-Schedule"){
                        $cust  = StoredProc::gettingCustByCompany($userAdmin);
                        $serv = StoredProc::gettingServByCompany($userAdmin);
                        
                       // echo '<form action="#" method="post">';
                        echo '<table ><caption>',  $getGet1 ,'</caption><thead><tr>';
                        echo '</tr><tr>';               
                        echo '</tr></thead><tbody><tr>';
                        echo '<th>Customer</th>';
                        echo '<th><select name="idcustomer">';
                        echo '<option value="">Choose..</option>';
                        echo '<option value="9999">Unregistered</option>';
                        for($i=0;$i<sizeof($cust);$i++){
                            echo '<option value="'.$cust[$i]["idcustomer"].'">'.$cust[$i]["fName"].' '.$cust[$i]["lName"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th>';
                        
                        echo '<th>Service</th>';
                        echo '<th><select name="idservice">';
                        echo '<option value="">Choose..</option>';
                        for($i=0;$i<sizeof($serv);$i++){
                            echo '<option value="'.$serv[$i]["idservice"].'">'.$serv[$i]["serviceName"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th>';
                        
                        echo '<th>Date</th>';
                        echo '<th><input type="text" name="date" value="" />';; 
                        echo '</th>';
                        
                        echo '<th>Time</th>';
                        echo '<th><input type="text" name="time" value="" />';; 
                        echo '</th>';
                        
                        echo '</tr></tbody></table>';
                        echo '<input type="hidden" name="id" value="',$userAdmin,'" />';
                        echo '<input type="submit" name="create" value="ADD" />';
                        
                        
                    }else if($_GET["add"]=="Product-Sales"){
                        $inv = StoredProc::gettingInvByCompany($userAdmin);
                        $loc = StoredProc::gettingLocByCompany($userAdmin);
                        $cust  = StoredProc::gettingCustByCompany($userAdmin);
                        //print_r($inv);
                        echo '<form action="#" method="post">';
                        echo '<table ><caption>',  $getGet1 ,'</caption><thead><tr>';
                        echo '</tr><tr>';               
                        echo '</tr></thead><tbody><tr>';
                        
                        echo '<th>Location</th>';
                        echo '<th><select name="idlocation">';
                        echo '<option value="">Choose..</option>';
                        for($i=0;$i<sizeof($loc);$i++){
                            echo '<option value="'.$loc[$i]["idlocation"].'">'.$loc[$i]["address"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th>';
                        
                        echo '<th>Product</th>';
                        echo '<th><select name="idproduct">';
                        echo '<option value="">Choose..</option>';
                        for($i=0;$i<sizeof($inv);$i++){
                            echo '<option value="'.$inv[$i]["idproduct"].'">'.$inv[$i]["name"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th><th>Customer</th>';
                        
                        echo '<th><select name="idcustomer">';
                        echo '<option value="">Choose..</option>';
                        echo '<option value="9999">Unregistered</option>';
                        for($i=0;$i<sizeof($cust);$i++){
                            echo '<option value="'.$cust[$i]["idcustomer"].'">'.$cust[$i]["fName"].' '.$cust[$i]["lName"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th>';
                        echo '</tr><tr>';
                        
                        echo '<th>Amount</th>';
                        echo '<th><input type="text" name="amount" value="" />';; 
                        echo '</th>';
                        
                        echo '<th>Date</th>';
                        echo '<th><input type="text" name="date" value="" />';; 
                        echo '</th>';
                        
                        echo '</tr></tbody></table>';
                        echo '<input type="hidden" name="id" value="',$userAdmin,'" />';
                        echo '<input type="submit" name="create" value="ADD" />';
                        
                    }else{
                    
                        //echo '<form action="#" method="post">';
                        echo '<table ><caption>',  $getGet1 ,'</caption><thead><tr>';
                        echo '</tr><tr>';               
                        echo '</tr></thead><tbody>';
                        for($i = 0; $i < sizeof(array_keys($addTableModel));$i++ ){
                        if($i%3==0){
                            echo '</tr><tr>'; 

                            if($i%3==0){
                               echo '</tr><tr>';                            
                            }                        
                        }
                        echo '<th>',array_keys($addTableModel)[$i],'</th>'; 
                        echo '<th><input type="text" name="',array_keys($addFieldModel)[$i],'" /></th>';
                    }                                
                    echo '</tbody></table>';
                    echo '<input type="hidden" name="id" value="',$userAdmin,'" />';
                    echo '<input type="submit" name="create" value="ADD" />';
                    
                    }   
                
                }
                echo '</form>';
                echo '</div>';
        //build data tables
               
        echo '<div style="width: 99%;float:left;">';
        if ( is_array($tableModel) && count($tableModel) ) { 
            $getGet = explode(" ",implode(" ",array_keys($_GET)))[0];
            if(isset($_GET["delete"])){
                echo 'DELETED';
                echo AddUpdate::deleteEntry($getGet, $_GET["delete"]);
            } 
            echo '<br /><br /><br /><br />' ;
            echo '<td><a class="links" href="?',$getGet,'=1&add=',$getGet,'">ADD TO TABLE</a></td>';
           // print_r($tableModel);
            echo '<table border="1"><caption>',  $getGet ,'</caption><thead><tr>';  
            
                for($i = 0; $i < sizeof(array_keys($tableModel[0]));$i++ ){
                    if(array_keys($tableModel[0])[$i] != "A"){
                        echo '<th>',array_keys($tableModel[0])[$i],'</th>';
                    }
                }
                echo '<th>Edit</th> <th>Delete</th>';                
                echo '</tr></thead><tbody>';    
                foreach ($tableModel as $row) {
                    echo '<tr>'; 
                    for($i = 0; $i < sizeof(array_keys($tableModel[0]));$i++ ){
                        if(array_keys($tableModel[0])[$i] != "A"){
                            if($row["A"]==1){
                                echo '<td>',$row[array_keys($tableModel[0])[$i]],'</td>';
                            }
                        }
                    }  
                    if($row["A"]==1){
                        echo '<td><a class="links" href="?',$getGet,'=1&edit=',sha1($row["UniqueID"]),'">Edit</a></td>';
                        echo '<td><a class="links" href="?',$getGet,'=1&delete=',$row["UniqueID"],'" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</a></td>';
                    }    
                    echo '</tr>';
                }
                echo '</tbody></table></div>';                
        }
            echo '</div>';            
        ?>
        <div>            
    </body>
</html>
