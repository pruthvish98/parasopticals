<html>
    <head>
        <title>Home</title>
        <?php include 'head.php'; ?>
        <style>
            .zoom:hover {
                transform: scale(1.2);

                transition: transform 1s ease;

            }
        </style>
    </head>
    <body class="animsition" background="img/bg.jpg">       

        <div class="container">                    

            <div class="login-wrap">                      

                <div class="shadow p-3 mb-5 bg-white rounded zoom">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="Admin_login.php">                                
                                <img src="images/Admin.png" width="70%" alt="Paras">
                            </a>

                        </div>                        
                    </div>
                </div>                            

                <div class="shadow p-3 mb-5 bg-white rounded zoom">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="Employee/Employee_login.php">                                
                                <img src="images/employee.png" width="70%" alt="Paras">
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </body>

</html>

<?php include 'script.php'; ?>

