<?php
include_once "db.php";

$adId=$_REQUEST["adId"];
$sql="delete from favorites where adId=$adId";
$conn->query($sql);
header("location:listFavorites.php");
?>