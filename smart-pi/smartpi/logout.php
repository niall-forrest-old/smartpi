<?php
session_start();

if(!isset($_SESSION["smartpi_user"]))
{    
    header("Location: index.php");
    
  }else{ 
      
    unset($_SESSION["smartpi_user"]);
    header("Location: index.php");
}
?>