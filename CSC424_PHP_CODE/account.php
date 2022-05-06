<?php
session_start(); //Add this

include ("connection.php");
include ("functions.php");

// Also you have to add your connection file before your query
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="account.css">
    <title>Account Page</title>

    <style>

    </style>
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
    <div id="bodyContainer">
        <br>
        <br>
          
    <div id="bodyContainer">
        <form id = "updateButton" method = "POST">
            <input type = "text" name = "user_name" maxlength = "100"> 
            <input type = "submit" name="update" value="Update"/>
        </form>
        <div class="masterBlock" id="masterBlockID">
            <?php

                $sql = "SELECT users.user_name
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                    die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>User Name</h1>           <h3>". $row["user_name"] ."</h3>
                    ";
                    }
                }

                if(isset($_POST['update']))
                {
                    $user_name = $_POST['user_name'];
                    $query = "UPDATE users.user_name WHERE $user_name = 'user_name'";
                    mysqli_query($con,$query);        
                }

            ?>

            
            <br>
        </div>

        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT users.user_first_name
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>First Name</h1>           <h3>". $row["user_first_name"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>
    <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT users.user_last_name
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Last Name</h1>           <h3>". $row["user_last_name"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>
    <br>

    <div class="masterBlock">
        <?php
                $sql = "SELECT users.user_date_of_birth
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Date of Birth</h1>           <h3>". $row["user_date_of_birth"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>

        <br>

    <div class="masterBlock">
        <?php
                $sql = "SELECT user_gender
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Gender</h1>           <h3>". $row["user_gender"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>

        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT user_income
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Income</h1>           <h3>". $row["user_income"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>

        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT user_address
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Address</h1>           <h3>". $row["user_address"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>

        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT user_city
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>City</h1>           <h3>". $row["user_city"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>
        <br>
            
        <div class="masterBlock">
        <?php
                $sql = "SELECT user_phone
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Phone Number</h1>           <h3>". $row["user_phone"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>

        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT user_email
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Email</h1>           <h3>". $row["user_email"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>
        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT user_classification
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Classification</h1>           <h3>". $row["user_classification"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>
        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT user_card_type
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Card Type</h1>           <h3>". $row["user_card_type"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>
        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT user_sec_number
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Security Number</h1>           <h3>". $row["user_sec_number"] ."</h3>
                    ";
                    }
                }
            ?>
            <br>
        </div>
        <br>

        <div class="masterBlock">
        <?php
                $sql = "SELECT user_date_joined
                FROM users WHERE web_id = '495544'";

                $result = $con->query($sql); 

                if(!$result)
                {
                     die("Invalid Query: " . $con->error);
                }
                else
                {
                while($row = $result->fetch_assoc())
                    {
                    echo "
                    <h1>Date Joined</h1>           <h3>". $row["user_date_joined"] ."</h3>
                    ";
                    }

                }
            ?>
            <br>
        </div>
        <br>
            </div>
                <br>
    </div>
</body>
</html>




<?php
    // WORK IN PROGRESS CODE!!!

    $query = "SELECT users.user_first_name FROM users WHERE web_id = '495544'"
?>