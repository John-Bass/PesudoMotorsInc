<?php
  session_start();
  $_SESSION;

  include ("connection.php");
  include ("functions.php");
  $user_data = check_login($con);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="screen">
</head>
<body id="BodyStyleOne" margin="50px">

    <div>
            <a class='btn btn-primary btn-sm' href="index.php">Index</a>

            <a class='btn btn-primary btn-sm' href="login.php">Login</a>

            <a class='btn btn-primary btn-sm' href="signup.php">Signup</a>

            <a class='btn btn-primary btn-sm' href="vehicledata.php">All Vehicle Data</a>

            <a class='btn btn-primary btn-sm' href="browse.php">Browse</a>

            <a class='btn btn-primary btn-sm' href="datainsertion.php">Data Insertion</a>
    </div>

</body>
</html>