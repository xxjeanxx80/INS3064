<?php
//creating a database connection - $link is a variable use for just connection class
$link=mysqli_connect("localhost","root","","LoginReg", 3306) ;
mysqli_select_db($link,"LoginReg") or die(mysqli_error($link));
?>

