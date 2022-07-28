<?php
    session_start();
    include("../config/dbcon.php");
    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM carts where user_id = $userid";
    $cart = mysqli_query($con, $sql);
    foreach($cart as $item) {
        $id = $item['user_id'];
        $prodid = $item['prod_id'];
        $sql = "SELECT * from products where id = $prodid";
        $result = mysqli_query($con, $sql);
        $product = mysqli_fetch_assoc($result);
        $image = $product['image'];
        $name = $product['name'];
        $price = $product['price'] * $item['prod_qty'];
        $query = "INSERT INTO orders(user_id, prod_id,image,name,price) VALUES ($id, $prodid, '$image', '$name', $price)";
        if($con->query($query) === TRUE) {
            echo "success";
        }
    }
    $sql = "DELETE FROM carts where user_id = $userid";
    $con->query($sql);
?>