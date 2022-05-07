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
            <input type = "submit" name="update" value="Update"/>
        </form>
        <div class="masterBlock" id="masterBlockID">
       
            
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

    // $query = "SELECT users.user_first_name FROM users WHERE web_id = '495544'"
?>
<?php

    
              if(isset($_POST['update']))
              {
                echo
                "
                  <div id = bodyContainer>
                  <br><br>
                  <div class = masterBlock>
                  <br>
                  <form method=\"post\">
                  <div>
                    <label id=\"labels\">Username:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_name\"
                           maxlength=\"100\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Password:</label>
                    <input id=\"text\" size=\"30px\" type=\"password\"  name=\"user_password\"
                           minlength=\"4\" maxlength=\"20\" placeholder=\"Character Limit 20\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">First Name:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_first_name\"
                           maxlength=\"30\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Last Name:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_last_name\"
                           maxlength=\"30\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Date of Birth:</label><br>
                    <input id=\"text\" size=\"30px\" type=\"date\"      name=\"user_date_of_birth\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Gender:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_gender\"
                           maxlength=\"1\" placeholder=\"Character Limit 1 (O = Other)\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Income:</label><br>
                    <input id=\"text\" size=\"50px\" type=\"number\"    name=\"user_income\"
                           min=\"0\" max=\"10000000\" value=\"0\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Address:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_address\"
                           maxlength=\"100\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">City:</label><br>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_city\"
                           maxlength=\"50\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">State:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_state\"
                           maxlength=\"2\" placeholder=\"Abreviation Ex. MS, TX, CA\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Email:</label>
                    <input id=\"text\" size=\"30px\" type=\"email\"     name=\"user_email\"
                           maxlength=\"100\" placeholder=\"John.Smith@xyz.com\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Phone:</label>
                    <input id=\"text\" size=\"30px\" type=\"tel\"       name=\"user_phone\"
                           maxlength=\"25\" placeholder=\"123-456-7890\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Class:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_classification\"
                           maxlength=\"50\" placeholder=\"USER or DEALER\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Card Type:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_card_type\"
                           maxlength=\"20\" placeholder=\"MasterCard / Visa\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Card Number:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_card_number\"
                           maxlength=\"20\" placeholder=\"XXXXXXXXXXXXXXXXXXXX\"></input><br><br>
                  </div>
                  <div>
                    <label id=\"labels\">Security Number:</label>
                    <input id=\"text\" size=\"30px\" type=\"text\"      name=\"user_sec_number\"
                           minlength=\"3\" maxlength=\"3\" placeholder=\"XXX\"></input><br><br>
                  </div>
                  <!--<input id=\"text\" type=\"text\"      name=<\"user_state\"><br><br>-->
        
                  <input id=\"button\" type=\"submit\" name = \"UPDATELS\"   value=\"UPDATE\"><br><br>
        
                 
                </form>
                  </div>
                  <br>
                  </div>
                ";
              }
              if(isset($_POST['UPDATELS']))
              {
                $user_password = $_POST['user_password'];
                $user_first_name = $_POST['user_first_name'];
                $user_last_name = $_POST['user_last_name'];
                $user_date_of_birth = $_POST['user_date_of_birth'];
                $user_gender = $_POST['user_gender'];
                $user_income = $_POST['user_income'];
                $user_address = $_POST['user_address'];
                $user_city = $_POST['user_city'];
                $user_state = $_POST['user_state'];
                $user_phone = $_POST['user_phone'];
                $user_email = $_POST['user_email'];
                $user_classification = $_POST['user_classification'];
                $user_card_type = $_POST['user_card_type'];
                $user_card_number = $POST['user_card_number'];
                $user_sec_number = $_POST['user_sec_number']; 

                

                $query = "UPDATE users SET user_password='$user_password',user_first_name='$user_first_name',user_last_name=' $user_last_name'
                ,user_date_of_birth='$user_date_of_birth',user_gender='$user_gender',user_income='$user_income',user_address='$user_address',user_city='$user_city'
                ,user_state='$user_state'
                ,user_phone='$user_phone',user_email='$user_email',user_classification='$user_classification'
                ,user_card_type='$user_card_type',user_card_number=' $user_card_number',user_sec_number='[$user_sec_number]'
                WHERE web_id = '698174331'";


                mysqli_query($con, $query);
                
              }

            
              ?>
