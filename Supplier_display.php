<!DOCTYPE html>
<html lang="en">

<head>
<title>Supplier</title>
<?php include 'head.php';
session_start();?>
</head>

<body class="animsition">

<?php include 'Header.php';?>
    
    <?php
    include './connection.php';
    include './checklogin.php';
    
    $q = mysqli_query($connection,"select * from supplier where is_delete='0' ")or die(mysqli_error($connection));
    $count = mysqli_num_rows($q);
    
         
             
    
    ?>
<div class="page-container">
       <div class="main-content"style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Suppliers</h3>
                                        <div class="table-data__tool-right">
                                            <a href="Supplier.php">
                                        <button  class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item</button></a>
                                        
                                    </div>
                                <br>
                                </div>
                            
                            
                                <div class="table-responsive table-responsive-data3">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Mobile</th>
                                                <th>GST No</th>
                                                <th>Address</th>
                                                
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      <?php
                                      while($row = mysqli_fetch_array($q))
                                    {
                                             echo "<tr class='tr-shadow'>" ;
                                             echo "<td> {$row['supplier_id']} </td>"; 
                                             echo "<td> {$row['supplier_name']} </td>"; 
                                             echo "<td> {$row['supplier_mo']} </td>";   
                                             echo "<td> {$row['supplier_gst']} </td>";       
                                              echo "<td> {$row['supplier_add']} </td>";   
                                                
                                                 echo 
                                                "<td>
                                                    <div class='table-data-feature'>
                                                    
                                                    <a href='supplier_update.php?uid={$row['supplier_id']}'>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                            <i class='zmdi zmdi-edit'></i>
                                                        </button>
                                                        </a>
                                                        &nbsp
                                                         <a  href='supplier_delete.php?did={$row['supplier_id']}'>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>                                                       
                                                            <i class='zmdi zmdi-delete'></i>
                                                                
                                                        </button>
                                                        </a>
                                                        
                                                    </div>
                                                </td>"; 
                                             echo "</tr>"; 
                                             echo "<tr class='spacer'></tr>";
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                        
                    </div>
                </div>
        </div>
</div>

    

 

</body>


</html>
<?php include 'Side_Menu.php';?>
