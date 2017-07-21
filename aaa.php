<?php
session_start();

include 'connection.php';

$vreceivermobile=$_POST['receivermobile'];
$vlpassword=$_POST['lpassword'];
$vamount=$_POST['amount'];
$vpurpose=$_POST['purpose'];


$sql ="select password from person where mobileno=$vmobileno and password='$vpassword'";
$result=$conn->query($sql);
if(!$row=mysqli_fetch_assoc($result)) {
	echo "Your mobileno or password is incorrect";
}
else {
	echo "Your are logged in.";
}

//header("Location:index.html");


?>