<?php
session_start();
include("../config/dbcon.php");
$b = $_SESSION['otp'];
$c = $_SESSION['email'];
if (isset($_POST['SubmitButton'])) {
    $otpnum = $_POST['otpn'];
    if ($b == $otpnum) {

        $to = $_SESSION['email'];
        $subject = 'Your Order is placed';
        $message = 'Your Order is Confirmed';
        $from = 'anonyma@gmail.com';
        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM carts where user_id = $userid";
        $cart = mysqli_query($con, $sql);
        foreach ($cart as $item) {
            $id = $item['user_id'];
            $prodid = $item['prod_id'];
            $sql = "SELECT * from products where id = $prodid";
            $result = mysqli_query($con, $sql);
            $product = mysqli_fetch_assoc($result);
            $image = $product['image'];
            $name = $product['name'];
            $price = $product['price'] * $item['prod_qty'];
            $query = "INSERT INTO orders(user_id, prod_id,image,name,price) VALUES ($id, $prodid, '$image', '$name', $price)";
            if ($con->query($query) === TRUE) {
                echo "success";
            }
        }
        $sql = "DELETE FROM carts where user_id = $userid";
        $con->query($sql);
        if (mail($to, $subject, $message)) {

            echo "<script>
            alert('Transaction is Successful,');
            window.location.href='home.php';
            </script>";
        } else {
            echo 'Unable to process your order. Please try again.';
        }
    } else {
        echo 'Unable to process your order. Please enter the correct OTP.';
    }
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <title>Payment</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">

                <form action="" method="post">
                    <h5>Please enter the OTP recieved</h5>
                    <div class="form-group mb-2">
                        <input class="form-control" type="password" name="otpn" placeholder="OTP">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="SubmitButton" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>