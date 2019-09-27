
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee Display</title>
        <?php
        session_start();
        include 'head.php';
        ?>
        <style>
            .zoom:hover {

                transform: scale(1.3); transition: .3s;
            }
        </style>
    </head>

    <body class="animsition">

        <?php include './emp_header.php'; ?>


        <div class="page-container">
            <div class="main-content">

                <div class="container-fluid">


                    <table align="center" >
                        <tr>
                            <td style="padding: 10px;"><a href="Delivery.php"><img class="zoom" src="img/App-Icon_Illo_01.png" style="width: 200px;" ></a></td>
                            <td style="padding: 10px;"><a href="Service.php"><img class="zoom" src="img/85-512.png" style="width: 200px;" ></a></td>
                            <td style="padding: 10px;"><a href="Eye_test.php"><img class="zoom" src="img/people-wearing-glasses-006-512.png" style="width: 200px;" ></a></td>
                            <td style="padding: 10px;"><a href="Offline_product.php"><img class="zoom" src="img/icon-hand.png" style="width: 200px;" ></a></td>
                            <td style="padding: 10px;"><a href="Stock.php"><img class="zoom" src="img/storage.png" style="width: 200px;" ></a></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="color: black;" align="center"><b>Delivery</b></td>
                            <td style="color: black;" align="center"><b>Repairing</b></td>
                            <td style="color: black;" align="center"><b>Eye-Test</b></td>
                            <td style="color: black;" align="center"><b>Offline Product</b></td>
                            <td style="color: black;" align="center"><b>Stock</b></td>
                        </tr>



                    </table>



                </div>

            </div>
        </div>





    </body>


</html>
<?php include 'Emp_sidemenu.php'; ?>
