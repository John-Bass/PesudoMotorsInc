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
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="screen">
</head>
<body id="BodyStyleOne">
    <h1>Data Insertion</h1>
    <hr>
    <div>
        <a class='btn btn-primary btn-sm' href="index.php">Index</a>

        <a class='btn btn-primary btn-sm' href="login.php">Login</a>

        <a class='btn btn-primary btn-sm' href="signup.php">Signup</a>

        <a class='btn btn-primary btn-sm' href="vehicledata.php">All Vehicle Data</a>

        <a class='btn btn-primary btn-sm' href="browse.php">Browse</a>

        <a class='btn btn-primary btn-sm' href="order.php">Order</a>
    </div>
  
  <br><br>

    <div>
        <form method="post">
            <input class='btn btn-primary btn-sm' type="submit" name="showInsertBrand" value="Insert Brands"></input>
            <input class='btn btn-primary btn-sm' type="submit" name="showInsertModels" value="Insert Models"></input>
            <input class='btn btn-primary btn-sm' type="submit" name="showInsertVehicles" value="Insert Vehicles"></input>
        </form>
    </div>




    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
              if(isset($_POST['showInsertBrand']))
              {
                echo
                "
                  <div>
                    <form method=\"post\">
                      <h1>Insertion into Brand Table</h1>
                            <div>
                              <label>Brand Name:</label>
                              <input id=\"text\" type=\"text\"      name=\"brand_name\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>Address:</label>
                              <input id=\"text\" type=\"text\"      name=\"brand_address\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>City:</label>
                              <input id=\"text\" type=\"text\"      name=\"brand_city\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>State:</label>
                              <input id=\"text\" type=\"text\"      name=\"brand_state\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>Phone #:</label>
                              <input id=\"text\" type=\"text\"      name=\"brand_phone\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                
                            <input id=\"button\" class='btn btn-danger btn-sm' type=\"submit\" name=\"submitInsertBrand\"   value=\"Add\"><br><br>
                    </form>
                  </div>
                ";
              }
              else if(isset($_POST['showInsertModels']))
              {
                echo
                "
                  <div>
                    <form method=\"post\">
                      <h1>Insertion into Subbrand and Model Tables</h1>
                            <div>
                              <label>Brand Name:</label>
                              <input id=\"text\" type=\"text\"      name=\"brand_name\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>Subbrand Name:</label>
                              <input id=\"text\" type=\"text\"      name=\"subbrand_name\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>Model Name:</label>
                              <input id=\"text\" type=\"text\"      name=\"model_name\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>Classification:</label>
                              <input id=\"text\" type=\"text\"      name=\"classificiation\"
                                    maxlength=\"100\"></input><br><br>
                
                            <input id=\"button\" class='btn btn-danger btn-sm' type=\"submit\" name=\"submitInsertModel\"   value=\"Add\"><br><br>
                    </form>
                  </div>
                ";
              }
              else if (isset($_POST['showInsertVehicles']))
              {
                echo
                "
                  <div>
                    <form method=\"post\">
                      <h1>Insertion into Vehicles Table</h1>
                            <div>
                              <label>Year:</label>
                              <input id=\"text\" type=\"text\"      name=\"vehicle_year\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>Model:</label>
                              <input id=\"text\" type=\"text\"      name=\"model_name\"
                                    maxlength=\"100\" placeholder=\"Existing Model\"></input><br><br>
                            </div>
                            <div>
                              <label>Color:</label>
                              <input id=\"text\" type=\"text\"      name=\"vehicle_color\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>Engine:</label>
                              <input id=\"text\" type=\"text\"      name=\"vehicle_engine\"
                                    maxlength=\"100\" placeholder=\"V8/V6/V4\"></input><br><br>
                            </div>
                            <div>
                              <label>Transmission:</label>
                              <input id=\"text\" type=\"text\"      name=\"vehicle_trans\"
                                    maxlength=\"100\" placeholder=\"AUTO/MANU\"></input><br><br>
                            </div>
                            <div>
                              <label>Price:</label>
                              <input id=\"text\" type=\"text\"      name=\"vehicle_price\"
                                    maxlength=\"100\"></input><br><br>
                            </div>
                            <div>
                              <label>Date of Production:</label>
                              <input id=\"text\" type=\"text\"      name=\"date_produced\"
                                    maxlength=\"100\" placeholder=\"YYYY-MM-DD\"></input><br><br>
                            </div>
                            
                
                            <input id=\"button\" class='btn btn-danger btn-sm' type=\"submit\" name=\"submitInsertVehicle\"   value=\"Add\"><br><br>
                    </form>
                  </div>
                ";
              }
                if(isset($_POST['submitInsertVehicle']))
                {
                  $vehicle_price = $_POST['vehicle_price'];
                  $vehicle_year = $_POST['vehicle_year'];
                  $model_name = $_POST['model_name'];
                  $vehicle_color = $_POST['vehicle_color'];
                  $vehicle_engine = $_POST['vehicle_engine'];
                  $vehicle_trans = $_POST['vehicle_trans'];
                  $date_produced = $_POST['date_produced'];
                  $isAvailable = $_POST['isAvailable'];
                  
                  $sqlVehicle = "INSERT INTO `vehicleinventory`(`vehicle_price`, `vehicle_year`, `model_name`, `vehicle_color`, `vehicle_engine`, `vehicle_trans`, `date_produced`, `isAvailable`) 
                                 VALUES ('$vehicle_price','$vehicle_year','$model_name','$vehicle_color','$vehicle_engine','$vehicle_trans','$date_produced','Y')";
                  mysqli_query($con, $sqlVehicle);
                }
                else if(isset($_POST['submitInsertModel']))
                {
                  $brand_name_value = $_POST['brand_name'];
                  $model_name = $_POST['model_name'];
                  $subbrand_name = $_POST['subbrand_name'];
                  $classificiation = $_POST['classificiation'];
                  $sqlBrand = "INSERT INTO `brandinfo`(`brand_name`) VALUES ('$brand_name_value')";
                  $sqlSubbrands = "INSERT INTO `subbrands`(`brand_name`, `subbrand_name`) VALUES ('$brand_name_value','$subbrand_name')";
                  $sqlModels = "INSERT INTO `models`(`model_name`, `model_classification`, `brand_name`) VALUES ('$model_name','$classificiation','$subbrand_name')";
                  mysqli_query($con, $sqlSubbrands);
                  mysqli_query($con, $sqlModels);
                }else if(isset($_POST['submitInsertBrand']))
                {
                  $brand_name_value = $_POST['brand_name']; 
                  $brand_address = $_POST['brand_address'];
                  $brand_city = $_POST['brand_city'];
                  $brand_state = $_POST['brand_state'];
                  $brand_phone = $_POST['brand_phone'];
                  $sqlBrand = "INSERT INTO `brandinfo`(`brand_name`, `brand_address`, `brand_city`, `brand_state`, `brand_phone`) VALUES ('$brand_name_value','$brand_address','$brand_city','$brand_state','$brand_phone')"; 
                  mysqli_query($con, $sqlBrand);
                }
                else
                {
                  die;
                }

    }
    ?>
</body>
</html>