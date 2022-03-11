<?php
  $dbhost = "localhost"; /* host computer*/
  $dbuser = "root"; /* default computer*/
  $dbpass = "usm4321"; /* host password */
  $dbname = "login_sample_db";

  if ($con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
  {
    die("Failed to Connect!")
  }
 ?>
