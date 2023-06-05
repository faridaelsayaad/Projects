<?php
include_once "db.php";

$uId=$_REQUEST["uId"];
$sql="select * from sessionDetails where uId='$uId'";
$result=$conn->query($sql);
$obj=$result->fetch_assoc();
$id=$obj["id"];

$sql="delete from favorites where adId=$id";
$conn->query($sql);
header("location:controllers/favoritesController.php");
?>