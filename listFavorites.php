<?php
include_once "db.php";
include_once "header2.php";
session_start();

$userId=$_SESSION["id"];


$sql="select * from favorites where userId=$userId";
$res=$conn->query($sql);
while($row=$res->fetch_assoc())
{
   



    $sql="select * from sessiondetails where id=".$row["adId"];
    $result2=$conn->query($sql);
    $sessionDetailsObj=$result2->fetch_assoc();

    echo "<div class=images><img src=".@$sessionDetailsObj["photo"]." width=200
    height=200>
    <br>

    
    
    
    <div>".$sessionDetailsObj["name"]."</div><div><a href=listAddDetails.php?adId=".$sessionDetailsObj["adId"].">view details</a><br>
    <a href=deleteFav.php?adId=".$sessionDetailsObj["id"].">remove from favorites</a></div><br>
    </div>";


    
}




?>