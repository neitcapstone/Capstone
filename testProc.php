<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Config::PAGE_TITLE; ?></title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>
    <body>
        <div class="wrapper">
            <div id="tabLinks" style="border:1px black solid;width: 29%;float:left;">
                <a href="?Service-Sales=1">My Service Sales</a><br /><br />
                <a href="?Product-Sales=1">My Product Sales</a><br /><br />
                <a href="?Customers=1">My Customers</a><br /><br />
                <a href="?Inventory=1">My Inventory</a><br /><br />
                <a href="?Employees=1">My Employees</a><br /><br />
                <a href="?Location=1">My Locations</a><br /><br />
                <a href="?Products=1">My Products</a><br /><br />
                <a href="?Service-Schedule=1">My Service Schedule</a><br /><br />
                <a href="?Service=1">My Services</a><br /> <br />                
            </div>
        <?php        
        $_SESSION["userid"] = 5;
        $userAdmin = $_SESSION["userid"];     
        
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
        echo '<div style="width: 69%;border:1px black solid;float:right;">';
            if(isset($_GET["edit"])){
                echo 'EDIT';
            }    
            
            if(isset($_GET["add"])){
                echo 'ADD';
                echo AddUpdate::deleteEntry($getGet, $_GET["delete"]);
            }  
            
             
        echo '</div>';
        echo '<div style="width: 99%;border:1px black solid;float:left;">';
        if ( is_array($tableModel) && count($tableModel) ) { 
            $getGet = explode(" ",implode(" ",array_keys($_GET)))[0];
            if(isset($_GET["delete"])){
                echo 'DELETED';
                echo AddUpdate::deleteEntry($getGet, $_GET["delete"]);
            } 
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
                        echo '<td><a class="links" href="?',$getGet,'=1&edit=',$row["UniqueID"],'">Edit</a></td>';
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
