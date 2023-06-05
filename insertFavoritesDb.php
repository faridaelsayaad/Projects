<?php

include_once "db.php";
session_start();
$adId=$_REQUEST["adId"];
$userId=$_SESSION["id"];
echo $userId."<br>". $adId;
$sql="INSERT INTO favorites(adId, userId) VALUES ($adId,$userId)";
$conn->query($sql);
header("location:final.php");


?>