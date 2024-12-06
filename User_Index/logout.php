<?php 
session_start();

if (session_destroy()) {
    header("Location: ../FINAL PHP/home.php");
}
 ?>