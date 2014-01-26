<?php include 'dependency.php'; //includes all classes and sets up session ?> 
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo Config::PAGE_TITLE; ?></title>
    </head>
    <body>
        <?php
        
        // put your code here
        //$servSales = StoredProc::getCompanyServiceSales(); 
        //print_r( $servSales );
        $servSales = StoredProc::getCompanyServiceSales(3); 
        
        //print_r( $servSales );
        
        if ( is_array($servSales) && count($servSales) ) {
        echo '<table border="1"><caption>My Service Sales</caption><thead><tr>';
            echo '<th>Receipt Date</th><th>Customer Name</th><th>Store Name</th><th>Name of Service</th><th>Hours Billed</th><th>Total Price</th>';
            
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($servSales as $row) {
                echo '<tr>';               
                echo '<td>',$row["Receipt Date"],'</td>';
                echo '<td>',$row["Customer Name"],'</td>';
                echo '<td>',$row["Store Name"],'</td>';
                echo '<td>',$row["Name of Service"],'</td>';
                echo '<td>',$row["Hours Billed"],'</td>'; 
                echo '<td>',$row["Total Price"],'</td>';            
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No Service Sales in database";
        }
        
        echo '<br />';
        
        
        
        $prodSales = StoredProc::getCompanyProductSales(5); 
        
        //print_r( $prodSales );
        
        if ( is_array($prodSales) && count($prodSales) ) {
        echo '<table border="1"><caption>My Product Sales</caption><thead><tr>';
            echo '<th>Receipt Date</th><th>Customer Name</th><th>Store Name</th><th>City</th><th>Name of Product</th><th>Number Sold</th>'
                . '<th>Total Price</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($prodSales as $row) {
                echo '<tr>';               
                echo '<td>',$row["Receipt Date"],'</td>';
                echo '<td>',$row["Customer Name"],'</td>';
                echo '<td>',$row["Store Name"],'</td>';
                echo '<td>',$row["City"],'</td>';
                echo '<td>',$row["Name of Product"],'</td>';                
                echo '<td>',$row["Number Sold"],'</td>';
                echo '<td>',$row["Total Price"],'</td>';
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No Product Sales in database";
        }
        
        echo '<br />'; 
        
        $custs = StoredProc::getCustByCompany(3); 
        
        //print_r( $custs );
        
        if ( is_array($custs) && count($custs) ) {
        echo '<table border="1"><caption>My Customers</caption><thead><tr>';
            echo '<th>Customer Name</th><th>Address</th><th>City</th><th>State</th><th>Email</th><th>Phone</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($custs as $row) {
                echo '<tr>';               
                echo '<td>',$row["Customer Name"],'</td>';
                echo '<td>',$row["Address"],'</td>';
                echo '<td>',$row["City"],'</td>';
                echo '<td>',$row["State"],'</td>';
                echo '<td>',$row["Email"],'</td>';  
                echo '<td>',$row["Phone"],'</td>'; 
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No customers in database";
        }
        
        echo '<br />'; 
        
        $inv = StoredProc::getInvByCompany(5); 
        
        //print_r( $inv );
        
        if ( is_array($inv) && count($inv) ) {
        echo '<table border="1"><caption>My Inventory</caption><thead><tr>';
            echo '<th>Product Name</th><th>Count</th><th>Location Name</th><th>Location Address</th><th>City</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($inv as $row) {
                echo '<tr>';               
                echo '<td>',$row["Product"],'</td>';
                echo '<td>',$row["Count"],'</td>';
                echo '<td>',$row["Location Name"],'</td>';
                echo '<td>',$row["Location Address"],'</td>';
                echo '<td>',$row["City"],'</td>';  
                //echo '<td>',$row["Phone"],'</td>'; 
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No Inventory in database";
        }
        
        echo '<br />'; 
        
        $emp = StoredProc::getEmpByCompany(3); 
        
        //print_r( $inv );
        
        if ( is_array($emp) && count($emp) ) {
        echo '<table border="1"><caption>My Employees</caption><thead><tr>';
            echo '<th>Employee Name</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Phone</th><th>Soc Number</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($emp as $row) {
                echo '<tr>';               
                echo '<td>',$row["Employee Name"],'</td>';
                echo '<td>',$row["Address"],'</td>';
                echo '<td>',$row["City"],'</td>';
                echo '<td>',$row["State"],'</td>';
                echo '<td>',$row["Zip"],'</td>';  
                echo '<td>',$row["Phone"],'</td>';
                echo '<td>',$row["Soc Number"],'</td>'; 
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No Employees in database";
        }
        
        echo '<br />'; 
        
        $loc = StoredProc::getLocByCompany(3); 
        
        //print_r( $loc );
        
        if ( is_array($loc) && count($loc) ) {
        echo '<table border="1"><caption>My Locations</caption><thead><tr>';
            echo '<th>Location Name</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Phone</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($loc as $row) {
                echo '<tr>';               
                echo '<td>',$row["Location Name"],'</td>';
                echo '<td>',$row["Address"],'</td>';
                echo '<td>',$row["City"],'</td>';
                echo '<td>',$row["State"],'</td>';
                echo '<td>',$row["Zip"],'</td>';  
                echo '<td>',$row["Phone"],'</td>';                 
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No Locations in database";
        }
        
        echo '<br />'; 
        
        $prod = StoredProc::getProdByCompany(2); 
        
        //print_r( $loc );
        
        if ( is_array($prod) && count($prod) ) {
        echo '<table border="1"><caption>My Products</caption><thead><tr>';
            echo '<th>Product Name</th><th>Description</th><th>Price</th><th>Product Code</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($prod as $row) {
                echo '<tr>';               
                echo '<td>',$row["Product Name"],'</td>';
                echo '<td>',$row["Description"],'</td>';
                echo '<td>',$row["Price"],'</td>';
                echo '<td>',$row["Product Code"],'</td>';                                
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No Products in database";
        }
        
        
        
        echo '<br />'; 
        
        $ser = StoredProc::getSerByCompany(3); 
        
        //print_r( $loc );
        
        if ( is_array($ser) && count($ser) ) {
        echo '<table border="1"><caption>My Services</caption><thead><tr>';
            echo '<th>Service Name</th><th>Description</th><th>Hourly Price</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($ser as $row) {
                echo '<tr>';               
                echo '<td>',$row["Service Name"],'</td>';
                echo '<td>',$row["Description"],'</td>';
                echo '<td>',$row["Hourly Price"],'</td>';                                               
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No Services in database";
        }
        
        echo '<br />'; 
        
        $serSched = StoredProc::getSerSchedByCompany(3); 
        
        //print_r( $loc );
        
        if ( is_array($serSched) && count($serSched) ) {
        echo '<table border="1"><caption>My Schedule</caption><thead><tr>';
            echo '<th>Date</th><th>Time</th><th>Service</th><th>Customer Last Name</th><th>Address</th>'
            . '<th>City</th><th>State</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            
            foreach ($serSched as $row) {
                echo '<tr>';               
                echo '<td>',$row["Date"],'</td>';
                echo '<td>',$row["Time"],'</td>';
                echo '<td>',$row["Service"],'</td>'; 
                echo '<td>',$row["Customer Last Name"],'</td>';
                echo '<td>',$row["Address"],'</td>';
                echo '<td>',$row["City"],'</td>';
                echo '<td>',$row["State"],'</td>';
                //echo '<td><a class="links" href=?edit=',$row["id"],'>Edit</a></td>';
                //echo '<td><a class="links" href=?delete=',$row["id"],'>Delete</a></td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }else{
            echo "No Scheduled Items in database";
        }
        ?>
    </body>
</html>
