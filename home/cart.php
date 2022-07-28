<?php
include('../functions/myfunctions.php');
include('includes/header.php');
include('includes/navbar.php');
if (!isset($_SESSION['user'])) {
    header("Location: ../authenticate/login.php");
}
$userid = $_SESSION['userid'];
?>

<head>
    <title>Cart</title>
</head>

<body>
    <main class="w-full mt-20">

        <!-- row -->
        <div class="flex flex-col sm:flex-row gap-3.5 w-full sm:w-11/12 mt-0 sm:mt-4 m-auto sm:mb-7">

            <!-- cart column -->
            <div class="flex-1">
                <?php
                $query = "SELECT * FROM carts,products where user_id=$userid and carts.prod_id=products.id";
                $cart = mysqli_query($con, $query);
                ?>
                <!-- cart items container -->
                <div class="flex flex-col shadow bg-white">
                    <span class="font-medium text-lg px-2 sm:px-8 py-4 border-b">My Cart (
                        <?= mysqli_num_rows($cart); ?>)
                    </span>

                    <?php
                    if (mysqli_num_rows($cart) > 0) {
                        foreach ($cart as $item) {

                    ?>
                            <div class="flex flex-col gap-3 py-5 pl-2 sm:pl-6 border-b">

                                <div class="flex flex-col sm:flex-row gap-5 items-stretch w-full" href="#">
                                    <!-- product image -->
                                    <div class="flex-shrink-0 sm:flex-shrink w-full sm:w-1/6 h-28">
                                        <img class="h-full w-full object-contain" src="../uploads/<?= $item['image']; ?>" alt="">
                                    </div>
                                    <!-- product image -->

                                    <!-- description -->
                                    <div class="flex flex-col gap-1 sm:gap-5 w-full p-1 pr-6">
                                        <!-- product title -->
                                        <div class="flex justify-between items-start pr-5">
                                            <div class="flex flex-col gap-0.5 w-11/12 sm:w-3/5">
                                                <p class="truncate">
                                                    <?= $item['name']; ?>
                                                </p>
                                                <span class="text-sm text-gray-500">Seller:RetailNet</span>
                                            </div>
                                        </div>
                                        <!-- product title -->

                                        <!-- price desc -->
                                        <div class="flex items-baseline gap-2 text-xl font-medium">
                                            <span id="productPrice" data-id="<?= $item['prod_id'] ?>">₹
                                                <?= $item['price'] * $item['prod_qty']; ?>
                                            </span>
                                            <span class="text-sm text-gray-500 line-through font-normal"></span>
                                        </div>
                                        <!-- price desc -->

                                    </div>
                                    <!-- description -->
                                </div>


                                <!-- move to cart -->
                                <div class="flex justify-evenly sm:justify-start sm:gap-6">
                                    <!-- quantity -->
                                    <div class="flex gap-1 items-center">
                                        <!-- <div class="w-7 h-7 text-3xl font-light bg-gray-50 rounded-full border p-1 flex items-center justify-center cursor-pointer " onclick="dec()">-</div> -->

                                        <!-- <input name="<?= $item['prod_id'] ?>" type="number" min="1"
                                        class="w-11 border outline-none text-center rounded-sm py-0.5 font-medium text-sm qtyInput"
                                        value=<?= $item['prod_qty'] ?>> -->


                                        <!-- <div class="w-7 h-7 text-xl font-light bg-gray-50 rounded-full border p-1 flex items-center justify-center cursor-pointer qtyIncr"  onclick="inc()" >+</div> -->
                                    </div>
                                    <!-- quantity -->

                                    <div class="flex gap-1 items-center">
                                        <div class="w-7 h-7 text-3xl font-light bg-gray-50 rounded-full border p-1 flex items-center justify-center cursor-pointer qtyDecr" data-id="<?= $item['prod_id']; ?>">-</div>
                                        <input type="text" class="w-11 border outline-none text-center rounded-sm py-0.5 font-medium text-sm qtyInput" value="<?= $item['prod_qty'] ?>" disabled data-id="<?= $item['prod_id']; ?>">
                                        <div class="w-7 h-7 text-xl font-light bg-gray-50 rounded-full border p-1 flex items-center justify-center cursor-pointer qtyIncr" data-id="<?= $item['prod_id']; ?>">+</div>
                                    </div>
                                    <button class="font-medium hover:text-primary-blue">SAVE FOR LATER</button>
                                    <button name="remove" type="button" class="font-medium hover:text-primary-blue remove" value=<?= $item['prod_id'] ?>>REMOVE</button>
                                </div>
                                <!-- move to cart -->

                            </div>
                        <?php
                        }
                    } else { ?>
                        <!-- empty cart -->
                        <div class="flex items-center flex-col gap-2 m-6">
                            <div class="w-52 h-44">
                                <img class="w-full h-full object-contain" src="https://rukminim1.flixcart.com/www/800/800/promos/16/05/2019/d438a32e-765a-4d8b-b4a6-520b560971e8.png" alt="">
                            </div>
                            <span class="text-lg">Your cart is empty!</span>
                            <p class="text-xs">Add items to it now.</p>
                            <a href="home.php" class="bg-primary-blue text-sm text-white px-12 py-2 rounded-sm shadow mt-3">Shop
                                Now</a>
                        </div>
                        <!-- empty cart -->
                    <?php
                    }
                    ?>
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center px-2 sm:px-6 py-4 gap-2 sm:gap-0">
                        <!-- <div class="flex flex-col gap-1">
                            <p class="font-medium">Delivery Address :</p>
                            <span class="text-sm">B-106, Shreenathji Park, Chanod, Vapi, Gujarat - <span
                                    class="font-medium">396195</span></span>
                        </div> -->
                        <!-- <button
                            class="w-full sm:w-auto px-16 py-3 font-medium text-white bg-primary-orange bg-primary-grey shadow rounded-sm"
                            type="submit">UPDATE CART</button> -->
                        <?php
                        if (mysqli_num_rows($cart) > 0) { ?>
                            <a href="checkout.php">
                                <button class="w-full sm:w-auto px-16 py-3 font-medium text-white bg-primary-blue bg-primary-blue shadow rounded-sm ml-auto">PLACE
                                    ORDER
                                </button>
                            </a>
                        <?php    }
                        ?>
                    </div>
                    <!-- place order btn -->

                </div>
                <!-- cart items container -->

                <!-- saved for later items container -->


            </div>
            <!-- cart column -->

            <!-- price sidebar column  -->
            <div class="flex sticky top-16 sm:h-screen flex-col sm:w-4/12 sm:px-1">

                <!-- nav tiles -->
                <div class="flex flex-col bg-white rounded-sm shadow">
                    <h1 class="px-6 py-3 border-b font-medium text-gray-500">PRICE DETAILS</h1>

                    <div class="flex flex-col gap-4 p-6 pb-3">
                        <p class="flex justify-between">Price (
                            <?= mysqli_num_rows($cart); ?> item)
                            <?php
                            $sum = 0;
                            if (mysqli_num_rows($cart) > 0) {
                                foreach ($cart as $item) {
                                    $sum = $sum + ($item['price'] * $item['prod_qty']);
                                }
                            }
                            ?>
                            <span>₹
                                <span class="subTotal">
                                    <?= $sum; ?>
                                </span>
                            </span>
                        </p>
                        <p class="flex justify-between">Delivery Charges <span class="text-primary-green">FREE</span>
                        </p>

                        <div class="border border-dashed"></div>
                        <p class="flex justify-between text-lg font-medium">Total Amount <span>₹
                                <span class="totalPrice">
                                    <?= $sum ?>
                                </span>
                            </span></p>
                        <div class="border border-dashed"></div>

                        <!-- <p class="font-medium text-primary-green">You will save ₹10,000 on this order</p> -->

                    </div>

                </div>
                <!-- nav tiles -->

            </div>
            <!-- price sidebar column  -->
        </div>
        <!-- row -->

    </main>
    <?php include("includes/footer.php") ?>                       
    <script src="assets/js/custom.js"></script>
</body>

</html>