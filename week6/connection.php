<?php
//creating a database connection - $link is a variable use for just connection class
$link=mysqli_connect("localhost","root","") or die("Connection failed: " . mysqli_connect_error());
mysqli_select_db($link, "LoginReg") or die(mysqli_error($link));

