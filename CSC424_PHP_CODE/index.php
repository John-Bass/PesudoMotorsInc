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
        index
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" media="screen">
  </head>



  <body id="BodyStyleOne" style="margin: 50px; background-image: url('rAuOq5.jpg'); background-attachment: fixed; background-size: cover;">
  <a href="logout.php"> Logout </a>
  
  <h1>HOME PAGE</h1>
  <hr>

  <div>
        <a class='btn btn-primary btn-sm' href="login.php">Login</a>

        <a class='btn btn-primary btn-sm' href="signup.php">Signup</a>

        <a class='btn btn-primary btn-sm' href="vehicledata.php">All Vehicle Data</a>

        <a class='btn btn-primary btn-sm' href="browse.php">Browse</a>

        <a class='btn btn-primary btn-sm' href="order.php">Order</a>

        <a class='btn btn-primary btn-sm' href="datainsertion.php">Data Insertion</a>
  </div>
  
  <br><br>

  <div>
      <form method="post">
          <input class='btn btn-primary btn-sm' type="submit" name="showbrands" value="Brands"></input>
          <input class='btn btn-primary btn-sm' type="submit" name="showsubbrands" value="Subbrands"></input>
          <input class='btn btn-primary btn-sm' type="submit" name="showmodels" value="Models"></input>
          <input class='btn btn-primary btn-sm' type="submit" name="showusers" value="Users"></input>
          <input class='btn btn-primary btn-sm' type="submit" name="showvehicleorders" value="Ordered Vehicles"></input>
          <input class='btn btn-primary btn-sm' type="submit" name="showproductorders" value="Ordered Products"></input>
      </form>
  </div>
  
  <br>

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
          <table class=\"table\">
            <tr id=\"TOPTR\">
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
          <table class=\"table\">
            <tr id=\"TOPTR\">
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
          <table class=\"table\">
            <tr id=\"TOPTR\">
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
          <table class=\"table\">
            <tr id=\"TOPTR\">
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
          <table class=\"table\">
            <tr id=\"TOPTR\">
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
          <table class=\"table\">
            <tr id=\"TOPTR\">
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

  </body>
</html>