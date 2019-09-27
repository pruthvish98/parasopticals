<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Category Display</title>
        <?php
        include 'head.php';
        include './connection.php';
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
        

        $sql = "SELECT * FROM category where is_delete='0';";
        $q = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $count = mysqli_num_rows($q);
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Category table</h3>
                                <div class="table-data__tool-right">
                                    <a href="Category.php">
                                        <button style="border-radius: 25px;" class="au-btn au-btn-icon au-btn--green au-btn--small bt">
                                            <i class="zmdi zmdi-plus"></i>add item</button></a>

                                </div>
                                <br>
                            </div>


                            <div class="table-responsive table-responsive-data3" style="border-radius: 10px;box-shadow: 0 15px 10px -10px rgba(0,0,0,0.4);">

                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>

                                            <th>No</th>
                                            <th>Category Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
while ($row = mysqli_fetch_array($q)) {
    echo "<tr class='tr-shadow'>";
    echo "<td> {$row['cat_id']} </td>";
    echo "<td> {$row['cat_name']} </td>";




    echo
    "<td>
                                                    <div class='table-data-feature'>
                                                    
                                                    
                                                        </a>
                                                        &nbsp
                                                         <a  href='Category_update.php?uid={$row['cat_id']}'>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Edit'>                                                       
                                                            <i class='zmdi zmdi-edit'></i>
                                                                
                                                        </button>
                                                        </a>
                                                        <a  href='Category_delete.php?did={$row['cat_id']}'>
                                                        <button class='item' data-toggle='tooltip' data-placement='top' title='Delete'>                                                       
                                                            <i class='zmdi zmdi-delete'></i>
                                                                
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
