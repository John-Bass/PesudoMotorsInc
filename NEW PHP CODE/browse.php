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
    <link rel="stylesheet" href="browse.css">
    <title>index</title>
   
</head>
<header>
<h1 id="navH1">Pseudo<span>Motors</h1>
    <nav id="navbar">
        <ul id="navUl">
            <li id="navLi"><a id="navA" href="index.php">Home</a></li>
            <li id="navLi"><a id="navA" href="browse.php">Browse</a></li>
            <li id="navLi"><a id="navA" href="cart.php">Cart</a></li>
            <li id="navLi"><a id="navA" href="account.php">Account</a></li>
            <li id="navLi"><a id="navA" href="about.php">About</a></li>
            <li id="navLi"><a id="navA" href="signup.php">Signup</a></li>
            <li id="navLi"><a id="navA" href="login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>

    <h2 id= "Headercars">Cars Available</h2>
    

    <div class ="dropdown">
        <form id="searchform" method="POST">
        
            <br><br>

            <select name="make" id="dropdown1">
                <option value="model_name1">Truck</option>
                <option value="model_name2">Car</option>
                <option value="model_name3">Convertible</option>
                <option value="model_name4">SUV</option>
                
                
            </select>

            <select name="engine" id ="dropdown2">
                <option value="vehicle_engine1">V4</option>
                <option value="vehicle_engine2">V6</option>
                <option value="vehicle_engine3">V8</option>

            </select>

            <select name="transmission" id ="dropdown3">
                <option value="vehicle_trans1">Manual</option>
                <option value="vehicle_trans2">Automatic</option>

            </select>

            <select name="price" id="dropdown4">
                <option value="vehicle_price1">0 to 25000</option>
                <option value="vehicle_price2">26000 to 33000</option>
                <option value="vehicle_price3">34000 to 55000</option>
                <option value="vehicle_price4">56000 to 90000</option>

            </select>

            
            <input type="submit" value="Submit" id="submit"/>
            <br><br><br>

            

        </form> 

    </div>

           
             <?php

             if(isset($_POST['submit'])) 
            {
                if($_POST['vehicle_engine1'])
                {
                    $vehicle_engine = $_POST['vehicle_engine1'];
                }
                elseif($_POST['vehicle_engine1'])
                {
                    $vehicle_engine = $_POST['vehicle_engine2'];

                }
                else
                {
                    $vehicle_engine = $_POST['vehicle_engine3'];
                }

                if($_POST['vehicle_price1'])
                {
                    $vehicle_price = $_POST['vehicle_price1'];
                }
                elseif($_POST['vehicle_price1'])
                {
                    $vehicle_price = $_POST['vehicle_price2'];
                }
                elseif($_POST['vehicle_price1'])
                {
                    $vehicle_price = $_POST['vehicle_price3'];
                }
                else
                {
                    $vehicle_price = $_POST['vehicle_price4'];
                }
                
                if($_POST['vehicle_trans1'])
                {
                    $vehicle_trans = $_POST['vehicle_trans1'];
                }
                else
                {
                    $vehicle_trans = $_POST['vehicle_trans2']; 
                }

                if($_POST['model_name1'])
                {
                    $model_classification = $_POST['model_name1'];
                }
                elseif($_POST['model_name1'])
                {
                    $model_classification = $_POST['model_name2'];
                }
                elseif($_POST['model_name1'])
                {
                    $model_classification= $_POST['model_name3'];
                }
                else
                {
                    $model_classification = $_POST['model_name4'];
                }

                
                $sql = "SELECT 'vehicleinventory'('model_classification',vehicle_engine','vehicle_trans','vehicle_price') VALUES('$model_classification','$vehicle_engine','$vehicle_trans','$vehicle_price')";
                $result = $con->query($sql);

                if (!$result){
                    die("Connection failed: ". $con->connect_error);
                }

               echo
               "
               <tr>

                 <th>Model Classification</th>
                 <th>Vehicle Engine</th>
                 <th>Vehicle Trans</th>
                 <th>Vehicle Price</th>

               </tr>
               
               ";

                while($row = $result->fetch_assoc()){

                    echo 
                    "
                     <tr>

                        <td>" . $row["model_classifcation"] . "</td>
                        <td>" . $row["vehicle_engine"] . "</td>
                        <td>" . $row["vehicle_trans"] . "</td>
                        <td>" . $row["vehicle_price"] . "</td>


                     </tr>
                    ";

                }
               
            }
            
              
                ?>
            

      
    
</body>
</html>