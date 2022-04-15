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
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Login</title>
   </head>
   <body style="background-image: url('logImage.jpg'); background-attachment: fixed; background-size: cover;">
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
        background-image: url('for--black-and-red-stripes-background-slides.jpg');
        background-attachment: fixed;
        background-size: 35% 35%;
        margin: auto;
        width: 300px;
        padding: 20px;
      }
      </style>

      <div id="box">
        <form method="post">
          <div style = "text-align: center; font-size: 20px; margin: 10px; color: white">Login</div>
          <input id="text" size="37px" type="text" name="user_name"> <br><br>
          <input id="text" size="37px" type="password" name="user_password"><br><br>
          <input id="button" type="submit" value="Login"><br><br>

          <a id="button" href="signup.php">Signup</a><br><br>
        </form>
      </div>
   </body>
 </html>