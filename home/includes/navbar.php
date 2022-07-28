<?php
$categories = getAll("categories");
if (isset($_SESSION['user'])) {
    $userid = $_SESSION['userid'];
    $sql = "SELECT * from carts where user_id = $userid";
    $cart = mysqli_query($con, $sql);
    $sql = "SELECT * from users where id = $userid";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    $numCart = mysqli_num_rows($cart);
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
        <img src="../logo/E-store.png" class="mr-4" style="height: 25px;" />
        <a class="navbar-brand text-white" href="home.php">E STORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        CATEGORIES
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <li><a class="pl-3 py-3.5 flex gap-3 items-center hover:bg-gray-50 rounded-b" href="search.php?category_id=4"><i class="fa-solid fa-laptop"></i>Laptop</a></li>
                        <li><a class="pl-3 py-3.5 flex gap-3 items-center hover:bg-gray-50 rounded-b" href="search.php?category_id=5"><i class="fa-solid fa-mobile"></i>Mobile</a></li>
                        <li><a class="pl-3 py-3.5 flex gap-3 items-center hover:bg-gray-50 rounded-b" href="search.php?category_id=6"><i class="fa-solid fa-fan"></i>Fan</a></li>
                        <li><a class="pl-3 py-3.5 flex gap-3 items-center hover:bg-gray-50 rounded-b" href="search.php?category_id=7"><i class="fa-solid fa-tablet"></i>Tablet</a></li>
                        <li><a class="pl-3 py-3.5 flex gap-3 items-center hover:bg-gray-50 rounded-b" href="search.php?category_id=9"><i class="fa-solid fa-headphones"></i>Earphone</a></li>
                        <li><a class="pl-3 py-3.5 flex gap-3 items-center hover:bg-gray-50 rounded-b" href="search.php?category_id=8"><i class="fa-solid fa-tv"></i>Television</a></li>


                        </a>

                </li>
            </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#"></a>
            </li>
            <!-- <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">MY WISHLIST</a>
        </li> -->
            </ul>
            <form class="d-flex w-50" method="post" action="search.php">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-none text-white me-4" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <ul class="navbar-nav me-2 mb-2 mb-lg-0">
                <li class="nav-item mt-1 mr-4">
                    <a href="cart.php" class="flex items-center text-white font-medium gap-2 relative">
                        <span class="material-icons">shopping_cart</span>
                        <!-- badge count -->
                        <?php
                        if (isset($_SESSION['user']) && $numCart > 0) { ?>
                            <div class="w-5 h-5 p-2 bg-red-500 text-xs rounded-full absolute -top-2 left-3 flex justify-center items-center border">
                                <?= $numCart; ?>
                            </div>
                        <?php }
                        ?>
                        <!-- badge count -->
                    </a>
                </li>
                <!-- <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">SIGN IN</a>
        </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white " href="profile.php" data-bs-toggle="dropdown">
                        <span class="<?php if (isset($_SESSION['user'])) {
                                            echo " flex";
                                        } else {
                                            echo "hidden";
                                        } ?> dropdown-toggle items-center">
                            <?php
                            echo $user['firstname'];
                            ?> </span></a>
                    <ul class="dropdown-menu fade-up">
                        <li> <a class="pl-3 py-3.5 border-b flex gap-3 items-center hover:bg-gray-50 rounded-t" href="profile.php">
                                <span class="material-icons md-18 text-primary-blue">account_circle</span>
                                My Profile
                            </a></li>
                        <li> <a class="pl-3 py-3.5 border-b flex gap-3 items-center hover:bg-gray-50" href="orders.php">
                                <span class="material-icons md-18 text-primary-blue">shopping_bag</span>
                                Orders
                            </a></li>
                        <li><a class="pl-3 py-3.5 flex gap-3 items-center hover:bg-gray-50 rounded-b" href="logout.php">
                                <span class="material-icons md-18 text-primary-blue">power_settings_new</span>
                                Logout
                            </a></li>
                    </ul>
                </li>
                <a href="/E-store/authenticate/login.php" class="<?php if (isset($_SESSION['user'])) {
                                                                        echo " hidden";
                                                                    }
                                                                    ?> userDropDown px-9 py-0.5 text-primary-blue bg-white border font-medium rounded-sm
                    cursor-pointer">Login</a>
        </div>
    </div>
</nav>
<style>
    @media all and (min-width: 992px) {
        .navbar .dropdown-menu-end {
            right: 0;
            left: auto;
        }

        .navbar .nav-item .dropdown-menu {
            display: block;
            opacity: 0;
            visibility: hidden;
            transition: .3s;
            margin-top: 0;
        }

        .navbar .nav-item:hover .nav-link {
            color: #fff;
        }

        .navbar .dropdown-menu.fade-down {
            top: 80%;
            transform: rotateX(-75deg);
            transform-origin: 0% 0%;
        }

        .navbar .dropdown-menu.fade-up {
            top: 180%;
        }

        .navbar .nav-item:hover .dropdown-menu {
            transition: .3s;
            opacity: 1;
            visibility: visible;
            top: 100%;
            transform: rotateX(0deg);
        }
    }
</style>