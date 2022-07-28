<?php
include('../functions/myfunctions.php');
include('includes/header.php');
if (!isset($_SESSION['user'])) {
    header("Location: ../authenticate/login.php");
}
$userid = $_SESSION['userid'];
$sql = "SELECT * from orders where user_id = $userid";
$orders = mysqli_query($con, $sql);
?>

<title>E-store</title>
</head>
<?php include('includes/navbar.php'); ?>

<body>

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
                        <span class="font-medium px-4">ORDER STATUS</span>

                        <!-- checkboxes -->
                        <div class="flex flex-col gap-3 px-4 mt-3 pb-3 border-b">
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="ontw" class="h-4 w-4">
                                <label for="ontw">On the way</label>
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="devlivered" class="h-4 w-4">
                                <label for="devlivered">Delivered</label>
                            </div>
                        </div>
                        <!-- checkboxes -->

                    </div>
                    <!-- order status checkboxes -->

                    <!-- order time checkboxes -->
                    <!-- order time checkboxes -->


                </div>
                <!-- nav tiles -->

            </div>
            <!-- sidebar column  -->

            <!-- orders column -->
            <div class="flex-1">

                <!-- orders container -->
                <div class="flex flex-col gap-3 sm:mr-4 overflow-hidden">

                    <!-- searchbar -->
                    <!-- searchbar -->

                    <!-- ordered item -->
                    <?php
                    if (mysqli_num_rows($orders) > 0) {
                        foreach ($orders as $item) {
                            $date = $item['order_on'];
                            $sql = "SELECT EXTRACT(MONTH FROM '$date') as month";
                            $result = mysqli_query($con, $sql);
                            $month = mysqli_fetch_assoc($result)
                    ?>
                            <a class="flex flex-col sm:flex-row p-4 items-start bg-white border rounded gap-2 sm:gap-0 hover:shadow-lg" href="product.php?id=<?= $item['prod_id'] ?>">
                                <!-- image container -->
                                <div class="w-full sm:w-32 h-20">
                                    <img class="h-full w-full object-contain" src="../uploads/<?= $item['image'] ?>" alt="<?= $item['name'] ?>">
                                </div>
                                <!-- image container -->

                                <!-- order desc container -->
                                <div class="flex flex-col sm:flex-row justify-between w-full">

                                    <div class="flex flex-col gap-1 overflow-hidden">
                                        <p class="text-sm"><?= $item['name'] ?></p>
                                        <p class="text-xs text-gray-500">Seller: PETILANTE Online</p>
                                    </div>

                                    <div class="flex flex-col sm:flex-row mt-1 sm:mt-0 gap-2 sm:gap-20 sm:w-1/2">
                                        <p class="text-sm">₹<?= $item['price'] ?></p>

                                        <div class="flex flex-col gap-1.5">
                                            <p class="text-sm font-medium flex items-center gap-2">
                                                <span class="material-icons text-primary-green md-14">circle</span>
                                                <?= $item['order_on'] ?>
                                            </p>
                                            <p class="text-xs ml-1"><?= $item['status'] ?></p>
                                        </div>
                                    </div>

                                </div>
                                <!-- order desc container -->

                            </a>
                    <?php    }
                    }
                    ?>
                </div>
                <!-- orders container -->

            </div>
            <!-- orders column -->
        </div>
        <!-- row -->

    </main>
    <!-- main sections starts -->
</body>

</html>