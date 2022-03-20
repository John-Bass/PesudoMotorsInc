<?php
  session_start();
  $_SESSION;

  include ("connection.php");
  include ("functions.php");
  $user_data = check_login($con);
 ?>
 <?php
  if(isset($_POST['search']))
  {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT `vehicle_vin`, `vehicle_price`, `vehicle_year`, `model_name`, `vehicle_color`, `vehicle_engine`, `vehicle_trans`, `date_produced`, `isAvailable` FROM `vehicleinventory` WHERE CONCAT(`vehicle_price`, `vehicle_year`, `model_name`, `vehicle_color`, `vehicle_engine`) LIKE '%". $valueToSearch . "%'";
    $search_result = filterTable($query);
}
  else
  { 
      $query = "SELECT * FROM vehicleInventory";
      $search_result = filterTable($query);
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Browse</title>
    <style>
        tr:nth-child(even)
        {
            background-color: #D6EEEE;
        }
    </style>
</head>
<body style="margin: 50px; background-image: url('rAuOq5.jpg'); background-attachment: fixed; background-size: cover;">
    <div margin= 50%>
        <form action="browse.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Enter value to search"><br><br>
            <input type="submit" name="search" value="Filter">
            <div>
                <br>
                <a class='btn btn-primary btn-sm' href="index.php">Index</a>
                <a class='btn btn-primary btn-sm' href="vehicledata.php">Vehicle Data</a>
            </div>

            <table style="background-color: white;" margin="50px" class="table">
                <tr style="background-color: lightgrey">
                    <th>Year</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>Engine</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['vehicle_year'];?></td>
                    <td><?php echo $row['model_name'];?></td>
                    <td><?php echo $row['vehicle_color'];?></td>
                    <td><?php echo $row['vehicle_engine'];?></td>
                    <td><?php echo $row['vehicle_price'];?></td>
                    <td><a class='btn btn-primary btn-sm' href='order.php'>Order</a></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
    </div>
</body>
</html>