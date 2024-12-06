<?php 
$link=mysqli_connect("localhost", "root", "", "dbcoffeeweb");

if (mysqli_connect_errno()) {
    echo "Connection Fail ".mysqli_connect_errno();
}
 ?>