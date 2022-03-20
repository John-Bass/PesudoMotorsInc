<?php
  session_start();
  $_SESSION;

  include ("connection.php");
  include ("functions.php");
  $user_data = check_login($con);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <title>

    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    tr:nth-child(even)
        {
            background-color: #D6EEEE;
        }
    </style>
  </head>
  <body style="margin: 50px; background-image: url('rAuOq5.jpg'); background-attachment: fixed; background-size: cover;">
  <h1>HOME PAGE</h1>
  <hr>


  <a class='btn btn-primary btn-sm' href="login.php">Login</a>

  <a class='btn btn-primary btn-sm' href="signup.php">Signup</a>

  <a class='btn btn-primary btn-sm' href="vehicledata.php">Vehicle Data</a>

  <a class='btn btn-primary btn-sm' href="browse.php">Browse</a>

  <a class='btn btn-primary btn-sm' href="order.php">Order</a>

  <br><br>

  <form method="post">
    <input class='btn btn-primary btn-sm' type="submit" name="showbrands" value="Brands"></input>
    <input class='btn btn-primary btn-sm' type="submit" name="showsubbrands" value="Subbrands"></input>
    <input class='btn btn-primary btn-sm' type="submit" name="showmodels" value="Models"></input>
    <input class='btn btn-primary btn-sm' type="submit" name="showusers" value="Users"></input>
    <input class='btn btn-primary btn-sm' type="submit" name="showvehicleorders" value="Ordered Vehicles"></input>
    <input class='btn btn-primary btn-sm' type="submit" name="showproductorders" value="Ordered Products"></input>
    
    <input class='btn btn-primary btn-sm' type="submit" name="showInsertModels" value="Insert Models"></input>
    <input class='btn btn-primary btn-sm' type="submit" name="showInsertVehicles" value="Insert Vehicles"></input>
  </form>
  
  <?php
    if(isset($_POST['showbrands']))
      {
        $sql = "SELECT * FROM brandInfo ORDER BY brand_name ASC";
        $result = $con->query($sql);

        if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
        
        echo 
        "
        <br>
          <table class=\"table\" style=\"background-color: white;\">
            <tr style=\"background-color: lightgrey\">
              <th>Name</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Phone #</th>
              <th></th>
              <th></th>
            </tr>
            ";

            while($row = $result->fetch_assoc())
            {
              echo
              "
                <tr>
                    <td>" . $row["brand_name"] . "</td>
                    <td>" . $row["brand_address"] . "</td>
                    <td>" . $row["brand_city"] . "</td>
                    <td>" . $row["brand_state"] . "</td>
                    <td>" . $row["brand_phone"] . "</td>
                    <td><a class='btn btn-primary btn-sm' href='updatePage'>Update</a></td>
                    <td><a class='btn btn-danger btn-sm' href='deletePage'>Delete</a></td>
                </tr>
              ";
            }  
            echo "</table>";
      }

  ?>
  



  <?php
    if(isset($_POST['showmodels']))
      {
        $sql = "SELECT * FROM models ORDER BY model_name ASC";
        $result = $con->query($sql);

        if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
        
        echo 
        "
        <br>
          <table class=\"table\" style=\"background-color: white;\">
            <tr style=\"background-color: lightgrey\">
              <th>Brand</th>
              <th>Model</th>
              <th>Class</th>
              <th></th>
              <th></th>
            </tr>
            ";

            while($row = $result->fetch_assoc())
            {
              echo
              "
                <tr>
                    <td>" . $row["brand_name"] . "</td>
                    <td>" . $row["model_name"] . "</td>
                    <td>" . $row["model_classification"] . "</td>
                    <td><a class='btn btn-primary btn-sm' href='updatePage'>Update</a></td>
                    <td><a class='btn btn-danger btn-sm' href='deletePage'>Delete</a></td>
                </tr>
              ";
            }  
            echo "</table>";
      }

  ?>



<?php
    if(isset($_POST['showusers']))
      {
        $sql = "SELECT * FROM users ORDER BY user_last_name ASC";
        $result = $con->query($sql);

        if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
        
        echo 
        "
        <br>
          <table class=\"table\" style=\"background-color: white;\">
            <tr style=\"background-color: lightgrey\">
              <th>User ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Address</th>
              <th>City</th>
              <th>State</th>
              <th>Email</th>
              <th>Phone #</th>
              <th></th>
              <th></th>
            </tr>
            ";

            while($row = $result->fetch_assoc())
            {
              echo
              "
                <tr>
                    <td>" . $row["user_id"] . "</td>
                    <td>" . $row["user_first_name"] . "</td>
                    <td>" . $row["user_last_name"] . "</td>
                    <td>" . $row["user_address"] . "</td>
                    <td>" . $row["user_city"] . "</td>
                    <td>" . $row["user_state"] . "</td>
                    <td>" . $row["user_email"] . "</td>
                    <td>" . $row["user_phone"] . "</td>
                    <td><a class='btn btn-primary btn-sm' href='updatePage'>Update</a></td>
                    <td><a class='btn btn-danger btn-sm' href='deletePage'>Delete</a></td>
                </tr>
              ";
            }  
            echo "</table>";
      }

  ?>





