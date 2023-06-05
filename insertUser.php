<?php
include_once "db.php";
$firstName=$_REQUEST["firstName"];
$lastName=$_REQUEST["lastName"];
$phoneNum=$_REQUEST["phoneNum"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
if($firstName==""||$lastName==""||$phoneNum=="")
{
    header("location:error.php");
}
else
{
    $sql="INSERT INTO `user`(`firstName`, `lastName`, `phoneNum`, `email`, `password`) VALUES ('$firstName','$lastName','$phoneNum','$email','$password')";
    $conn->query($sql);
    header("location:login.php");
}

/*
$firstName=$_REQUEST["firstName"];
$lastName=$_REQUEST["lastName"];
$phoneNum=$_REQUEST["phoneNum"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
*/



?>