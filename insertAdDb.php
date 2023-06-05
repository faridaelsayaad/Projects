<?php
include_once "db.php";
session_start();
$fileName=$_REQUEST["fileName"];

$name=$_REQUEST["name"];
$catId=$_REQUEST["catId"];
$govId=$_REQUEST["govId"];
$price=$_REQUEST["price"];
$purchaseYear=$_REQUEST["purchaseYear"];
$description=$_REQUEST["description"];
$photo=$_REQUEST["photo"];

$userId=$_SESSION["id"];
$var="images/ads/".$fileName;
$date=date('y-m-d');
$time=date("h:i:sa");
//


$sql="select * from session where userId=$userId and date='$date'";
$res=$conn->query($sql);
$sessionObj=$res->fetch_assoc();

if(isset($sessionObj))
{
    
    $sessionId=$sessionObj["id"];

}
else{
    $sql="INSERT INTO `session`( `date`, `userId`) VALUES ('$date','$userId')";
    $conn->query($sql);
    $sessionId=$conn->insert_id;
}




$sql="INSERT INTO `sessiondetails`(`sessionId`, `name`, `catId`, `govId`, `price`, `purchaseYear`, `description`, `photo`, `time`) VALUES ('$sessionId','$name','$catId','$govId','$price','$purchaseYear','$description','$var','$time')";
$conn->query($sql);
header("location:myAds.php?");






?>