<?php
    if(isset($_POST['showvehicleorders']))
      {
        $sql = "SELECT * FROM orderedvehicles ORDER BY vehicle_order_number, user_id ASC";
        $result = $con->query($sql);

        if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
        
        echo 
        "
        <br>
          <table class=\"table\" style=\"background-color: white;\">
            <tr style=\"background-color: lightgrey\">
              <th>Order #</th>
              <th>User</th>
              <th>VIN</th>
              <th>Model</th>
              <th>Date Purchased</th>
              <th></th>
              <th></th>
            </tr>
            ";

            while($row = $result->fetch_assoc())
            {
              echo
              "
                <tr>
                    <td>" . $row["vehicle_order_number"] . "</td>
                    <td>" . $row["user_id"] . "</td>
                    <td>" . $row["vehicle_vin"] . "</td>
                    <td>" . $row["model_name"] . "</td>
                    <td>" . $row["date_purchased"] . "</td>
                    <td><a class='btn btn-primary btn-sm' href='updatePage'>Update</a></td>
                    <td><a class='btn btn-danger btn-sm' href='deletePage'>Delete</a></td>
                </tr>
              ";
            }  
            echo "</table>";
      }

  ?>



<?php
    if(isset($_POST['showproductorders']))
      {
        $sql = "SELECT * FROM orderedproducts ORDER BY product_order_number, user_id ASC";
        $result = $con->query($sql);

        if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
        
        echo 
        "
        <br>
          <table class=\"table\" style=\"background-color: white;\">
            <tr style=\"background-color: lightgrey\">
              <th>Order #</th>
              <th>User</th>
              <th>Product #</th>
              <th>Date Purchased</th>
              <th></th>
              <th></th>
            </tr>
            ";

            while($row = $result->fetch_assoc())
            {
              echo
              "
                <tr>
                    <td>" . $row["product_order_number"] . "</td>
                    <td>" . $row["user_id"] . "</td>
                    <td>" . $row["product_id"] . "</td>
                    <td>" . $row["date_purchased"] . "</td>
                    <td><a class='btn btn-primary btn-sm' href='updatePage'>Update</a></td>
                    <td><a class='btn btn-danger btn-sm' href='deletePage'>Delete</a></td>
                </tr>
              ";
            }  
            echo "</table>";
      }

  ?>



<?php
    if(isset($_POST['showsubbrands']))
      {
        $sql = "SELECT * FROM subbrands ORDER BY brand_name, subbrand_name ASC";
        $result = $con->query($sql);

        if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
        
        echo 
        "
        <br>
          <table class=\"table\" style=\"background-color: white;\">
            <tr style=\"background-color: lightgrey\">
              <th>Brand</th>
              <th>Subbrand</th>
              <th></th>
              <th></th>
            </tr>
            ";

            while($row = $result->fetch_assoc())
            {
              echo
              "
                <tr>
                    <td>" . $row["brand_name"] . "</td>
                    <td>" . $row["subbrand_name"] . "</td>
                    <td><a class='btn btn-primary btn-sm' href='updatePage'>Update</a></td>
                    <td><a class='btn btn-danger btn-sm' href='deletePage'>Delete</a></td>
                </tr>
              ";
            }  
            echo "</table>";
      }

  ?>




    <?php
              if(isset($_POST['showInsertModels']))
              {
                echo
                "
                <div>
                  <form id=\"mod\" method=\"POST\">
                    <h1>Insertion into Brand, Subbrand, and Model Tables</h1>
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
              
                          <input id=\"button\" class='btn btn-danger btn-sm' type=\"submit\" name=\"submitInsert\"   value=\"Add\"><br><br>
                  </form>
                </div>
                ";

                if(isset($_POST['submitInsert']))
                {
                  $brand_name_value = $_POST['brand_name'];
                  $model_name = $_POST['model_name'];
                  $subbrand_name = $_POST['subbrand_name'];
                  $classificiation = $_POST['classificiation'];
                  $sqlBrand = "INSERT INTO `brandinfo`(`brand_name`) VALUES ('$brand_name_value')";
                  $sqlSubbrands = "INSERT INTO `subbrands`(`brand_name`, `subbrand_name`) VALUES ('$brand_name_value','$subbrand_name')";
                  $sqlModels = "INSERT INTO `models`(`model_name`, `model_classification`, `brand_name`) VALUES ('$model_name','$classificiation','$subbrand_name')";
                  mysqli_query($con, $sqlBrand);
                  mysqli_query($con, $sqlSubbrands);
                  mysqli_query($con, $sqlModels);
                }
              }
              else
              {
                
                die;
              }
    ?>


<?php
              if(isset($_POST['showInsertVehicles']))
              {
                echo
                "
                <div>
                  <form id=\"vic\" method=\"POST\">
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

                if(isset($_POST['submitInsertVehicle']))
                {
                  $vehicle_price = $_POST['vehicle_price'];
                  $vehicle_year = $_POST['vehicle_year'];
                  $model_name = $_POST['model_name'];
                  $vehicle_color = $_POST['vehicle_color'];
                  $vehicle_engine = $_POST['vehicle_engine'];
                  $vehicle_trans = $_POST['vehicle_trans'];
                  $date_produced = $_POST['date_produced'];
                  
                  $sql = "INSERT INTO `vehicleinventory`(`vehicle_price`, `vehicle_year`, `model_name`, `vehicle_color`, `vehicle_engine`, `vehicle_trans`, `date_produced`, `isAvailable`) 
                          VALUES ('$vehicle_price','$vehicle_year','$model_name','$vehicle_color','$vehicle_engine','$vehicle_trans','$date_produced','Y')";
                  mysqli_query($con, $sql);
                }
              }
              else
              {
                
                die;
              }
    ?>

  </body>
</html>