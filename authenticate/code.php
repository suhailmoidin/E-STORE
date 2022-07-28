<?php
    session_start();
    include('../functions/myfunctions.php');

    if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $isValid = false;

        $sql = "SELECT id,email, pass
        FROM users
        where email='$email' and pass='$password'
        ";

        $result = $con->query($sql);

        if($result->num_rows != 0) {
            $isValid = true;
        }

        if(mysqli_num_rows($result) > 0) {
            foreach($result as $item) {
                $credentials = $item;
            }
        }

        $email = $credentials['email'];
        $password = $credentials['pass'];

        if($isValid == true) {
            $_SESSION['user'] = $email;
            $_SESSION['userid'] = $credentials['id'];
            if($email == "admin@gmail.com") {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../home/home.php");
            }
        } else {
            redirect("login.php", "Something went wrong");
        }
    }

    if(isset($_POST['register'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users(firstname, lastname, gender, phone, email, pass) values('$firstname','$lastname','$gender', '$phone', '$email', '$password')";
        $_SESSION['user'] = $email;
        $con->query($sql);
        $sql = "SELECT id from users where email='$email'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['userid'] = $row['id'];
        redirect("../home/home.php", "successfully registered");
    }
?>