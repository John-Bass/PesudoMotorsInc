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
  </head>
  <body style="margin: 50px;">
  <h1>HOME PAGE</h1>
  <hr>


  <a class='btn btn-primary btn-sm' href="login.php">Login</a>

  <a class='btn btn-primary btn-sm' href="signup.php">Signup</a>

  <a class='btn btn-primary btn-sm' href="vehicledata.php">Vehicle Data</a>

  <br><br>

  <form method="post">

    <input class='btn btn-primary btn-sm' type="submit" name="button1" value="Brands"></input>
    <input class='btn btn-primary btn-sm' type="submit" name="button2" value="Models"></input>
    <input class='btn btn-primary btn-sm' type="submit" name="button3" value="Insert Brand"></input>
  </form>
  <table class="table">
  <?php
    if(isset($_POST['button1']))
      {
        $sql = "SELECT * FROM brandInfo ORDER BY brand_name ASC";
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
                <tr></tr>
                <td>" . $row["brand_name"] . "</td>

                ";
              }
          }
      }
  ?>
  <?php
    if(isset($_POST['button2']))
      {
        $sql = "SELECT model_name FROM models ORDER BY model_name ASC";
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
                <tr></tr>
                <td>" . $row["model_name"] . "</td>
                ";
              }
          }
      }
  ?>
  </table>

  <div>
  <form method="POST">
    <h1>Insert Data</h1>
          <div>
            <label>Brand Name:</label>
            <input id="text" type="text"      name="brand_name"
                   maxlength="100"></input><br><br>
          </div>
          <div>
            <label>Subbrand Name:</label>
            <input id="text" type="text"      name="subbrand_name"
                   maxlength="100"></input><br><br>
          </div>
          <div>
            <label>Model Name:</label>
            <input id="text" type="text"      name="model_name"
                   maxlength="100"></input><br><br>
          </div>
          <div>
            <label>Classification:</label>
            <input id="text" type="text"      name="classificiation"
                   maxlength="100"></input><br><br>
          </div>
          <input id="button" type="submit" name="submit"   value="Insert"><br><br>
          </form>
    </div>
    <?php
              if(isset($_POST['submit']))
              {
                $brand_name_value = $_POST['brand_name'];
                $model_name = $_POST['model_name'];
                $subbrand_name = $_POST['subbrand_name'];
                $classificiation = $_POST['classificiation'];
                $sql = "INSERT INTO `brandinfo`(`brand_name`) VALUES ('$brand_name_value')";
                mysqli_query($con, $sql);
              }
              else
              {
                
                die;
              }
    ?>

  </body>
</html>