<?php
  session_start();

  if(isset($_SESSION['web_id']))
  {
    unset($_SESSION['web_id']);
  }

  header("Location: login.php");
  die;
 ?>