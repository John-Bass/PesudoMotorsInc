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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>index</title>
   
</head>
<header>
<h1 id="navH1">Pseudo<span>Motors</h1>
    <nav id="navbar">
        <ul id="navUl">
            <li id="navLi"><a id="navA" href="index.php">Home</a></li>
            <li id="navLi"><a id="navA" href="DBA.php">DBA</a></li>
            <li id="navLi"><a id="navA" href="account.php">Account</a></li>
            <li id="navLi"><a id="navA" href="about.php">About</a></li>

            <li id="navLi"><a id="navA" href="browse.php">Browse</a></li>

            
        </ul>
    </nav>
</header>
<body>

    <h2 id= "Headercars">Cars Available</h2>
    

    <div class ="dropdown">
        <form id="searchform" method="POST">
        
            <br><br>

            <select name="make" id="dropdown1">
                <option value="TRUCK">Truck</option>
                <option value="CAR">Car</option>
                <option value="CONVERTIBLE">Convertible</option>
                <option value="SUV">SUV</option>
                
                
            </select>

            <select name="engine" id ="dropdown2">
                <option value="V4">V4</option>
                <option value="V6">V6</option>
                <option value="V8">V8</option>

            </select>

            <select name="transmission" id ="dropdown3">
                <option value="MANU">Manual</option>
                <option value="AUTO">Automatic</option>

            </select>

            <select name="price" id="dropdown4">
                <option value="19000">10000 to 19999 </option>
                <option value="25000">20000 to 29999</option>
                <option value="33000">30000 to 39999</option>
                <option value="4">40000 to 49999</option>
                <option value="55000">50000 to 59999</option>
                <option value="60000">60000 to 69999</option>
                <option value="7">70000 to 79999</option>
                <option value="85000">80000 to 89999</option>
                <option value="9">90000 to 99999</option>
               

           

            
            <input type="submit" name = "submit" value="Submit" id="submit"/>
            <br><br><br>

            

        </form> 

    </div>

    
      <table  width = "45%" style="background-color: white" class="table">
        <thead>
          <tr style="background-color: white;">
            <th>Vin #</th>
            <th>Class</th>
            <th>Model Name</th>
            <th>Color</th>
            <th>Year</th>
            <th>Engine</th>
            <th>Trans</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>


        <?php

if(isset($_POST['submit'])) 
            {
               
                if($_POST['engine'])
                {
                    $vehicle_engine = $_POST['engine'];
                }

               
            

                if($_POST['price'])
                {

                    $vehicle_price = $_POST['price'];
                }
               
                

                if($_POST['transmission'])
                {
                    $vehicle_trans = $_POST['transmission'];
                }
               

                if($_POST['make'])
                {
                    $model_classification = $_POST['make'];
                }
               
               
               
          $sql = "SELECT models.model_classification,vehicleInventory.vehicle_vin ,vehicleInventory.model_name, vehicleInventory.vehicle_color , vehicleInventory.vehicle_year,vehicleInventory.vehicle_engine, vehicleInventory.vehicle_trans, vehicleInventory.vehicle_price,vehicleInventory.isAvailable
                  FROM vehicleInventory,models
                  WHERE models.model_name = vehicleInventory.model_name  AND isAvailable = 'Y' AND models.model_classification='$model_classification' AND vehicleInventory.vehicle_price = '$vehicle_price' AND vehicleInventory.vehicle_engine ='$vehicle_engine' AND vehicleInventory.vehicle_trans = '$vehicle_trans' 
                  ORDER BY model_name ASC;";

          $result = $con->query($sql); 

          if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
          else
          {
            while($row = $result->fetch_assoc())
            {
              echo "<tr>
              <td>" . $row["vehicle_vin"] . " </td>
              <td>" . $row["model_classification"] . "</td> 
              <td>" . $row["model_name"] . "</td> 
              <td>" . $row["vehicle_color"] . "</td> 
              <td>" . $row["vehicle_year"] . "</td> 
              <td>" . $row["vehicle_engine"] . "</td>
              <td>" . $row["vehicle_trans"] . "</td>
              <td>" . $row["vehicle_price"] . "</td>
              <td>
              ";
              ?>
              <?php
              
              echo"
              <form method=\"POST\">
                <input style = \"height: 50px; width: 45px;\" type=\"submit\" name = \"order\" value=\"order\" id=\"submit\">
              </form>
                
                ";
              ?>
                <?php
                
                echo "


              </td>
            </tr>";
            
            }
          }
        }elseif(isset($_POST['order']))
        {
            // $order = $_POST['order'];
            // $sql = "UPDATE vehicleInventory SET isAvailable = 'N' WHERE $vehicle_vin = 'order'";
            // mysqli_query($con,$sql);

              
        }
          ?>
        </tbody>
      </table>

           
        
    
</body>
</html>