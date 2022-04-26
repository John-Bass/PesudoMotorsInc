<?php
session_start();
  include ("connection.php");
  include ("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    // $user_date_of_birth = $_POST['user_date_of_birth'];
    // $user_gender = $_POST['user_gender'];
    // $user_income = $_POST['user_income'];
    // $user_address = $_POST['user_address'];
    // $user_city = $_POST['user_city'];
    // $user_state = $_POST['user_state'];
    // $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_classification = $_POST['user_classification'];
    // $user_card_type = $_POST['user_card_type'];
    // $user_card_number = $POST['user_card_number'];
    // $user_sec_number = $_POST['user_sec_number'];


    if(!empty($user_name) && !empty($user_password))
    {
      //save to database
      $web_id = random_num(20);
      $query = "insert into users (user_name, user_password, user_first_name, user_last_name, user_email, user_classification, web_id) values ('$user_name', '$user_password', '$user_first_name', '$user_last_name', '$user_email', '$user_classification', '$web_id')";

      mysqli_query($con, $query);

      header("Location: login.php");
      die;
    }else
    {
      echo "Please enter some valid information!";
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="signup.css">
    <title>Signup Page</title>
  </head>
  <body>
    <div class="container">
      <form id="submitForm">
        <h1 style="height:25px; text-align:center">Signup</h1>
        Email: 
        <input id="userEmail" type="email" name="user_email" maxlength="100">
        <br>
        UserName: 
        <input id="userName" type="text" name="user_name" maxlength="100">
        <br>
        Password: 
        <input id="userPassword" type="password" name="user_password" minlength="4" maxlength="12">
        <br>
        Name: 
        
        <input id="userFirstName" type="text" name="user_first_name" maxlength="30" placeholder="First Name">
        <input id="userLastName" type="text" name="user_last_name" maxlength="30" placeholder="Last Name" >
        <br>
        Class: 
        <input id="userClassification" type="text" name="user_classification" maxlength="6" placeholder="USER / DEALER">
        <br>
        <input id="submitButton" type="submit" value="Sign-Up">
        <br><br>
        <p></p>
      </form>
    </div>
  </body>
</html>
