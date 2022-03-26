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
      <a href="logout.php"> Logout </a>
      <h1> 
        Displaying Vehicle Information 
        <a class='btn btn-primary btn-sm' href="index.php">Index</a>
        <a class='btn btn-primary btn-sm' href="browse.php">Browse</a>
      </h1>

      <br>

      <h4 style="background-color: white">Brands</h4>
      <table style="background-color: white" class="table">
        <thead>
          <tr style="background-color: white;">
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Phone #</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT * FROM brandInfo";
          $result = $con->query($sql);

          if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
          else
          {
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
              <td>
                <a class='btn btn-primary btn-sm' href='update'>Update</a>
                <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
              </td>
              </tr>
              ";
            }
          }
          ?>
        </tbody>
      </table>

      <br><br>
      
      <!--COMPLETE THIS TABLE IN MYPHPADMIN-->
      <h4 style="background-color: white">Sub-Brands</h4>
      <table style="background-color: white" class="table">
        <thead>
          <tr style="background-color: white;">
            <th>Brand</th>
            <th>Sub-Brand Name</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT * FROM subbrands ORDER BY brand_name";
          $result = $con->query($sql);

          if(!$result)
          {
            die("Invalid Query: " . $con->error);
          }
          else
          {
            while($row = $result->fetch_assoc())
            {
              echo 
              "
              <tr>
                <td>" . $row["brand_name"] . "</td>
                <td>" . $row["subbrand_name"] . "</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='update'>Update</a>
                    <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
                </td>
              </tr>";
            }
          }
          ?>
        </tbody>
      </table>

      <br><br>

      <h4 style="background-color: white">Models</h4>
      <table style="background-color: white" class="table">
        <thead>
          <tr style="background-color: white;">
            <th>Brand</th>
            <th>Model</th>
            <th>Class</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT * FROM models ORDER BY model_classification";
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
              <td>" . $row["brand_name"] . "</td>
              <td>" . $row["model_name"] . "</td>
              <td>" . $row["model_classification"] . "</td>

              <td>
                <a class='btn btn-primary btn-sm' href='update'>Update</a>
                <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
              </td>
            </tr>";
            }
          }
          ?>
        </tbody>
      </table>

      <br><br>

      <h4 style="background-color: white">Vehicles</h4>
      <table style="background-color: white" class="table">
        <thead>
          <tr style="background-color: white;">
            <th>Year</th>
            <th>Model</th>
            <th>vehicle_color</th>
            <th>vehicle_engine</th>
            <th>vehicle_trans</th>
            <th>vehicle_price</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $sql = "SELECT vehicle_year, model_name, vehicle_color, vehicle_engine, vehicle_trans, vehicle_price
                  FROM vehicleInventory
                  ORDER BY model_name, vehicle_color, vehicle_engine ASC;";
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
              <td>" . $row["vehicle_year"] . "</td>
              <td>" . $row["model_name"] . "</td>
              <td>" . $row["vehicle_color"] . "</td>
              <td>" . $row["vehicle_engine"] . "</td>
              <td>" . $row["vehicle_trans"] . "</td>
              <td>" . $row["vehicle_price"] . "</td>
              <td>
                <a class='btn btn-primary btn-sm' href='update'>Update</a>
                <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
              </td>
            </tr>";
            }
          }
          ?>
        </tbody>
      </table>

      <br><br>

  </body>
</html>