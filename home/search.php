<?php
include('../functions/myfunctions.php');
include('includes/header.php');
?>

<title>E-store</title>
</head>
<?php include('includes/navbar.php'); ?>

<body class="bg-gray-100">


    <!-- header starts -->

    <!-- header ends -->


    <!-- categories container header -->

    <!-- categories container header -->

    <!-- main sections starts -->
    <main class="w-full mt-16 sm:mt-0">

        <!-- row -->
        <div class="flex gap-3.5 mt-2 sm:mt-6 sm:mx-3 m-auto mb-7">

            <!-- sidebar column  -->
            <div class="hidden sm:flex flex-col w-1/5 px-1">

                <!-- nav tiles -->
                <div class="flex flex-col bg-white rounded-sm shadow">

                    <!-- filters header -->
                    <div class="flex items-center gap-5 px-4 py-2 border-b">
                        <p class="flex w-full justify-between text-lg font-medium">Filters</p>
                    </div>

                    <!-- order status checkboxes -->
                    <div class="flex flex-col py-3 text-sm">
                        <span class="font-medium text-xs px-4">PICK A BRAND</span>

                        <!-- checkboxes -->
                        <div class="flex flex-col gap-2 px-8 font-medium mt-3 pb-3">
                            <?php
                            $query = "SELECT * FROM subcategories";
                            $category = mysqli_query($con, $query);

                            if (mysqli_num_rows($category) > 0) {
                                foreach ($category as $item) {

                            ?>
                                    <a href="search.php?subcategory_id=<?= $item['id']; ?>">
                                        <?= $item['name']; ?>
                                    </a>
                            <?php
                                }
                            } else {
                                echo "No records found";
                            }
                            ?>
                        </div>
                        <!-- checkboxes -->

                    </div>
                    <!-- order status checkboxes -->

                </div>
                <!-- nav tiles -->

            </div>
            <!-- sidebar column  -->

            <!-- search column -->
            <div class="flex-1">

                <!-- searches container -->
                <div class="grid grid-cols-4 overflow-hidden bg-white">

                    <!-- one product -->
                    <?php
                    $query = "SELECT * FROM products";
                    if (isset($_GET['subcategory_id'])) {
                        $subcategory = $_GET['subcategory_id'];
                        $query = "
                SELECT *
                from products
                where subcategory_id = $subcategory
                ";
                    }

                    if (isset($_GET['category_id'])) {
                        $category = $_GET['category_id'];
                        $query = "
                SELECT *
                from products
                where category_id = $category
                ";
                    }

                    if (isset($_POST['search'])) {
                        $search = $_POST['search'];
                        $query = "
                SELECT *
                from products
                where name LIKE '%$search%'
                ";
                    }
                    $products = mysqli_query($con, $query);

                    if (mysqli_num_rows($products) > 0) {
                        foreach ($products as $item) {

                    ?>
                            <div class="flex flex-col items-start gap-2 px-4 py-6 relative hover:shadow-lg rounded-sm">
                                <!-- image & product title -->
                                <a href="product.php?id=<?= $item['id']; ?>" class="flex flex-col ">
                                    <div class="w-44 h-48">
                                        <img class="w-full h-full object-contain" src="../uploads/<?= $item['image']; ?>" width="100%" alt="">
                                    </div>
                                    <h2 class=" mt-4 group-hover:text-primary-blue text-left">
                                        <?= $item['name']; ?>
                                    </h2>
                                </a>
                                <!-- image & product title -->

                                <!-- product description -->
                                <div class="flex flex-col gap-2 items-start">
                                    <!-- rating badge -->
                                    <span class="text-sm text-gray-500 font-medium flex gap-2 items-center">
                                        <span class="text-xs px-1.5 py-0.5 bg-primary-green rounded-sm text-white flex items-center gap-0.5">4.3
                                            <i class="material-icons md-12">star</i></span>
                                        <span>(7,345)</span>
                                    </span>
                                    <!-- rating badge -->

                                    <!-- price container -->
                                    <div class="flex items-center gap-1.5 text-md font-medium">
                                        <span>
                                            <?= "₹" . $item['price']; ?>
                                        </span>
                                        <span class="text-gray-500 line-through text-xs">₹18,890</span>
                                        <span class="text-xs text-primary-green">15%&nbsp;off</span>
                                    </div>
                                    <!-- price container -->
                                </div>
                                <!-- product description -->

                                <!-- wishlist badge -->
                                <i class="material-icons absolute top-6 right-6 text-gray-300 cursor-pointer hover:text-red-500 md-16">favorite</i>
                                <!-- wishlist badge -->

                            </div>

                        <?php
                        }
                    } else { ?>
                </div>
                <div class="flex flex-col items-center justify-center gap-3 bg-white shadow-sm rounded-sm p-6 sm:p-16">
                    <img class="w-1/2 h-44 object-contain" src="https://static-assets-web.flixcart.com/www/linchpin/fk-cp-zion/img/error-no-search-results_2353c5.png" alt="Search Not Found">
                    <h1 class="text-2xl font-medium text-gray-900">Sorry, no results found!</h1>
                    <p class="text-xl text-center text-primary-grey">Please check the spelling or try searching for
                        something else</p>
                </div>
            <?php }
            ?>
            <!-- one product -->

            </div>

        </div>
        <!-- search column -->
        </div>
        <!-- row -->

    </main>
    <!-- main sections starts -->


    <!--footer-->
</body>

</html>