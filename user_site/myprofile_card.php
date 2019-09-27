




<div class="col-lg-12">
    <div class="blog_right_sidebar" style=" background-color: #F2F2F2;border-radius: 10px; box-shadow: 0 0 30px   rgba(0,0,0,0.4);">
        <aside class="single_sidebar_widget author_widget">
            <h4><?php
                if (isset($_SESSION['c_name'])) {
                    echo $_SESSION['c_name'];
                } else {
                    echo "Login";
                }
                ?></h4>
            <div class="br"></div>
        </aside>
        <div style="margin-left: 16%;">


            <a href="myprofile.php"><button class="genric-btn success circle bt"style="box-shadow: 0 10px 10px rgba(33,33,33,.2);border-radius: 25px; background-color: #ED6B11; color: white; border: none;"><i class="fa fa-exclamation"></i> &nbsp; Edit Profile</button></a>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
           
            <a href="compalin.php"><button class="genric-btn success circle bt"style="box-shadow: 0 11px 10px rgba(33,33,33,.2);border-radius: 25px;background-color: #ED6B11; color: white; border: none;"><i class="fa fa-map-signs"></i> &nbsp; Complain</button></a>
            
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            


        </div>





    </div>
</div>