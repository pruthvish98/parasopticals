<!doctype html>
<html lang="en">
    <head>

        <title>Invoice</title>
        <?php
        ob_start();
        include './css.php';
        ?>
    </head>
    <body>

        <?php
        include './Header.php';
        include '../connection.php';

        if (!isset($_GET['saleid'])) {
            header("location:index.php");
        }

        $salesid = $_GET['saleid'];
        ?>




        <div class="product_image_area">
            <div class="container">

            </div>
        </div>

        <!--================Home Banner Area =================-->

        <!--================End Home Banner Area =================-->
        <?php
        $orderquery = mysqli_query($connection, "SELECT * FROM `delivery`
    INNER JOIN `sales_order` 
        ON (`delivery`.`sales_order_id` = `sales_order`.`sales_order_id`)
    INNER JOIN `area` 
        ON (`delivery`.`area_id` = `area`.`area_id`) where `sales_order`.`sales_order_id`={$salesid}")or die(mysqli_error($connection));

        $roworder = mysqli_fetch_array($orderquery);
        ?>
        <!--================Order Details Area =================-->
        <section class="order_details p_120">
            <div class="container">
                <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
                <div class="row order_d_inner">
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Order Info</h4>
                            <ul class="list">
                                <li><a href="#"><span>Order number</span> : <?php echo "OD" . $roworder['sales_order_id'] ?></a></li>
                                <li><a href="#"><span>Date</span> : <?php echo $roworder['sales_order_date'] ?></a></li>
                                <li><a href="#"><span>Total</span> : <?php echo $roworder['total'] ?></a></li>
                                <li><a href="#"><span>Payment method</span> : Cash on Delivery</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- 
                  <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Delivery info</h4>
                            <ul class="list">
                                <li><a href="#"><span>Delivery Status</span> : <?php echo "" ?></a></li>
                                <li><a href="#"><span>Customer Contact No.</span> : <?php echo "" ?></a></li>                               
                                
                            </ul>
                        </div>
                    </div>-->
                    <div class="col-lg-4">
                        <div class="details_item">
                            <h4>Shipping Address</h4>
                            <ul class="list">
                                <li><a href="#"><span>Address</span> : <?php echo $roworder['delivery_add'] ?></a></li>
                                <li><a href="#"><span>Area</span> : <?php echo $roworder['area_name'] ?></a></li>                               
                                <li><a href="#"><span>Postcode </span> : <?php echo $roworder['postal'] ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="order_details_table">
                    <h2>Order Details</h2>
                    <?php
                    $sql = "SELECT *
FROM
    `sales_order_details`
    INNER JOIN `sales_order` 
        ON (`sales_order_details`.`sales_order_id` = `sales_order`.`sales_order_id`)
    INNER JOIN `product_master` 
        ON (`sales_order_details`.`product_id` = `product_master`.`product_id`) where `sales_order_details`.`sales_order_id`='{$salesid}'";

                    $saledetailq = mysqli_query($connection, $sql)or die(mysqli_error($connection));
                    ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col"></th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$sum = array();
while ($detailsrow = mysqli_fetch_array($saledetailq)) {
    if ($detailsrow['sales_discount'] > 0) {
        $subtotal = ($detailsrow['product_price'] * $detailsrow['sales_discount']) / 100 * $detailsrow['sales_qty'];
    } else {
        $subtotal = $detailsrow['product_price'] * $detailsrow['sales_qty'];
    }
    ?>
                                    <tr>
                                        <td>
                                            <p><?php echo $detailsrow['product_name'] ?></p>
                                        </td>

                                        <td>
                                            <h5> <?php echo "₹ " . $detailsrow['product_price'] ?>                                       
                                                x <?php echo $detailsrow['sales_qty'] ?></h5> 
                                        </td>
                                        <td> 
                                            <h6> <?php echo "₹ " . $original = $detailsrow['product_price'] * $detailsrow['sales_qty']; ?> </h6>

                                        </td>
                                        <td>
                                            <h4> <?php echo $detailsrow['sales_discount'] ?>% off</h4>
                                        </td>

                                        <td>
                                            <p>₹ <?php echo $detailsrow['amount'] ?></p>
                                        </td>
                                    </tr>

    <?php $sum[] = $subtotal;
} ?>
                                <tr>
                                    <td><hr>
                                        <h4>Subtotal</h4><hr>
                                    </td>
                                    <td><hr>
                                        <h5> </h5>
                                    </td>
                                    <td><hr>
                                        <h5> </h5>
                                    </td>
                                    <td><hr>
                                        <h5> </h5>
                                    </td>
                                    <td><hr>
                                        <h6>₹ <?php echo $total = array_sum($sum); ?></h6><hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Shipping</h4>
                                    </td>
                                    <td>
                                        <h6>Shipping Charge ₹ <?php echo $charge = 100; ?></h6>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Total</h4>
                                    </td>
                                    <td>
                                        <h5></h5>
                                    </td>
                                    <td>
                                        <h5>₹ <?php echo $total = $total + $charge; ?></h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Order Details Area =================-->



        <!--================ start footer Area  =================-->	
<?php include './footer.php'; ?>
        <!--================ End footer Area  =================-->

<?php include './script.php'; ?>
    </body>

</html>
<script>


    class Progress {
        constructor(param = {}) {
            this.timestamp = null;
            this.duration = param.duration || Progress.CONST.DURATION;
            this.progress = 0;
            this.delta = 0;
            this.progress = 0;
            this.isLoop = !!param.isLoop;

            this.reset();
        }

        static get CONST() {
            return {
                DURATION: 1000};

        }

        reset() {
            this.timestamp = null;
        }

        start(now) {
            this.timestamp = now;
        }

        tick(now) {
            if (this.timestamp) {
                this.delta = now - this.timestamp;
                this.progress = Math.min(this.delta / this.duration, 1);

                if (this.progress >= 1 && this.isLoop) {
                    this.start(now);
                }

                return this.progress;
            } else {
                return 0;
            }
        }
    }

    class Confetti {
        constructor(param) {
            this.parent = param.elm || document.body;
            this.canvas = document.createElement("canvas");
            this.ctx = this.canvas.getContext("2d");
            this.width = param.width || this.parent.offsetWidth;
            this.height = param.height || this.parent.offsetHeight;
            this.length = param.length || Confetti.CONST.PAPER_LENGTH;
            this.yRange = param.yRange || this.height * 2;
            this.progress = new Progress({
                duration: param.duration,
                isLoop: true});

            this.rotationRange = typeof param.rotationLength === "number" ? param.rotationRange :
                    10;
            this.speedRange = typeof param.speedRange === "number" ? param.speedRange :
                    10;
            this.sprites = [];

            this.canvas.style.cssText = [
                "display: block",
                "position: absolute",
                "top: 0",
                "left: 0",
                "pointer-events: none"].
                    join(";");

            this.render = this.render.bind(this);

            this.build();

            this.parent.appendChild(this.canvas);
            this.progress.start(performance.now());

            requestAnimationFrame(this.render);
        }

        static get CONST() {
            return {
                SPRITE_WIDTH: 9,
                SPRITE_HEIGHT: 16,
                PAPER_LENGTH: 100,
                DURATION: 8000,
                ROTATION_RATE: 50,
                COLORS: [
                    "#EF5350",
                    "#EC407A",
                    "#AB47BC",
                    "#7E57C2",
                    "#5C6BC0",
                    "#42A5F5",
                    "#29B6F6",
                    "#26C6DA",
                    "#26A69A",
                    "#66BB6A",
                    "#9CCC65",
                    "#D4E157",
                    "#FFEE58",
                    "#FFCA28",
                    "#FFA726",
                    "#FF7043",
                    "#8D6E63",
                    "#BDBDBD",
                    "#78909C"]};


        }

        build() {
            for (let i = 0; i < this.length; ++i) {
                let canvas = document.createElement("canvas"),
                        ctx = canvas.getContext("2d");

                canvas.width = Confetti.CONST.SPRITE_WIDTH;
                canvas.height = Confetti.CONST.SPRITE_HEIGHT;

                canvas.position = {
                    initX: Math.random() * this.width,
                    initY: -canvas.height - Math.random() * this.yRange};


                canvas.rotation = this.rotationRange / 2 - Math.random() * this.rotationRange;
                canvas.speed = this.speedRange / 2 + Math.random() * (this.speedRange / 2);

                ctx.save();
                ctx.fillStyle = Confetti.CONST.COLORS[Math.random() * Confetti.CONST.COLORS.length | 0];
                ctx.fillRect(0, 0, canvas.width, canvas.height);
                ctx.restore();

                this.sprites.push(canvas);
            }
        }

        render(now) {
            let progress = this.progress.tick(now);

            this.canvas.width = this.width;
            this.canvas.height = this.height;

            for (let i = 0; i < this.length; ++i) {
                this.ctx.save();
                this.ctx.translate(
                        this.sprites[i].position.initX + this.sprites[i].rotation * Confetti.CONST.ROTATION_RATE * progress,
                        this.sprites[i].position.initY + progress * (this.height + this.yRange));

                this.ctx.rotate(this.sprites[i].rotation);
                this.ctx.drawImage(
                        this.sprites[i],
                        -Confetti.CONST.SPRITE_WIDTH * Math.abs(Math.sin(progress * Math.PI * 2 * this.sprites[i].speed)) / 2,
                        -Confetti.CONST.SPRITE_HEIGHT / 2,
                        Confetti.CONST.SPRITE_WIDTH * Math.abs(Math.sin(progress * Math.PI * 2 * this.sprites[i].speed)),
                        Confetti.CONST.SPRITE_HEIGHT);

                this.ctx.restore();
            }

            requestAnimationFrame(this.render);
        }
    }

    (() => {
        const DURATION = 8000,
                LENGTH = 120;

        new Confetti({
            width: window.innerWidth,
            height: window.innerHeight,
            length: LENGTH,
            duration: DURATION});


        setTimeout(() => {
            new Confetti({
                width: window.innerWidth,
                height: window.innerHeight,
                length: LENGTH,
                duration: DURATION});

        }, DURATION / 2);
    })();


</script>