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
    <link rel="stylesheet" href="cart.css">
    <title>index</title>
</head>
<header>
<h1 id="navH1">Pseudo<span>Motors</h1>
    <nav id="navbar">
        <ul id="navUl">
            <li id="navLi"><a id="navA" href="index.php">Home</a></li>
            <li id="navLi"><a id="navA" href="browse.php">Browse</a></li>
            <li id="navLi"><a id="navA" href="cart.php">DBA</a></li>
            <li id="navLi"><a id="navA" href="account.php">Account</a></li>
            <li id="navLi"><a id="navA" href="about.php">About</a></li>
            <li id="navLi"><a id="navA" href="signup.php">Signup</a></li>
            <li id="navLi"><a id="navA" href="login.php">Login</a></li>
        </ul>
    </nav>
</header>
<body>

            <h2 id= "Headercars">Database Queries</h2>

    <div class = "buttons">

        <form id = "queryForm" method="POST">
            <input class='btn btn-primary btn-sm' id = "submit" type="submit" name="showInsertBrand" value="Sale Trends Year"></input>
            <input class='btn btn-primary btn-sm' id = "submit" type="submit" name="showInsertModels" value="Defective Transmission"></input>
            <input class='btn btn-primary btn-sm' id = "submit" type="submit" name="showInsertDollar" value="Dollar Amount Sold"></input>
            <input class='btn btn-primary btn-sm' id = "submit" type="submit" name="showInsertUnit" value="Units Sold"></input>
            <input class='btn btn-primary btn-sm' id = "submit" type="submit" name="showInsertConvertible" value="Convertible's Sold"></input>
            <input class='btn btn-primary btn-sm' id = "submit" type="submit" name="showInsertNoSale" value="Vehicle Not Sold"></input>
            <input class='btn btn-primary btn-sm' id = "submit" type="submit" name="QueryButton" value="Vehicle Not Sold"></input>


        </form>
    </div>
        
    <?php
    if(isset($_POST['showInsertBrand'])) 
    {

        echo "
        <h4>
        Show sale trends over the past 3 years and include gender and income breakdown.
        </h4>
        <table  width = \"45%\" style=\"background-color: white\" class=\"table\">
        <thead>
          <tr style=\"background-color: white;\">
            <th>Brand Name</th>
            <th>Date</th>
            <th>Gender</th>
            <th>Income</th>
          </tr>
        </thead>
        <tbody>


        ";

        $sql = "SELECT * 
              FROM users
              INNER JOIN orderedvehicles
              ON users.user_id = orderedvehicles.user_id
              INNER JOIN models
              ON orderedvehicles.model_name = models.model_name 
              ORDER BY  date_purchased DESC";
        
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
                    <td>" . $row["brand_name"] . " </td>
                    <td>" . $row["date_purchased"] . "</td> 
                    <td>" . $row["user_gender"] . "</td> 
                    <td>" . $row["user_income"] . "</td> 
                    
                    ";
                }
            }
        }
       


    ?>


        
<?php
    if(isset($_POST['showInsertModels'])) 
    {

        echo "
        <h4>
        Show Vin of bad TLX models produced in 2021-03-19 and the customers they were sold to.
        </h4>
        <table  width = \"45%\" style=\"background-color: white\" class=\"table\">
        <thead>
          <tr style=\"background-color: white;\">
            <th>Vin</th>  
            <th>Model</th>
            <th>Transmission</th>
            <th>Date Produced</th>
            <th>First Name</th>
            <th>Last Name</th>

          </tr>
        </thead>
        <tbody>


        ";

        $sql = "SELECT * FROM orderedVehicles
        INNER JOIN users ON users.user_id = orderedVehicles.user_id
        INNER JOIN vehicleInventory ON vehicleInventory.vehicle_vin = orderedVehicles.vehicle_vin
        WHERE vehicleInventory.model_name = 'TLX' AND vehicleInventory.date_produced = '2021-03-19'";
       
        
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
                    <td>" . $row["vehicle_vin"] . "</td> 
                    <td>" . $row["model_name"] . " </td>
                    <td>" . $row["vehicle_trans"] . " </td>
                    <td>" . $row["date_produced"] . "</td> 
                    <td>" . $row["user_first_name"] . "</td> 
                    <td>" . $row["user_last_name"] . "</td> 

                    
                    ";
                }
            }
        }
       


    ?>

<?php
    if(isset($_POST['showInsertDollar'])) 
    {

        echo "
        <h4>
        Top 2 brands sold by Dollar-Amount in the past year.
        </h4>
        <table  width = \"45%\" style=\"background-color: white\" class=\"table\">
        <thead>
          <tr style=\"background-color: white;\">
            <th>Model Name</th>
            <th>Subbrand Name</th>
            <th>Brand Name</th>
            <th>Price</th>
            <th>Date Purchased</th>
            


          </tr>
        </thead>
        <tbody>


        ";

       
      $sql = "  SELECT  * FROM orderedvehicles
        LEFT JOIN vehicleInventory
        ON orderedvehicles.vehicle_vin = vehicleInventory.vehicle_vin
        INNER JOIN models
        ON orderedvehicles.model_name = models.model_name
        LEFT JOIN subbrands
        ON models.brand_name = subbrands.subbrand_name
        ORDER BY subbrands.brand_name ASC ,vehicleInventory.vehicle_price  DESC
        
        ";
        
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
                    <td>" . $row["model_name"] . " </td>
                    <td>" . $row["subbrand_name"] ."</td>
                    <td>" . $row["brand_name"] . " </td>
                    <td>" . $row["vehicle_price"] . "</td> 
                    <td>" . $row["date_purchased"] . "</td> 
                   

                    
                    ";
                }
            }
        }
       


    ?>

