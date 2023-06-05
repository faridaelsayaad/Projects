<?php
include_once "db.php";
$sessionId=$_REQUEST["sessionId"];
$sql="select * from sessiondetails where sessionId=$sessionId";
$res=$conn->query($sql);


while($row=$res->fetch_assoc())
{
   
    echo "<div class=images><img src=".@$row["photo"]." width=200
    height=200>
    <br>

    
    
    
    <div>".@$row["name"]."</div><div><a href=listAddDetails.php?adId=".$row["id"].">view details</a><br><a href=updateAd.php?adId=".$row["id"].">Edit Ad</a>
    <br><a href=delete.php?adId=".$row["id"].">delete</a></div><br>
    </div>";
}

?>