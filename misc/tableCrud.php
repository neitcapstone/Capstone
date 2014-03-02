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

        //$_SESSION["userid"] = 3;
        if(!isset($_SESSION['isLoggedIn'])){
            header("Location:login.php");
        }
        $userAdmin = intval($_SESSION["iduser"]["iduser"]);
        
       // print_r($_SESSION);        
        $tUsed = StoredProc::findTablesUsed($userAdmin);
        //print_r($tUsed);
        ?>
        <div class="wrapper">
            <div id="tabLinks">
                <?php
            if (isset($_GET['logout']) && $_GET['logout'] == 1)
            {
                header('Location: login.php');
                session_destroy();
            }      
                if($tUsed["sale_service_table"]){
                    echo '<a href="?Service-Sales=1" class="fadelinks">Service Sales</a><br /><br />';
                }
                
                if($tUsed["sale_product_table"]){
                    echo '<a href="?Product-Sales=1" class="fadelinks">Product Sales</a><br /><br />';
                }
                
                if($tUsed["customer_table"]){
                    echo '<a href="?Customers=1" class="fadelinks">Customers</a><br /><br />';
                }
                
                if($tUsed["inventory"]){
                    echo '<a href="?Inventory=1" class="fadelinks">Inventory</a><br /><br />';
                }
                
                if($tUsed["employee_table"]){
                    echo '<a href="?Employees=1" class="fadelinks">Employees</a><br /><br />';
                }
                
                if($tUsed["location_table"]){
                    echo '<a href="?Location=1" class="fadelinks">Locations</a><br /><br />';
                }
                
                if($tUsed["product_table"]){
                    echo '<a href="?Products=1" class="fadelinks">Products</a><br /><br />';
                }
                
                if($tUsed["service_schedule_table"]){
                    echo '<a href="?Service-Schedule=1" class="fadelinks">Service Schedule</a><br /><br />';
                }
                
                if($tUsed["service_table"]){
                    echo '<a href="?Service=1" class="fadelinks">Services</a><br /> <br />'; 
                }
                echo ' <a href="admin.php" class="fadelinks">Dashboard</a><br /> <br />';
                echo     '<a href="admin.php?logout=1" href="login.php" class="fadelinks">Logout</a><br /> <br />';


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
        
        if(isset($_POST['edithidinv'])){
           
            $upInv = new EditPage();
            $upInv->updateInventory($_POST['idproduct'], $_POST['idlocation'], $_POST['count'], $_POST['edithidinv']);
        }
        if(isset($_POST['edithidprodsales'])){
            
            $upProdSales = new EditPage();
            $upProdSales->updateProdSales($_POST['idproduct'], $_POST['idlocation'], $_POST['amount'], 
                    $_POST['date'], $_POST['idcustomer'], $_POST['edithidprodsales']);
        }
        if(isset($_POST['edithidserv'])){
            
            $upServ = new EditPage();
            $upServ->updateServTable($_POST['serviceName'], $_POST['desc'], $_POST['price-hour'], $_POST['edithidserv']);
        }
        
        if(isset($_POST['edithidservsales'])){
            
            $upServSales = new EditPage();
            $upServSales->updateServSalesTable($_POST['date'], $_POST['idlocation'], $_POST['idservice'],
                    $_POST['idcustomer'], $_POST['hours'], $_POST['edithidservsales']);
        }
        
        if(isset($_POST['edithidservsched'])){
            
            $upServSched = new EditPage();
            $upServSched->updateServSchedTable($_POST['date'], $_POST['time'], $_POST['idservice'],
                    $_POST['idcustomer'], $_POST['edithidservsched']);
        }
        if(isset($_POST['edithidprod'])){
           
            $upProd = new EditPage();
            $upProd->updateProdTable( $_POST['price'], $_POST['desc'], $_POST['ProdCode'], $_POST['name'], $_POST['edithidprod']);
        }
        
        if(isset($_POST['edithidloc'])){
            //var_dump($_POST);
            $upLoc = new EditPage();
            $upLoc->updateLocTable( $_POST['name'], $_POST['address'], $_POST['state'], $_POST['zip'], $_POST['phone'],$_POST['city'],$_POST['edithidloc']);
        }
        
        if(isset($_POST['edithidcust'])){
            //var_dump($_POST);
            $upCust = new EditPage();
            $upCust->updateCustTable( $_POST['fName'], $_POST['lName'], $_POST['address'], $_POST['state'], $_POST['zip'], $_POST['phone'],
                    $_POST['city'],$_POST['email'],$_POST['edithidcust']);
        }
        
        if(isset($_POST['edithidemp'])){
            //var_dump($_POST);
            $upEmp = new EditPage();
            $upEmp->updateEmpTable( $_POST['fName'], $_POST['lName'], $_POST['address'], $_POST['state'], $_POST['zip'], $_POST['socialSecurity'],
                    $_POST['phone'],$_POST['city'],$_POST['edithidemp']);
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
        echo '<div id="crudDiv">';
            $getGet1 = explode(" ",implode(" ",array_keys($_GET)))[0];
            
            //build edit table
            if(isset($_GET["edit"])){
                //echo  '<div id=tableAdd>EDIT<br /></div>'; 
                echo '<div id=displayAddForm>';
                if(isset($_GET['Customers'])){
                    $editCust = new EditPage();
                    echo $editCust->editCustTable($userAdmin,$_GET["edit"]);
                }else if(isset($_GET['Employees'])){
                    $editEmp = new EditPage();
                    echo $editEmp->editEmpTable($userAdmin,$_GET["edit"]);
                }else if(isset($_GET['Location'])){
                    $editLoc = new EditPage();
                    echo $editLoc->editLocTable($userAdmin,$_GET["edit"]);
                }else if(isset($_GET['Products'])){
                    $editProd = new EditPage();
                    echo $editProd->editProdTable($userAdmin,$_GET["edit"]);
                }else if(isset($_GET['Service'])){
                    $editServ = new EditPage();
                    echo $editServ->editServTable($userAdmin,$_GET["edit"]);
                }else if(isset($_GET['Product-Sales'])){
                    $editProdSales = new EditPage();
                    echo $editProdSales->editProdSalesTable($userAdmin,$_GET["edit"]);
                }else if(isset($_GET['Inventory'])){
                    $editInv = new EditPage();
                    echo $editInv->editInvTable($userAdmin,$_GET["edit"]);
                    //
                }else if(isset($_GET['Service-Sales'])){
                    $editServSales = new EditPage();
                    echo $editServSales->editServSalesTable($userAdmin,$_GET["edit"]);
                }else if(isset($_GET['Service-Schedule'])){
                    $editServSched = new EditPage();
                    echo $editServSched->editServSchedTable($userAdmin,$_GET["edit"]);
                }   
                echo '</div>'; 
            }    
            
            //build add table
            if(isset($_GET["add"])){
              // echo '<div id=tableAdd>Table to Add data<br /></div>';
                   //print_r($_POST);
                   $AUObEdit = new AddUpdate();
                   
                   
                   
                   //echo $getGet1;
                   //calls to add to tables
                   //not done
                   if(isset($_POST['addservsales'])){ 
                       //var_dump($_POST);
                       StoredProc::addServSales($_POST['idlocation'], $_POST['idservice'], $_POST['idcustomer'], $_POST['hours'],  
                               $_POST['date'], $_POST['addservsales']);
                   }else
                       //not done
                    if(isset($_POST['addservsched'])){ 
                       //var_dump($_POST);
                       StoredProc::addServSched($_POST['addservsched'], $_POST['idservice'], $_POST['idcustomer'], $_POST['time'],  
                            $_POST['date']);
                   }else
                   if(isset($_POST['addprodsales'])){                        
                       StoredProc::addProdSales($_POST['idlocation'], $_POST['idproduct'], $_POST['idcustomer'], $_POST['amount'],  
                               $_POST['date'], $_POST['addprodsales']);
                   }else
                   if(isset($_POST['addinv'])){                       
                       StoredProc::addInv($_POST['idproduct'], $_POST['idlocation'], $_POST['count']);
                   }else          
                   if(isset($_POST['add']) && $_POST['add']=='ADD' && $getGet1=='Products'){  
                       StoredProc::addProd($_POST['name'], $_POST['desc'], $_POST['id'], 
                               $_POST['price'], $_POST['ProdCode']);
                   }else                   
                   if(isset($_POST['add']) && $_POST['add']=='ADD' && $getGet1=='Customers'){
                       StoredProc::addCust($_POST['fName'], $_POST['lName'], $_POST['id'], 
                               $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['email'], $_POST['phone']);
                   }else                   
                   if(isset($_POST['add']) && $_POST['add']=='ADD' && $getGet1=='Employees'){                       
                       StoredProc::addEmp($_POST['fName'], $_POST['lName'], $_POST['id'], 
                               $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['socialSecurity'], $_POST['phone']);
                   }else                   
                   if(isset($_POST['add']) && $_POST['add']=='ADD' && $getGet1=='Location'){                      
                       StoredProc::addLoc($_POST['name'], $_POST['id'], 
                               $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['phone']);
                   }else
                       //not done
                   if(isset($_POST['add']) && $_POST['add']=='ADD' && $getGet1=='Service'){ 
                       //var_dump($_POST);
                       StoredProc::addServ($_POST['serviceName'], $_POST['desc'], $_POST['id'], 
                               $_POST['price-hour']);
                   }
                    
                   // echo '<form action="#" method="post">';
                    echo '<form id=displayAddForm action="#" method="post">';
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
                        echo '<input type="hidden" name="addinv" value="',$userAdmin,'" />';
                        echo '<input type="submit" name="create" value="ADD" class="fadelinks" onclick="return confirm(\'Are you sure you want to add this item?\')"/>';
                        
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
                        echo '<input type="hidden" name="addservsales" value="',$userAdmin,'" />';
                        echo '<input type="submit" name="create" value="ADD" class="fadelinks" onclick="return confirm(\'Are you sure you want to add this item?\')" />';
                        
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
                        //echo '<option value="9999">Unregistered</option>';
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
                        echo '</tr><tr>';
                        echo '<th>Date</th>';
                        echo '<th><input type="text" name="date" value="" />';; 
                        echo '</th>';
                        
                        echo '<th>Time</th>';
                        echo '<th><input type="text" name="time" value="" />';; 
                        echo '</th>';
                        
                        echo '</tr></tbody></table>';
                        echo '<input type="hidden" name="addservsched" value="',$userAdmin,'" />';
                        echo '<input type="submit" name="create" value="ADD" class="fadelinks" onclick="return confirm(\'Are you sure you want to add this item?\')"/>';
                        
                        
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
                        //echo '<option value="100">Unregistered</option>';
                        for($i=0;$i<sizeof($cust);$i++){
                            echo '<option value="'.$cust[$i]["idcustomer"].'">'.$cust[$i]["fName"].' '.$cust[$i]["lName"].'</option>';
                        }                        
                        echo '</select>';
                        echo '</th>';
                        echo '</tr><tr>';
                        
                        echo '<th>Amount</th>';
                        echo '<th><input type="text" name="amount" value="" />';
                        echo '</th>';
                        
                        echo '<th>Date</th>';
                        echo '<th><input type="text" name="date" value="" />';
                        echo '</th>';
                        
                        echo '</tr></tbody></table>';
                        echo '<input type="hidden" name="addprodsales" value="',$userAdmin,'" />';
                        echo '<input type="submit" name="create" value="ADD" class="fadelinks" onclick="return confirm(\'Are you sure you want to add this item?\')"/>';
                        
                    }else if(isset($_GET['add'])){
                        
                        //echo '<form action="#" method="post">';
                        echo '<table ><caption>',  $getGet1 ,'</caption><thead><tr>';
                        echo '</tr><tr>';               
                        echo '</tr></thead><tbody>';
                        for($i = 0; $i < sizeof(array_keys($addTableModel));$i++ ){
                        
                        if($i%2==0){
                            echo '</tr><tr>'; 

                            if($i%2==0){
                               echo '</tr><tr>';                            
                            }                        
                        }
                        echo '<th>',array_keys($addTableModel)[$i],'</th>';
                        echo '<th><input type="text" name="',array_keys($addFieldModel)[$i],'" /></th>';
                         
                    }                                
                    echo '</tbody></table>';
                    echo '<input type="hidden" name="id" value="',$userAdmin,'" />';
                    echo '<input type="submit" class="fadelinks" name="add" value="ADD" class="fadelinks" onclick="return confirm(\'Are you sure you want to add this item?\')"/>';                    
                    }                 
                }
                echo '</form>';
                echo '</div>';
        //build data tables
               
        echo '<div id="dataTable">';
        $getGet = explode(" ",implode(" ",array_keys($_GET)))[0];
        //var_dump($_GET);
        if(sizeof($_GET)>0){
            echo '<td><a id="linkAddToTable" href="?',$getGet,'=1&add=',$getGet,'">ADD TO TABLE</a></td>';
        }
        if ( is_array($tableModel) && count($tableModel) ) { 
            
            
            if(isset($_GET["delete"])){
                echo 'DELETED';
                echo AddUpdate::deleteEntry($getGet, $_GET["delete"]);
            } 
            echo '<br /><br /><br /><br />' ;
             
           // print_r($tableModel);
            echo '<table border="1"><caption>',  $getGet ,'</caption><thead><tr>';  
            
                for($i = 0; $i < sizeof(array_keys($tableModel[0]));$i++ ){
                    //if(array_keys($tableModel[0])[$i] != "A"){
                        echo '<th>',array_keys($tableModel[0])[$i],'</th>';
                    //}
                }
                echo '<th>Edit</th> <th>Delete</th>';                
                echo '</tr></thead><tbody>';    
                foreach ($tableModel as $row) {
                    echo '<tr>'; 
                    for($i = 0; $i < sizeof(array_keys($tableModel[0]));$i++ ){
                        //if(array_keys($tableModel[0])[$i] != "A"){
                           // if($row["A"]==1){
                            if(array_keys($tableModel[0])[$i] == "Date" || array_keys($tableModel[0])[$i] == "Receipt Date"){
                                
                            }else{
                               //echo '<td>',[array_keys($tableModel[0])[$i]],'</td>';
                               echo '<td>',$row[array_keys($tableModel[0])[$i]],'</td>';
                            }
                            //}
                        //}
                    }  
                    //if($row["A"]==1){
                        echo '<td><a class="links" href="?',$getGet,'=1&edit=',$row["UniqueID"],'">Edit</a></td>';
                        echo '<td><a class="links fadelinks"  href="?',$getGet,'=1&delete=',$row["UniqueID"],'" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</a></td>';
                    //}    
                    echo '</tr>';
                }
                echo '</tbody></table></div>';                
        }
            echo '</div>';            
        ?>
   


        <div>  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/jscr.js"></script> 
    </body>
</html>
