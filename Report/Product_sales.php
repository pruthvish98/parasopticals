<html>
    <head>
        <title>Product Sales</title>
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
        <h2>Sales</h2>
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
    `customer`.`customer_name`
    , `product_master`.`product_name`
    , `sales_order_details`.`sales_qty`
    , `sales_order_details`.`amount`
    , `sales_order`.`total`
    , `sales_order`.`sales_order_date`
     , `sales_order`.`is_online`
    , `sales_order_details`.`final_price`
FROM
    `sales_order_details`
    INNER JOIN `sales_order` 
        ON (`sales_order_details`.`sales_order_id` = `sales_order`.`sales_order_id`)
    INNER JOIN `customer` 
        ON (`sales_order`.`customer_id` = `customer`.`customer_id`)
    INNER JOIN `product_master` 
        ON (`sales_order_details`.`product_id` = `product_master`.`product_id`) where `sales_order`.`sales_order_date` > '{$date1}' OR '{$date2}' > `sales_order`.`sales_order_date` order by `sales_order`.`sales_order_date` DESC  ";

    $q = mysqli_query($connection, $qry)or die(mysqli_error($connection));
}
    $count = mysqli_num_rows($q);

?>



<table class="table table-hover">
    <thead>
        <tr>
            <th>Sales Date</th>
            <th>Customer Name</th>           
            <th>Product Name</th> 
            <th>Online/Offline</th> 
            <th>Qty</th>
            <th>Amount</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        echo "<strong><h4>Results found " . $count . "</h4></strong><br>";
        echo "<strong><h4>Between date " . $date1 ." to ". $date2. "</h4></strong><br>";
        while ($row = mysqli_fetch_array($q)) {
            ?>
            <tr>
                 <td><?php echo $row['sales_order_date']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php if($row['is_online']=='1'){ echo "Online";} else {echo "Offline";} ?></td>
                <td><?php echo $row['sales_qty']; ?></td>
                <td>₹ <?php echo $row['amount']; ?></td>
                <td>₹ <?php echo $row['total']; ?></td>
               
            </tr>


        <?php } ?>
    </tbody>
</table>

</body>
</html>


