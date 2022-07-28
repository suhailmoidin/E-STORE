<?php
require_once "../functions/myfunctions.php";
include('includes/header.php');
include('includes/navbar.php');
if(!isset($_SESSION['user'])) {
    echo "<script>
        alert('Please Login to continue');
        window.location.href='../authenticate/login.php';
        </script>";
}
$id = $_GET['id'];
$userid = $_SESSION['userid'];
$product = getByID("products", $id);
$data = mysqli_fetch_array($product);
$sql = "SELECT * from carts where prod_id = $id and user_id = $userid";
$cart = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['name'] ?></title>
    <link rel="shortcut icon" href="https://static-assets-web.flixcart.com/www/promos/new/20150528-140547-favicon-retina.ico" type="image/x-icon">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- material icons cdn -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- owl carousel cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom build css -->
    <link rel="stylesheet" href="../style/productStyle.css">
</head>

<body class="bg-gray-100">





    <!-- categories container header -->
    <section class="hidden sm:block bg-white w-full px-2 sm:px-12 shadow overflow-hidden border-b">

        <!-- categories container -->
        <!-- <div class="flex items-center justify-between p-0.5">
            
            
            <a  href="#" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue flex items-center gap-0.5 group">Electronics <span class="material-icons md-16 text-gray-400 group-hover:text-primary-blue">expand_more</span></a>
            <a  href="#" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue flex items-center gap-0.5 group">TVs & Appliances <span class="material-icons md-16 text-gray-400 group-hover:text-primary-blue">expand_more</span></a>
            <a  href="#" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue flex items-center gap-0.5 group">Men <span class="material-icons md-16 text-gray-400 group-hover:text-primary-blue">expand_more</span></a>
            <a  href="#" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue flex items-center gap-0.5 group">Women <span class="material-icons md-16 text-gray-400 group-hover:text-primary-blue">expand_more</span></a>
            <a  href="#" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue flex items-center gap-0.5 group">Baby & Kids <span class="material-icons md-16 text-gray-400 group-hover:text-primary-blue">expand_more</span></a>
            <a  href="#" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue flex items-center gap-0.5 group">Home & Furniture <span class="material-icons md-16 text-gray-400 group-hover:text-primary-blue">expand_more</span></a>
            <a  href="#" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue flex items-center gap-0.5 group">Sports, Books & More <span class="material-icons md-16 text-gray-400 group-hover:text-primary-blue">expand_more</span></a>
            <a  href="https://www.flipkart.com/travel/flights?otracker=nmenu_Flights" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue">Flights</a>
            <a  href="https://www.flipkart.com/offers-store" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue">Offer Zone</a>
            <a  href="https://www.flipkart.com/grocery-supermart-store?marketplace=GROCERY&otracker=nmenu_Grocery" class="text-sm p-2 text-gray-800 font-medium hover:text-primary-blue">Grocery</a>
           

        </div> -->
    </section>
    <!-- categories container header -->

    <!-- main sections starts -->
    <main class="mt-12 sm:mt-0">

        <!-- product image & description container -->
        <div class="w-full flex flex-col sm:flex-row bg-white sm:p-2 relative">

            <!-- image wrapper -->
            <div class="w-full sm:w-2/5 sm:sticky top-16 sm:h-screen">
                <!-- imgbox -->
                <div class="flex flex-col gap-3 m-3">
                    <div class="image-box w-full h-96 p-4 border">
                        <img class="w-full h-full object-contain" src="../uploads/<?= $data['image']; ?>" alt="">
                    </div>
                    <div class="w-full flex gap-3">
                        <?php
                        if(mysqli_num_rows($cart) > 0) { ?>
                            <button class="p-4 w-1/2 flex items-center justify-center gap-2 text-white bg-primary-yellow rounded-sm shadow" onclick="location.href='cart.php'">
                                <span class="material-icons">shopping_cart</span>
                                GOTO CART
                            </button>
                    <?php    } else { ?>
                            <button class="p-4 w-1/2 flex items-center justify-center gap-2 text-white bg-primary-yellow rounded-sm shadow addToCartBtn" value="<?= $id; ?>" type="submit">
                                <span class="material-icons">shopping_cart</span>
                                ADD TO CART
                            </button>
                    <?php    }
                        ?>
                        <button class="p-4 w-1/2 flex items-center justify-center gap-2 text-white bg-primary-orange rounded-sm shadow addToCartBtn" value="<?=$id?>" onclick="location.href='checkout.php'" type="submit">
                            <span class="material-icons">flash_on</span>
                            BUY NOW
                        </button>
                    </div>

                </div>
                <!-- imgbox -->
            </div>
            <!-- image wrapper -->

            <!-- product desc wrapper -->
            <div class="flex-1 py-2 px-3">

                <!-- whole product description -->
                <div class="flex flex-col gap-2 mb-4">

                    <h2 class="text-lg"><?= $data['name']; ?></h2>
                    <!-- rating badge -->

                    <!-- rating badge -->

                    <!-- price desc -->
                    <span class="text-primary-green text-sm font-medium">Special Price</span>
                    <div class="flex items-baseline gap-2 text-2xl font-medium">
                        <span>₹<?= $data['price']; ?></span>
                    </div>
                    <!-- price desc -->


                    <!-- warranty & brand -->

                    <!-- warranty & brand -->

                    <!-- delivery details -->

                    <!-- delivery details -->

                    <!-- color selection -->
                    <!-- <div class="flex gap-20 mt-4 items-stretch text-sm font-medium">
                <p class="text-gray-500">Color</p>
                <ul class="flex gap-3">
                    <li class="w-14 h-14 border cursor-pointer hover:border-primary-blue"><img class="w-full h-full object-contain" src="https://rukminim1.flixcart.com/image/160/160/prod-fk-cms-brand-images/164752bf18d354f1de5b2451fb11c381da8a6570cd227b9e4828917f34e7e7c6.jpg" alt=""></li>
                    <li class="w-14 h-14 border cursor-pointer"><img class="w-full h-full object-contain" src="https://rukminim1.flixcart.com/image/160/160/prod-fk-cms-brand-images/164752bf18d354f1de5b2451fb11c381da8a6570cd227b9e4828917f34e7e7c6.jpg" alt=""></li>
                    <li class="w-14 h-14 border cursor-pointer"><img class="w-full h-full object-contain" src="https://rukminim1.flixcart.com/image/160/160/prod-fk-cms-brand-images/164752bf18d354f1de5b2451fb11c381da8a6570cd227b9e4828917f34e7e7c6.jpg" alt=""></li>
                </ul>
            </div> -->
                    <!-- color selection -->


                    <!-- highlights & services details -->
                    <div class="flex flex-col sm:flex-row justify-between">
                        <!-- highlights details -->

                        <!-- highlights details -->

                        <!-- services details -->
                        <!-- <div class="flex gap-16 mt-4 mr-6 items-stretch text-sm">
                <p class="text-gray-500 font-medium">Services</p>
                <ul class="flex flex-col gap-2">
                    <li>
                        <p class="flex items-center gap-3"><span class="material-icons md-18 text-primary-blue">verified_user</span> 1 Year</p>
                    </li>
                    <li>
                        <p class="flex items-center gap-3"><span class="material-icons md-18 text-primary-blue">cached</span> 7 Days Replacement Policy</p>
                    </li>
                    <li>
                        <p class="flex items-center gap-3"><span class="material-icons md-18 text-primary-blue">paid</span> Cash on Delivery available</p>
                    </li>
                </ul>
            </div> -->
                        <!-- services details -->
                    </div>
                    <!-- highlights & services details -->

                    <!-- seller details -->
                    <div class="flex gap-16 mt-4 items-center text-sm font-medium">
                        <p class="text-gray-500">Seller</p>
                        <a class="font-medium text-primary-blue ml-3" href="#">CORSECA</a>
                    </div>
                    <!-- seller details -->

                    <!-- flipkart plus banner -->
                    <!-- <div class="sm:w-1/2 mt-4 border">
                <img class="w-full h-full object-contain" src="https://rukminim1.flixcart.com/lockin/763/305/images/promotion_banner_v2_active.png" alt="">
            </div> -->
                    <!-- flipkart plus banner -->

                    <!-- description details -->
                    <div class="flex flex-col sm:flex-row gap-1 sm:gap-14 mt-4 items-stretch text-sm">
                        <p class="text-gray-500 font-medium">Description</p>
                        <div class="container mw-100">
                            <span><?= $data['description']; ?></span>
                        </div>
                    </div>
                    <!-- description details -->


                    <!-- border box -->
                    <!-- <div class="w-full mt-6 rounded-sm border flex flex-col">
                <h1 class="px-6 py-4 border-b text-2xl font-medium">Product Description</h1>

               
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-7 p-6 items-stretch border-b">
                    <img class="h-40 sm:h-24 w-full sm:w-44 object-contain" src="https://rukminim1.flixcart.com/image/200/200/cms-rpd-images/919a81e496a24548bbcec5d90c2960ff_16d4db6631c_image.jpeg" alt="">
                    <div class="flex flex-col gap-2">
                        <h2 class="text-lg">Wireless Entertainment</h2>
                        <p class="text-sm">Using Bluetooth technology, connect your smart devices to this headset and groove to your favorite melodies for up to 8 hours. Let the high-definition sound of this headset serenade your soul without any wires.</p>
                    </div>
                </div>

                <div class="flex flex-col gap-2 sm:gap-7 sm:flex-row-reverse p-6 items-stretch">
                    <img class="h-40 sm:h-24 w-full sm:w-44 object-contain" src="https://rukminim1.flixcart.com/image/200/200/cms-rpd-images/919a81e496a24548bbcec5d90c2960ff_16d4db6631c_image.jpeg" alt="">
                    <div class="flex flex-col gap-2">
                        <h2 class="text-lg">Stylish and Classy</h2>
                        <p class="text-sm">This boAt headset is lightweight, sleek, and sturdy to make your musical experience stylish and convenient. It features an ergonomic base that ensures that this headset offers a custom fit as per your head's shape.</p>
                    </div>
                </div>
                
            </div> -->
                    <!-- border box -->

                    <!-- specifications border box -->
                    <div class="w-full mt-4 pb-4 rounded-sm border flex flex-col">
                        <h1 class="px-6 py-4 border-b text-2xl font-medium">Specifications</h1>
                        <h1 class="px-6 py-3 text-lg">General</h1>

                        <pre class="ml-5 text-black-500 font-medium"><?= $data['specification'] ?></pre>
                        <!-- specs list -->

                    </div>
                    <!-- specifications border box -->

                    <!-- specifications border box -->

                    <!-- specifications border box -->

                </div>

            </div>
            <!-- product desc wrapper -->

        </div>
        <!-- product image & description container -->

        <div class="flex flex-col gap-3 px-2 mt-6">
            <!-- you may like section -->
            <section id="recommended" class="bg-white w-full shadow overflow-hidden">
                <!-- header -->

                <!-- header -->

                <!-- products container -->

                <!-- products container -->
            </section>
            <!-- you may like section -->

            <!-- top rated section -->

            <!-- top rated section -->
        </div>

    </main>
    <!-- main sections starts -->





    <!-- footer starts -->
    <?php include("includes/footer.php") ?>
    <!-- footer ends -->

    <!-- jquery cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- js-image-zoom cdn -->
    <script src="https://cdn.jsdelivr.net/npm/js-image-zoom/js-image-zoom.min.js"></script>

    <!-- custom js -->
    <div>
        <script src="assets/js/custom.js"></script>
    </div>
</body>

</html>