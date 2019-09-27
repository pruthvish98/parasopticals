<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Offer</title>
        <?php
        include 'head.php';

        session_start();
        include './checklogin.php';
        ?>
        <style>
            .bt:hover{text-shadow:0 10px 10px rgba(0,0,0,0.4); }

        </style>
    </head>

    <body class="animsition">

        <?php include 'Header.php'; ?>

        <?php
        include './connection.php';
        $q = mysqli_query($connection, "select * from offers ")or die(mysqli_error($connection));
        $count = mysqli_num_rows($q);
        
        
        ?>
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->

                                <div class="table-data__tool-right">
                                    <a href="Offers.php">
                                        <button  style="border-radius: 25px;" class="au-btn au-btn-icon au-btn--green au-btn--small bt">
                                            <i class="zmdi zmdi-plus"></i>add offer</button></a>

                                </div>
                                <br>
                            </div>


                            <div class="table-responsive table-responsive-data3"style="border-radius: 10px;box-shadow: 0 15px 10px -10px rgba(0,0,0,0.4);">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Offer Name</th>
                                            <th>Discount</th>
                                            <th>Offer Detail</th>
                                            <th>Status</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php $i=0;
while ($row = mysqli_fetch_array($q)) {$i++;
    echo "<tr class='tr-shadow'>";
    echo "<td> {$i} </td>";
    echo "<td> {$row['offer_name']} </td>";
    echo "<td> {$row['discount']} %</td>";
    echo "<td> {$row['offer_details']} </td>";
    ?>
                                            <?php
                                            echo "<td> ";
                                            if ($row['is_active'] == 0) {
                                                echo "Deactive";
                                               
                                            } else {
                                                echo "Active";
                                                
                                            }
                                            echo "</td>";
                                            ?>


                                            <?php
                                            echo
                                            "<td>
                                                    <div class='table-data-feature'>
                                                    
                                                    
                                                    
                                                    <a href='Offers_delete.php?did={$row['offer_id']}'>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Change Status'>                                                       
                                                            <i class='zmdi zmdi-close'></i>
                                                                
                                                        </button>
                                                    </a>
                                                        
                                                    </div>
                                                </td>";
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
