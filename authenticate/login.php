<?php
    session_start();
    if(isset($_SESSION['user'])) {
        header("Location: ../home/home.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" href="../logo/favicon.ico">
    <link rel="stylesheet" href="../style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <?php
                    if(isset($_POST['login'])) {
                        $isValid = false;

                        $sql = "SELECT email, pass
                        FROM users
                        where email='$email' and pass='$password'
                        ";

                        $result = $con->query($sql);

                        if($result->num_rows != 0) {
                            $isValid = true;
                        }

                        if($isValid == false) { ?>
                            <div class="error">Incorrect Email or Password</div>
                            
                <?php   }
                    }
                ?>
                <form action="code.php" method="post">
                    <h2>Sign In</h2>
                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group mt-4">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center mt-2">
                        Not yet a member? <a href="register.php">Register now</a>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</body>
</html>