<?php
    if(isset($_POST['showInsertUnit'])) 
    {

        echo "
        <h4>
        Top 2 brands sold by Unit in the past year.
        </h4>
        <table  width = \"45%\" style=\"background-color: white\" class=\"table\">
        <thead>
          <tr style=\"background-color: white;\">
            <th>Model Name</th>
            <th>Brand Name</th>
            <th>Price</th>
            <th>Date Purchased</th>


          </tr>
        </thead>
        <tbody>


        ";

        $sql = "SELECT * 
              FROM orderedvehicles
              LEFT JOIN vehicleInventory
              ON orderedvehicles.vehicle_vin = vehicleInventory.vehicle_vin
              INNER JOIN models
              ON vehicleInventory.model_name = models.model_name
              WHERE date_purchased LIKE '2021%' 
              ORDER BY vehicleInventory.model_name ASC,vehicle_price ASC,  date_purchased ASC
              
              ";
        
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
                    <td>" . $row["model_name"] . " </td>
                    <td>" . $row["brand_name"] . " </td>
                    <td>" . $row["vehicle_price"] . "</td> 
                    <td>" . $row["date_purchased"] . "</td> 
                   

                    
                    ";
                }
            }
        }
       


    ?>
<?php
    if(isset($_POST['showInsertConvertible'])) 
    {

        echo "
        <h4>
       Best Month for Convertibles.
        </h4>
        <table  width = \"45%\" style=\"background-color: white\" class=\"table\">
        <thead>
          <tr style=\"background-color: white;\">
            <th>Date Purchased</th>
            <th>Brand Name</th>
            <th>Class</th>


          </tr>
        </thead>
        <tbody>


        ";

        $sql = "SELECT * 
              FROM orderedvehicles
              INNER JOIN models
              ON orderedvehicles.model_name = models.model_name
              WHERE model_classification = 'CONVERTIBLE'
              ORDER BY models.model_classification
              
              ";
        
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
                    <td>" . $row["date_purchased"] . "</td> 
                    <td>" . $row["brand_name"] . " </td>
                    <td>" . $row["model_classification"] . " </td>
                    
                   

                    
                    ";
                }
            }
        }
       


    ?>

<?php
    if(isset($_POST['showInsertNoSale'])) 
    {

        echo "
        <h4>
            Vehicle in Inventory for the Longest
        </h4>
        <table  width = \"35%\" style=\"background-color: white\" class=\"table\">
        <thead>
          <tr style=\"background-color: white;\">
          
            <th>Vin</th>
            <th>Date Produced</th>
            <th>Model Name</th>
            <th>Subbrand Name</th>
            <th>Stored</th>

          </tr>
        </thead>
        <tbody>


        ";

        $sql = "SELECT * FROM vehicleInventory 
                INNER JOIN models
                ON vehicleInventory.model_name = models.model_name
                WHERE isAvailable = 'Y' 
                ORDER BY date_produced ASC             
              ";
        
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
                    
                    <td>" . $row["vehicle_vin"] . "</td> 
                    <td>" . $row["date_produced"] . "</td> 
                    <td>" . $row["model_name"] . "</td> 
                    <td>" . $row["brand_name"] . "</td> 
                    <td>" . $row["isAvailable"] . "</td>
                    
                   

                    
                    ";
                }
            }
        }
       


    ?>


<?php
    if(isset($_POST['QueryButton'])) 
    {

        echo "
        <h4>
        Show sale trends over the past 3 years and include gender and income breakdown.
        </h4>
        <table  width = \"45%\" style=\"background-color: white\" class=\"table\">
        <thead>
          <tr style=\"background-color: white;\">
            <th>Brand Name</th>
            <th>Date</th>
            <th>Gender</th>
            <th>Income</th>
          </tr>
        </thead>
        <tbody>


        ";

        $sql = "SELECT  SUM(vehicle_price)
        FROM vehicleInventory
        RIGHT JOIN orderedvehicles
        ON vehicleInventory.vehicle_vin = orderedvehicles.vehicle_vin
        WHERE isAvailable = 'N'
       
        
        ";
        
        $result = $con->query($sql); 

            if(!$result)
            {
                die("Invalid Query: " . $con->error);
            }
            else
            {
                while($row = $result->fetch_assoc())
                {
                    echo " Total Price: ". $row['SUM(vehicle_price)'];
                }
            }
        }
       


    ?>



 
     

  
</body>
</html>