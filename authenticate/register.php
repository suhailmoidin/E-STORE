<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: ../home/home.php");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../logo/favicon.ico">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="code.php" method="post" autocomplete="">
                    <h2>Register</h2>
                    <div class="form-group mb-2">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="firstname" placeholder="First Name">
                    </div>
                    <div class="form-group mb-2">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="male" name="gender" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>

                    <!-- Material inline 2 -->
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="female" name="gender" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-group mb-2">
                        <label>Phone number</label>
                        <input class="form-control" type="text" name="phone" placeholder="Phone Number">
                    </div>
                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email Address">
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="register" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>