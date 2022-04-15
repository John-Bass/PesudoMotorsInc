<?php
  $dbhost = "localhost"; /* host computer*/
  $dbuser = "root"; /* default computer*/
  $dbpass = ""; /* host password */
  $dbname = "pseudomotorsinc";

  if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
    die("Failed to Connect!")

 ?>