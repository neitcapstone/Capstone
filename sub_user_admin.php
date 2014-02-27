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
        <title></title>
    </head>
    <body>
        <style>
            #dataTableUsers {
    width:50%;	
    height: auto;
                         
}

#dataTableUsers table{
    width:70%;
   margin-top: auto;
    padding:10px;
    color:white;
    background: #444;
    box-shadow:10px 10px 10px #000; 
    border-radius: 4px;
    font-size: 17px;
    font-weight: bold; 
}
#dataTableUsers tr:hover td{
    background-color:#ffffff;
}
#dataTableUsers td{
    width:25%;
    vertical-align:middle;
    background-color:#aad4ff;
    border:1px solid #000000;
    border-width:0px 1px 1px 0px;
    text-align:left;
    padding:7px;
    font-size:13px;
    font-family:Arial;
    color:#000;
}
#dataTableUsers tr,td{
    background-color:#005fbf;
    border:0px solid #000000;
    text-align:center;
    border-width:0px 0px 1px 1px;
    font-size:16px;
    font-family:Arial;
    font-weight:bold;
    color:#ffffff;
    height:30px;
}</style>
            
        <?php
           // $userID = intval($_SESSION["iduser"]["iduser"]);
            $userID = 21;
            if(isset($userID)){
                 
                 $dbCls = new DB();
                 $db = $dbCls->getDB();
                            if (null != $db) 
                                {
                                    $stmt = $db->prepare('select fName, lName, email, password, idaccessType from users where iduser = :iduserValue');
                                    $stmt->bindParam(':iduserValue', $userID, PDO::PARAM_INT);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    echo "<div id='dataTableUsers'><table><th>Users</th>"
                                   ." <input type='submit' value='Add User' />  <input type='submit' value='Edit Users' />"
                                    
                                    . "<tr>"
                                            . "<td>First Name</td>"
                                            ."<td>Last Name</td>"
                                            ."<td>Email</td>"
                                            ."<td></td>"
                                            . "</tr></table></div>";
                                    for($i = 0; $i<sizeof($result); $i++)
                                    {
                                        
                                       echo
                                        "<div id='dataTableUsers'><table>
                                            <tr>
                                                    <td>".$result[$i]["fName"]."</td>
                                                    <td>".$result[$i]['lName']."</td>
                                                    <td>".$result[$i]['email']."</td>
                                                        <td><input type='submit' value='Edit' /></td>

                                               </tr>
                                            </table>
                                            </div>"
                                            ;
                                    }
                                }
            
            }
        
        ?>
        <div class="wrapper">
            <div id="form_wrapper" class="form_wrapper">
                <form class="login active" name="loginform" action="login.php" method="post">

                    <table>
                        
                    </table>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
