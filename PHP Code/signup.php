<?php
session_start();
  include ("connection.php");
  include ("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['email']
    $address = $_POST['address']
    $phone = $_POST['phone']

    if(!empty($user_name) && !empty($password) && !is_numeric(%user_name))
    {
      //save to database
      $user_id = random_num(20);
      $query = "insert into users (user_id, user_name, password, email, address, phone) values ('$user_id', '$user_name', '$password', '$email', '$address', '$phone')";

      mysqli_query($con, $query);

      header("Location: login.php")
      die;
    }
    else
    {
      echo "Please enter some valid information!";
    }
  }
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Signup</title>
   </head>
   <body>
      <style type="text/css">

      #text{
        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
      }

      #button{
        padding: 10px;
        width: 100px;
        color: white;
        background-color: lightblue;
        border: none;
      }

      #box{
        background-color: grey;
        margin: auto;
        width: 300px;
        padding: 20px;
      }
      </style>

      <div id="box">
        <form method="post">
          <input id="text" type="text" name=<"user_name"> <br><br>
          <input id="text" type="password" name=<"password"><br><br>
          <input id="text" type="text" name=<"email"><br><br>
          <input id="text" type="text" name=<"address"><br><br>
          <input id="text" type="text" name=<"phone"><br><br>
          <input id="button" type="submit" value=<"Signup"><br><br>

          <a href="login.php">Click to Login</a><br><br>
        </form>
      </div>
   </body>
 </html>
