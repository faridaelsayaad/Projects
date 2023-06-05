
<html>
<head>
    <link rel="stylesheet" href="styless.css">
</head>
</hmtl>
<?php

include_once "db.php";
session_start();
$adId=$_REQUEST["adId"];
$sql="SELECT *FROM sessiondetails where id=$adId";
$resultDataSet=$conn->query($sql);


$sessionDetailsObj=$resultDataSet->fetch_assoc();

$adId=$_REQUEST["adId"];
$sql="SELECT *FROM session where id=".$sessionDetailsObj["sessionId"];
$resultDataSet=$conn->query($sql);
$sessionObj=$resultDataSet->fetch_assoc();

$sql="SELECT *FROM favorites where adId=$adId";
$resultDataSet=$conn->query($sql);
$favObj=$resultDataSet->fetch_assoc();


if(isset($_SESSION["id"]))
{
    include_once "header2.php";
    echo"<div class=container>";
    echo "<div class=imgL><img src=".$sessionDetailsObj["photo"]." width=300
  height=300>
  <br>";
  if($sessionObj["userId"]!=@$_SESSION["id"])
  {
    if($sessionDetailsObj["id"]!=@$favObj["adId"])
    {
        echo"<h2 class=fav><a href=insertFavoritesDb.php?adId=".$adDetailsObj["adId"].">Add To Favorites</a></h2>
        </div>";
    
        
    }
    else
    {
        echo"<h2 class=fav>Added To Favorites</h2>
        <br><a href=deleteFav.php?adId=".$favObj["adId"].">remove from favorites</a>
        </div>";

    }

  }
  else{
    echo"<h2 class=fav>Your Ad</h2>
    </div>";

  }
 


}
/*
elseif((!isset($_SESSION["id"])))
{
    include_once "header.php";
    echo"<div class=container>";

echo "<div class=imgL><img src=".$sessionDetailsObj["photo"]." width=300
  height=300>
  <br>
 </div>";


}
/*
$adId=$_REQUEST["adId"];
$sql="SELECT *FROM sessiondetails where id=$adId";
$resultDataSet=$conn->query($sql);


$sessionDetailsObj=$resultDataSet->fetch_assoc();


echo"
<div class=imgDesc>
<h2>Product Info</h2>
<h3>Product Name:</h3> ".$sessionDetailsObj["name"]."<br> 
<h3>Description:</h3>".$sessionDetailsObj["description"]."
<h3>Price:</h3>".$sessionDetailsObj["price"]."
<h3>Purchase Year:</h3>".$sessionDetailsObj["purchaseYear"];

$sql="SELECT * FROM governorate where id=".$sessionDetailsObj["govId"];
$res=$conn->query($sql);
$govObj=$res->fetch_assoc();
echo" <h3>governorate:</h3>".$govObj["name"]."</div>";


$sql="SELECT * FROM session where id=".$sessionDetailsObj["sessionId"];
$result=$conn->query($sql);
$sessionObj=$result->fetch_assoc();

echo "<div class=userInfo>";
$sql="SELECT * FROM user where id=".$sessionObj["userId"];
$res=$conn->query($sql);
$userObj=$res->fetch_assoc();
echo"<h2>Seller Info</h2>
<h3>Name:</h3>".$userObj["firstName"]." ".$userObj["lastName"]."
<h3>Phone Number:</h3>".$userObj["phoneNum"]."
<h3>Email :</h3>".$userObj["email"]."



 

</div></div>";












*/



?>