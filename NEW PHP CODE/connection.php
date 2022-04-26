<?php
  $dbhost = "localhost"; /* host computer*/
  $dbuser = "root"; /* default computer*/
  $dbpass = ""; /* host password */
  $dbname = "pseudomotorsinc";
  
  $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  
  if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
    die("Failed to Connect!")

 ?>