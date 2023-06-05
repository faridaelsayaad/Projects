<?php
include_once "db.php";

$firstName=$_REQUEST["query"];

$sql="select * from sessiondetails where name like'%$firstName%' ";
$resultDataset=$conn->query($sql);
while($row=$resultDataset->fetch_assoc())
{
 

  echo "<div class=images><img src=".$row["photo"]." width=200
  height=200>
  <br>
  
  <div>".$row["name"]."</div><div><a href=listAddDetails.php?adId=".$row["id"].">view details</a></div>
  </div>";

}
echo"</div>";
echo"</div>";
//header("listProducts.php?query=$firstName");
 



?>