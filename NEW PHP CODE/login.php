<?php
session_start();
  include ("connection.php");
  include ("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    if(!empty($user_name) && !empty($user_password))
    {
      //read from database
      $query = "select * from users where user_name = '$user_name' limit 1";

      $result = mysqli_query($con, $query);

      if($result)
      {
        if($result && mysqli_num_rows($result) > 0)
        {
          $user_data = mysqli_fetch_assoc($result);

          if($user_data['user_password'] === $user_password)
          {
            $_SESSION['web_id'] = $user_data['web_id'];
            header("Location: index.php");
            die;
          }
        }
      }
    }else
    {
      echo "Wrong Username or Password!";
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>
   <div class="container">
       <form id="loginForm">
           <h1 style="height:25px; text-align:center">Login</h1>
           UserName:
           <input id="userName" type="text" name="user_name" maxlength="100">
           <br>
           Password:
           <input id="userPassword" type="password" name="user_password" minlength="4" maxlength="12">
           <br>
           <input id="submitButton" type="submit" value="Login">
           <br>
           <button id="signupButton"><a href="signup.php">Signup</a></button>
       </form>
   </div> 
</body>
</html>