<?php
 
 include 'dao.php';

  $driver     = "mysql:";  
  $host_name  = "localhost";  
  $db_name    = "db_web_business_banc";  
  $user_name  = "";
  $password   = ""; 

  $conn = new Connection ($driver,$host_name,$db_name,$user_name,$password);

?>
