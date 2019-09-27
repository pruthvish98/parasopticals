<html>
    <head>
        <title>Product</title>
        <link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <br>
    <center>
        <img src="../user_site/img/Paras.png" width="20%">
    </center>
    <br>
    <br>
    <br>
    
    
    <center>
        <h2>Product Report</h2>
    </center>
    <br>
    <br>
    <br>
    
    <table class="table table-hover " >
        <tr><form method="get">
            <td>
           <!--     <div align="left">
                    Start : <input type="date">&nbsp;&nbsp;End:<input type="date">
                </div>-->
            </td>
            <td>
                <div align="left">
                    Search : <input type="text" name="search">
                </div>
            </td>
            <td>
                <div align="center">
                    Start : <input type="number" name="startp" placeholder="Start Price ₹">&nbsp;&nbsp;End : <input type="number" name="endp" placeholder="End Price ₹">
                </div>
            </td>
            <td>
                <div align="right">
                    <input type="submit" class="btn-success" name="submit" placeholder="Submit">
                </div>
            </td>
            <td><button onclick="window.print()" class="btn-primary">  Print </button> </td>
            </form>
        </tr>
        <tr></tr>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <?php
                        include '../connection.php';
                        
                        if(isset($_GET['search'])){
                            
                            $search=$_GET['search'];
    
                                                $proq = "SELECT * FROM      
                                                    `product_master`
                                                    INNER JOIN `sub_category` 
                                                    ON (`product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`)
                                                    where `product_master`.`product_name` like '%{$search}%' ";
                       

                                                }elseif(isset($_GET['startp']) &&  isset($_GET['endp'])) {
                                                    $p1=$_GET['startp'];
                                                    $p2=$_GET['endp'];
                                                    $proq = "SELECT*  FROM
                                                `product_master` 
                                                INNER JOIN `sub_category` 
                                                    ON (`product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`)
                                                where `product_master`.`product_price` BETWEEN '{$p1}' AND '{$p2}' ";
                                                     } else {
                                                          $proq = "SELECT*  FROM
                                                `product_master` INNER JOIN `sub_category` 
                                                    ON (`product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`)";
                                                     }
                        $q = mysqli_query($connection, $proq)or die(mysqli_error($connection));

                        $count = mysqli_num_rows($q);
                        ?>
                        
    
    
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Sub Category</th>
                    <th>Qty</th>

                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
             <?php 
                                     echo "<strong><h4>Results found ". $count."</h4></strong><br>";
             while ($row = mysqli_fetch_array($q)) {
                        ?>
                <tr>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['sub_cat_name']; ?></td>
                    <td><?php echo $row['qty']; ?></td>

                    <td><?php echo $row['product_price']; ?></td>
                </tr>
                

                <?php }?>
            </tbody>
        </table>
   
</body>
</html>


