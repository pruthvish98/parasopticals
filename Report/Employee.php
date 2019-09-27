<html>
    <head>
        <title>Employee</title>
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
        <h2>Employee Sale Report</h2>
    </center>
    <br>
    <br>
    <br>

    <table class="table table-hover " >
        <tr><form method="post">
            <td>
                <!--     <div align="left">
                         Start : <input type="date">&nbsp;&nbsp;End:<input type="date">
                     </div>-->
            </td>
            <td>
                <div align="left">
                    Start Date : <input type="date"  name="date1">
                </div>
            </td>
            <td>
                <div align="center">
                    End Date : <input type="date"  name="date2" >
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

if ($_POST) {

    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    $qry = "SELECT
    `product_master`.`product_name`
    ,  `product_master`.`product_price`
    ,`purchase_order_details`.`purchase_amount`
    , `purchase_order_details`.`purchase_qty`
    , `purchase_order_details`.`purchase_amount`
    , `purchase_order_details`.`purchase_total`
    , `purchase_order`.`purchase_date`
    , `supplier`.`supplier_name`
FROM
    `purchase_order`
    INNER JOIN `purchase_order_details` 
        ON (`purchase_order`.`purchase_id` = `purchase_order_details`.`purchase_id`)
    INNER JOIN `supplier` 
        ON (`purchase_order`.`supplier_id` = `supplier`.`supplier_id`)
    INNER JOIN `product_master` 
        ON (`product_master`.`product_id` = `purchase_order_details`.`product_id`) where `purchase_order`.`purchase_date` > '{$date1}' AND '{$date2}'>`purchase_order`.`purchase_date` order by `purchase_order`.`purchase_date` DESC  ";

    $q = mysqli_query($connection, $qry)or die(mysqli_error($connection));
}
    $count = mysqli_num_rows($q);

?>



<table class="table table-hover">
    <thead>
        <tr>
            <th>Product Name</th>
                              
            <th>Qty</th>
            <th>Price</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        echo "<strong><h4>Results found " . $count . "</h4></strong><br>";
        echo "<strong><h4>Between date " . $date1 ." to ". $date2. "</h4></strong><br>";
        while ($row = mysqli_fetch_array($q)) {
            ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['purchase_date']; ?></td>
                <td><?php echo $row['supplier_name']; ?></td>
                <td><?php echo $row['purchase_qty']; ?></td>
                <td>₹ <?php echo $row['purchase_amount']; ?></td>
                <td>₹ <?php echo $row['purchase_total']; ?></td>
            </tr>


        <?php } ?>
    </tbody>
</table>

</body>
</html>


