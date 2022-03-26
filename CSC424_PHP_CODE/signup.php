
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
    $user_date_of_birth = $_POST['user_date_of_birth'];
    $user_gender = $_POST['user_gender'];
    $user_income = $_POST['user_income'];
    $user_address = $_POST['user_address'];
    $user_city = $_POST['user_city'];
    $user_state = $_POST['user_state'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_classification = $_POST['user_classification'];
    $user_card_type = $_POST['user_card_type'];
    $user_card_number = $POST['user_card_number'];
    $user_sec_number = $_POST['user_sec_number'];


    if(!empty($user_name) && !empty($user_password))
    {
      //save to database
      $web_id = random_num(20);
      $query = "insert into users (user_name, user_password, user_first_name, user_last_name, user_date_of_birth, user_gender, user_income, user_address, user_city, user_state, user_phone, user_email, user_classification, user_card_type, user_card_number, user_sec_number, web_id) values ('$user_name', '$user_password', '$user_first_name', '$user_last_name', '$user_date_of_birth', '$user_gender', '$user_income', '$user_address', '$user_city', '$user_state', '$user_phone', '$user_email', '$user_classification', '$user_card_type', '$user_card_number', '$user_sec_number', '$web_id')";

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
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Signup</title>
   </head>
   <body style="background-image: url('sinImage.jpg'); background-attachment: fixed; background-size: cover;">
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
        background-size: 35% 100%;
        margin: auto;
        width: 300px;
        padding: 20px;
      }

      #labels{
        font-size: 22px;
        color: white;
      }
      </style>

      <div id="box">
        <form method="post">
          <div>
            <label id="labels">Username:</label>
            <input id="text" size="30px" type="text"      name="user_name"
                   maxlength="100"></input><br><br>
          </div>
          <div>
            <label id="labels">Password:</label>
            <input id="text" size="30px" type="password"  name="user_password"
                   minlength="4" maxlength="20" placeholder="Character Limit 20"></input><br><br>
          </div>
          <div>
            <label id="labels">First Name:</label>
            <input id="text" size="30px" type="text"      name="user_first_name"
                   maxlength="30"></input><br><br>
          </div>
          <div>
            <label id="labels">Last Name:</label>
            <input id="text" size="30px" type="text"      name="user_last_name"
                   maxlength="30"></input><br><br>
          </div>
          <div>
            <label id="labels">Date of Birth:</label><br>
            <input id="text" size="30px" type="date"      name="user_date_of_birth"></input><br><br>
          </div>
          <div>
            <label id="labels">Gender:</label>
            <input id="text" size="30px" type="text"      name="user_gender"
                   maxlength="1" placeholder="Character Limit 1 (O = Other)"></input><br><br>
          </div>
          <div>
            <label id="labels">Income:</label><br>
            <input id="text" size="50px" type="number"    name="user_income"
                   min="0" max="10000000" value="0"></input><br><br>
          </div>
          <div>
            <label id="labels">Address:</label>
            <input id="text" size="30px" type="text"      name="user_address"
                   maxlength="100"></input><br><br>
          </div>
          <div>
            <label id="labels">City:</label><br>
            <input id="text" size="30px" type="text"      name="user_city"
                   maxlength="50"></input><br><br>
          </div>
          <div>
            <label id="labels">State:</label>
            <input id="text" size="30px" type="text"      name="user_state"
                   maxlength="2" placeholder="Abreviation Ex. MS, TX, CA"></input><br><br>
          </div>
          <div>
            <label id="labels">Email:</label>
            <input id="text" size="30px" type="email"     name="user_email"
                   maxlength="100" placeholder="John.Smith@xyz.com"></input><br><br>
          </div>
          <div>
            <label id="labels">Phone:</label>
            <input id="text" size="30px" type="tel"       name="user_phone"
                   maxlength="25" placeholder="123-456-7890"></input><br><br>
          </div>
          <div>
            <label id="labels">Class:</label>
            <input id="text" size="30px" type="text"      name="user_classification"
                   maxlength="50" placeholder="USER or DEALER"></input><br><br>
          </div>
          <div>
            <label id="labels">Card Type:</label>
            <input id="text" size="30px" type="text"      name="user_card_type"
                   maxlength="20" placeholder="MasterCard / Visa"></input><br><br>
          </div>
          <div>
            <label id="labels">Card Number:</label>
            <input id="text" size="30px" type="text"      name="user_card_number"
                   maxlength="20" placeholder="XXXXXXXXXXXXXXXXXXXX"></input><br><br>
          </div>
          <div>
            <label id="labels">Security Number:</label>
            <input id="text" size="30px" type="text"      name="user_sec_number"
                   minlength="3" maxlength="3" placeholder="XXX"></input><br><br>
          </div>
          <!--<input id="text" type="text"      name=<"user_state"><br><br>-->

          <input id="button" type="submit"    value="Signup"><br><br>

          <a id="button" href="login.php">Login</a><br><br>
        </form>
      </div>
   </body>
 </html>

