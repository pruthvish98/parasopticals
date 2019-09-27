<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Complaint</title>
        <?php
        include 'head.php';
        include './connection.php';
        session_start();
        include './checklogin.php';
        ?>
    </head>

    <body class="animsition">

        <?php
        include 'Header.php';

        $ab = "SELECT
    `complain`.`complain_details`
    , `complain`.`complain_date`
    , `customer`.`customer_name`
FROM
    `db_demo`.`complain`
    INNER JOIN `db_demo`.`customer` 
        ON (`complain`.`customer_id` = `customer`.`customer_id`)";


        $q = mysqli_query($connection, $ab)or die(mysqli_errno($connection));
        $count = mysqli_num_rows($q);
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Complaint</h3>

                                <br>
                            </div>


                            <div class="table-responsive table-responsive-data3">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>


                                            <th>Customer Name</th>
                                            <th>Complain</th>
                                            <th>Date</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($q)) {
                                            echo "<tr class='tr-shadow'>";

                                            echo "<td> {$row['customer_name']} </td>";
                                            echo "<td> {$row['complain_details']} </td>";
                                            echo "<td> {$row['complain_date']} </td>";




                                            echo "</tr>";
                                            echo "<tr class='spacer'></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>





    </body>


</html>
<?php include 'Side_Menu.php'; ?>
