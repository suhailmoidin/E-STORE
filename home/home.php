<?php
include('../functions/myfunctions.php');
include('includes/header.php');
?>
<title>E-store</title>
<link rel="stylesheet" href="../chatbot/css/chat.css">
<link rel="stylesheet" href="../chatbot/css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<?php include('includes/navbar.php'); ?>

<body>
<!-content-->
    <!--shopping content-->
    <div class="container-fluid">
        <div class="banner_slider_wrap">
            <div class="banner_slider">
                <?php
                $sql = "SELECT * from banner";
                $banners = mysqli_query($con, $sql);
                foreach($banners as $banner) { ?>
                    <div><img src="../uploads/<?=$banner['banner_url']?>"></div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <section id="topSelection" class="bg-white w-full shadow ">
            <!-- header -->
            <div class="flex px-6 py-3 justify-between items-center">
                <h1 class="text-xl font-medium">Laptops</h1>
                <a href="search.php?category_id=4" class="bg-primary-blue text-xs font-medium text-white px-5 py-2.5 rounded-sm shadow-lg">VIEW
                    ALL</a>
            </div>
            <hr>
            <!-- header -->

            <!-- products container -->
            <div class="flex items-center justify-between center">

                <?php
                $query = "SELECT * FROM products where category_id=4";
                $category = mysqli_query($con, $query);

                if (mysqli_num_rows($category) > 0) {
                    foreach ($category as $item) {
                ?>

                        <!-- one product -->
                        <a class="flex flex-col items-center gap-1.5 p-6" href="product.php?id=<?= $item['id']; ?>">
                            <div class="w-36 h-36 transform hover:scale-110 transition-transform duration-100 ease-out">
                                <img draggable="false" loading="lazy" class="w-full h-full object-contain" src="../uploads/<?php echo $item['image']; ?>" alt="">
                            </div>
                            <h2 class="font-medium text-sm mt-2">
                                <?php echo $item['name']; ?>
                            </h2>
                            <span class="fw-bold text-sm">₹
                                <?php echo $item['price']; ?>
                            </span>
                            <div class="flex flex-col gap-2 items-start">
                                <!-- rating badge -->
                                <span class="text-sm text-gray-500 font-medium flex gap-2 items-center">
                                    <span class="text-xs px-1.5 py-0.5 bg-primary-green rounded-sm text-white flex items-center gap-0.5"><?= $item['rating'] ?>
                                        <i class="material-icons md-12">star</i></span>
                                    <span><?= $item['num_ratings'] ?></span>
                                </span>
                                <!-- rating badge -->

                                <!-- price container -->
                                <!-- price container -->
                            </div>
                        </a>

                <?php
                    }
                } else {
                    echo "No records found";
                }
                ?>

            </div>
            <!-- products container -->
        </section>
        <section id="topSelection" class="bg-white w-full shadow">
            <!-- header -->
            <div class="flex px-6 py-3 justify-between items-center">
                <h1 class="text-xl font-medium">Mobile</h1>
                <a href="search.php?category_id=5" class="bg-primary-blue text-xs font-medium text-white px-5 py-2.5 rounded-sm shadow-lg">VIEW
                    ALL</a>
            </div>
            <hr>
            <!-- header -->

            <!-- products container -->
            <div class="flex items-center justify-between center">

                <?php
                $query = "SELECT * FROM products where category_id=5";
                $category = mysqli_query($con, $query);

                if (mysqli_num_rows($category) > 0) {
                    foreach ($category as $item) {
                ?>

                        <!-- one product -->
                        <a class="flex flex-col items-center gap-1.5 p-6" href="product.php?id=<?= $item['id']; ?>">
                            <div class="w-36 h-36 transform hover:scale-110 transition-transform duration-100 ease-out">
                                <img draggable="false" loading="lazy" class="w-full h-full object-contain" src="../uploads/<?php echo $item['image']; ?>" alt="">
                            </div>
                            <h2 class="font-medium text-sm mt-2">
                                <?php echo $item['name']; ?>
                            </h2>
                            <span class="fw-bold text-sm">₹
                                <?php echo $item['price']; ?>
                            </span>
                            <div class="flex flex-col gap-2 items-start">
                                <!-- rating badge -->
                                <span class="text-sm text-gray-500 font-medium flex gap-2 items-center">
                                    <span class="text-xs px-1.5 py-0.5 bg-primary-green rounded-sm text-white flex items-center gap-0.5"><?= $item['rating'] ?>
                                        <i class="material-icons md-12">star</i></span>
                                    <span><?= $item['num_ratings'] ?></span>
                                </span>
                                <!-- rating badge -->

                                <!-- price container -->
                                <!-- price container -->
                            </div>
                        </a>

                <?php
                    }
                } else {
                    echo "No records found";
                }
                ?>

            </div>
            <!-- products container -->
        </section>
        <section id="topSelection" class="bg-white w-full shadow">
            <!-- header -->
            <div class="flex px-6 py-3 justify-between items-center">
                <h1 class="text-xl font-medium">Fan</h1>
                <a href="search.php?category_id=6" class="bg-primary-blue text-xs font-medium text-white px-5 py-2.5 rounded-sm shadow-lg">VIEW
                    ALL</a>
            </div>
            <hr>
            <!-- header -->

            <!-- products container -->
            <div class="flex items-center justify-between center">

                <?php
                $query = "SELECT * FROM products where category_id=6";
                $category = mysqli_query($con, $query);

                if (mysqli_num_rows($category) > 0) {
                    foreach ($category as $item) {
                ?>

                        <!-- one product -->
                        <a class="flex flex-col items-center gap-1.5 p-6" href="product.php?id=<?= $item['id']; ?>">
                            <div class="w-36 h-36 transform hover:scale-110 transition-transform duration-100 ease-out">
                                <img draggable="false" loading="lazy" class="w-full h-full object-contain" src="../uploads/<?php echo $item['image']; ?>" alt="">
                            </div>
                            <h2 class="font-medium text-sm mt-2">
                                <?php echo $item['name']; ?>
                            </h2>
                            <span class="fw-bold text-sm">₹
                                <?php echo $item['price']; ?>
                            </span>
                            <div class="flex flex-col gap-2 items-start">
                                <!-- rating badge -->
                                <span class="text-sm text-gray-500 font-medium flex gap-2 items-center">
                                    <span class="text-xs px-1.5 py-0.5 bg-primary-green rounded-sm text-white flex items-center gap-0.5"><?= $item['rating'] ?>
                                        <i class="material-icons md-12">star</i></span>
                                    <span><?= $item['num_ratings'] ?></span>
                                </span>
                                <!-- rating badge -->

                                <!-- price container -->
                                <!-- price container -->
                            </div>
                        </a>

                <?php
                    }
                } else {
                    echo "No records found";
                }
                ?>

            </div>
            <!-- products container -->
        </section>
        <section id="topSelection" class="bg-white w-full shadow ">
            <!-- header -->
            <div class="flex px-6 py-3 justify-between items-center">
                <h1 class="text-xl font-medium">Tablet</h1>
                <a href="search.php?category_id=7" class="bg-primary-blue text-xs font-medium text-white px-5 py-2.5 rounded-sm shadow-lg">VIEW
                    ALL</a>
            </div>
            <hr>
            <!-- header -->

            <!-- products container -->
            <div class="flex items-center justify-between center">

                <?php
                $query = "SELECT * FROM products where category_id=7";
                $category = mysqli_query($con, $query);

                if (mysqli_num_rows($category) > 0) {
                    foreach ($category as $item) {
                ?>

                        <!-- one product -->
                        <a class="flex flex-col items-center gap-1.5 p-6" href="product.php?id=<?= $item['id']; ?>">
                            <div class="w-36 h-36 transform hover:scale-110 transition-transform duration-100 ease-out">
                                <img draggable="false" loading="lazy" class="w-full h-full object-contain" src="../uploads/<?php echo $item['image']; ?>" alt="">
                            </div>
                            <h2 class="font-medium text-sm mt-2">
                                <?php echo $item['name']; ?>
                            </h2>
                            <span class="fw-bold text-sm">₹
                                <?php echo $item['price']; ?>
                            </span>
                            <div class="flex flex-col gap-2 items-start">
                                <!-- rating badge -->
                                <span class="text-sm text-gray-500 font-medium flex gap-2 items-center">
                                    <span class="text-xs px-1.5 py-0.5 bg-primary-green rounded-sm text-white flex items-center gap-0.5"><?= $item['rating'] ?>
                                        <i class="material-icons md-12">star</i></span>
                                    <span><?= $item['num_ratings'] ?></span>
                                </span>
                                <!-- rating badge -->

                                <!-- price container -->
                                <!-- price container -->
                            </div>
                        </a>

                <?php
                    }
                } else {
                    echo "No records found";
                }
                ?>

            </div>
            <!-- products container -->
        </section>
        <section id="topSelection" class="bg-white w-full shadow ">
            <!-- header -->
            <div class="flex px-6 py-3 justify-between items-center">
                <h1 class="text-xl font-medium">Earphone</h1>
                <a href="search.php?category_id=9" class="bg-primary-blue text-xs font-medium text-white px-5 py-2.5 rounded-sm shadow-lg">VIEW
                    ALL</a>
            </div>
            <hr>
            <!-- header -->

            <!-- products container -->
            <div class="flex items-center justify-between center">

                <?php
                $query = "SELECT * FROM products where category_id=9";
                $category = mysqli_query($con, $query);

                if (mysqli_num_rows($category) > 0) {
                    foreach ($category as $item) {
                ?>

                        <!-- one product -->
                        <a class="flex flex-col items-center gap-1.5 p-6" href="product.php?id=<?= $item['id']; ?>">
                            <div class="w-36 h-36 transform hover:scale-110 transition-transform duration-100 ease-out">
                                <img draggable="false" loading="lazy" class="w-full h-full object-contain" src="../uploads/<?php echo $item['image']; ?>" alt="">
                            </div>
                            <h2 class="font-medium text-sm mt-2">
                                <?php echo $item['name']; ?>
                            </h2>
                            <span class="fw-bold text-sm">₹
                                <?php echo $item['price']; ?>
                            </span>
                            <div class="flex flex-col gap-2 items-start">
                                <!-- rating badge -->
                                <span class="text-sm text-gray-500 font-medium flex gap-2 items-center">
                                    <span class="text-xs px-1.5 py-0.5 bg-primary-green rounded-sm text-white flex items-center gap-0.5"><?= $item['rating'] ?>
                                        <i class="material-icons md-12">star</i></span>
                                    <span><?= $item['num_ratings'] ?></span>
                                </span>
                                <!-- rating badge -->

                                <!-- price container -->
                                <!-- price container -->
                            </div>
                        </a>

                <?php
                    }
                } else {
                    echo "No records found";
                }
                ?>

            </div>
            <!-- products container -->
        </section>
        <section id="topSelection" class="bg-white w-full shadow ">
            <!-- header -->
            <div class="flex px-6 py-3 justify-between items-center">
                <h1 class="text-xl font-medium">Television</h1>
                <a href="search.php?category_id=8" class="bg-primary-blue text-xs font-medium text-white px-5 py-2.5 rounded-sm shadow-lg">VIEW
                    ALL</a>
            </div>
            <hr>
            <!-- header -->

            <!-- products container -->
            <div class="flex items-center justify-between center">

                <?php
                $query = "SELECT * FROM products where category_id=8";
                $category = mysqli_query($con, $query);

                if (mysqli_num_rows($category) > 0) {
                    foreach ($category as $item) {
                ?>

                        <!-- one product -->
                        <a class="flex flex-col items-center gap-1.5 p-6" href="product.php?id=<?= $item['id']; ?>">
                            <div class="w-36 h-36 transform hover:scale-110 transition-transform duration-100 ease-out">
                                <img draggable="false" loading="lazy" class="w-full h-full object-contain" src="../uploads/<?php echo $item['image']; ?>" alt="">
                            </div>
                            <h2 class="font-medium text-sm mt-2">
                                <?php echo $item['name']; ?>
                            </h2>
                            <span class="fw-bold text-sm">₹
                                <?php echo $item['price']; ?>
                            </span>
                            <div class="flex flex-col gap-2 items-start">
                                <!-- rating badge -->
                                <span class="text-sm text-gray-500 font-medium flex gap-2 items-center">
                                    <span class="text-xs px-1.5 py-0.5 bg-primary-green rounded-sm text-white flex items-center gap-0.5"><?= $item['rating'] ?>
                                        <i class="material-icons md-12">star</i></span>
                                    <span><?= $item['num_ratings'] ?></span>
                                </span>
                                <!-- rating badge -->

                                <!-- price container -->
                                <!-- price container -->
                            </div>
                        </a>

                <?php
                    }
                } else {
                    echo "No records found";
                }
                ?>

            </div>
            <!-- products container -->
        </section>
    </div>

    <!--footer-->
    <?php include('includes/footer.php'); ?>

    <script src="assets/js/slick-carousel.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- CHAT BAR BLOCK -->
    <div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Chat with us!
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
        </button>

        <div class="content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                        </div>

                        <!-- User input box -->
                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg" placeholder="Tap 'Enter' to send a message">
                                <p></p>
                            </div>

                            <div class="chat-bar-icons">
                                <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart" onclick="heartButton()"></i>
                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send" onclick="sendButton()"></i>
                            </div>
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/slick-carousel.js"></script>
    <script src="../chatbot/js/responses.js"></script>
    <script src="../chatbot/js/chat.js"></script>

    </html>
