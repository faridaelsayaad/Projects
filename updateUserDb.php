<?php

session_start();
include_once "db.php";

$firstName=$_REQUEST["firstName"];
$lastName=$_REQUEST["lastName"];
$phoneNum=$_REQUEST["phoneNum"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$id=$_SESSION["id"];

$sql="UPDATE `user` SET `firstName`='$firstName',`lastName`='$lastName',`phoneNum`='$phoneNum',`email`='$email' WHERE id=$id";
$conn->query($sql);
header("location:final.php");

?>