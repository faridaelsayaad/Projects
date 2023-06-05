<?php
if(isset($_REQUEST["catId"])&&!isset($_REQUEST["govId"]))
{
 
  //if a category is chosen
  $catId=$_REQUEST["catId"];
  echo"<div class=photo>";
  
  $sql="SELECT * from sessiondetails where catId=$catId";
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

}
elseif(isset($_REQUEST["govId"]) && isset($_REQUEST["catId"]))
{
 

  
  $catId=$_REQUEST["catId"];
  @$govId=$_REQUEST["govId"];
  echo"<div class=photo>";
  $sql="SELECT * FROM sessiondetails where catId=$catId AND govId=$govId";
  $result3=$conn->query($sql);
  //echo $result3->num_rows;
  while($row=$result3->fetch_assoc())
  {

    if($result3->num_rows!=0)
    {
      echo "<div class=images><img src=".@$row["photo"]." width=200
    height=200>
    <br>

    
    
    
    <div>".@$row["name"]."</div><div><a href=listAddDetails.php?adId=".$row["id"].">view details</a></div>
    </div>";
    }
    
  }
  echo"</div>";
echo"</div>";
}
elseif (!isset($_REQUEST["catId"])&&!isset($_REQUEST["govId"]))
{
 if(isset($_REQUEST["query"]))
 {
    echo "hi";
  }
  else{
    
  echo"<div class=photo>";
  $sql="SELECT * from sessiondetails";
  $resultDataset=$conn->query($sql);
  while($row=$resultDataset->fetch_assoc())
  {
  
 
    echo "<div class=images><img src=".$row["photo"]." width=200
    height=200>
    <br>
    
    <div>".$row["name"]."</div><div><a href=listAddDetails.php?adId=".$row["id"].">view details</a></div>
    </div>";

  }

  }
  
 
echo"</div>";
echo"</div>";
  
}
elseif (!isset($_REQUEST["catId"])&&isset($_REQUEST["govId"]))
{
  @$govId=$_REQUEST["govId"];
  echo"<div class=photo>";
  $sql="SELECT * FROM sessiondetails where  govId=$govId";
  $result3=$conn->query($sql);
  //echo $result3->num_rows;
  while($row=$result3->fetch_assoc())
  {



    if($result3->num_rows!=0)
    {
      echo "<div class=images><img src=".@$row["photo"]." width=200
    height=200>
    <br>

    
    
    
    <div>".@$row["name"]."</div><div><a href=listAddDetails.php?adId=".$row["id"].">view details</a></div>
    </div>";
    
    }
    
  }
 
  echo"</div>";
echo"</div>";

}




?>

