<?php
    session_start();
    include('../config/dbcon.php');
    if(isset($_SESSION['user'])) {
        $userid = $_SESSION['userid'];
        if(isset($_POST['scope'])){
            $scope = $_POST['scope'];
            switch($scope)
            {
                case "add":
                    $prod_id = $_POST['prod_id'];
        
                    $user_id = $_SESSION['userid'];
        
                    $chk_existing_cart =  "SELECT * FROM carts WHERE prod_id = $prod_id AND user_id= $user_id";
                    $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);
                    
                    if(mysqli_num_rows($chk_existing_cart_run)>0)
                    {
                        echo "existing";
                    }
                    else
                    {
                        $insert_query = "INSERT INTO carts (user_id, prod_id) VALUES ('$user_id', '$prod_id')";
                        $insert_query_run = mysqli_query($con, $insert_query);
            
                        if($insert_query_run)
                        {
                            echo 201;
                        }
                        else
                        {
                            echo 500;
                        }
                    }
                    break; 
                
                case "remove":
                    $query= "SELECT * FROM carts,products where user_id=$userid and carts.prod_id=products.id";
                    $cart=mysqli_query($con,$query);
                    $id = $_POST['prod_id'];
                    $sql = "DELETE FROM carts where prod_id = $id";
                    $query_run = mysqli_query($con, $sql);
                    if($query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                    break;

                case "increment":
                    $id = $_POST['product_id'];
                    $sql = "UPDATE carts set prod_qty = prod_qty + 1 where prod_id = $id and user_id = $userid";
                    $con->query($sql);
                    $result = $con->query("SELECT * FROM products where id = $id");
                    $resultArray = array();
                    while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $resultArray[] = $item;
                    }

                    if(mysqli_num_rows($result) > 0) {
                        echo json_encode($resultArray);
                    } else {
                        echo 500;
                    }
                    break;

                    case "decrement":
                        $id = $_POST['product_id'];
                        $sql = "UPDATE carts set prod_qty = prod_qty - 1 where prod_id = $id and user_id = $userid";
                        $con->query($sql);
                        $result = $con->query("SELECT * FROM products where id = $id");
                        $resultArray = array();
                        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            $resultArray[] = $item;
                        }
    
                        if(mysqli_num_rows($result) > 0) {
                            echo json_encode($resultArray);
                        } else {
                            echo 500;
                        }
                        break;

                default:
                    echo 500;
            }
        }
    } 
    else {
        echo 401;
    }
?>