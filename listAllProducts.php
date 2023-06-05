
<html>
<head>
    <link rel="stylesheet" href="styles.css">
</head>
</html>

<?php

include_once "db.php";
include_once "header.php";




/*
  
   
    $result=$conn->query($sql);
    $adObj=$result->fetch_assoc();
    echo "<div class=images><img src=".$row["photo"]." width=200
    height=200>
    <br>
    
    <div>".$adObj["name"]."</div><div><a href=ad details.php>view details</a></div>
    </div>";
    */




//categories
$sql="SELECT * From category";
$resultDataset=$conn->query($sql);
echo"<div class=parent>";
echo"<div class="."cat"."><h3>Categories</h3> ";


while($row=$resultDataset->fetch_assoc())
{
  echo "<a href=listAllProducts.php?catId=".$row["id"].">".$row["name"]."<br><br>";

}
echo"<a href=listAllProducts.php>All Categories</a>
<br><br>
<h3>Filter By governorate</h3>";






//Filter By Governorate
$sql="SELECT * FROM governorate";
if(isset($_REQUEST["catId"]))
{
  echo"<form action=listAllProducts.php?catId=".$_REQUEST["catId"]." method=POST>";
}
else
{
  echo"<form action=listAllProducts.php? method=GET>";
}

echo "<select name=govId>";
$result=$conn->query($sql);
echo"<option>----choose a governorate----</option>";
if(isset($_REQUEST["govId"]))
{

  $govId=$_REQUEST["govId"];
    echo "enta bt3m3l update";
    $sql="SELECT * FROM addetails where govId=$govId";

    $detailsDS=$conn->query($sql);
    $detailsObj=$detailsDS->fetch_assoc();    
  

}

while($row=$result->fetch_assoc())
{

 if(isset($detailsObj))
 {
  if($row["id"]==$detailsObj["govId"])
  {
   echo"<option selected value=".$row["id"].">".$row["name"]."</option>";
 
  }
  else{
    echo"<option value=".$row["id"].">".$row["name"]."</option>";

  }

 }
 else
 {
  echo"<option value=".$row["id"].">".$row["name"]."</option>";

 }
  
  
}


echo"</select>
<br><br>
<input type=submit value=Filter>

</div>
</form>";




if(isset($_REQUEST["catId"])&&!isset($_REQUEST["govId"]))
{
 
  //if a category is chosen
  $catId=$_REQUEST["catId"];
  echo"<div class=photo>";
  
  $sql="SELECT * from addetails where catId=$catId";
  $resultDataset=$conn->query($sql);

while($row=$resultDataset->fetch_assoc())
{
 
 $sql="SELECT * FROM ad where id=".$row["adId"];
 $result=$conn->query($sql);
 $adObj=$result->fetch_assoc();
  echo "<div class=images><img src=".$row["photo"]." width=200
  height=200>
  <br>
  
  <div>".$adObj["name"]."</div><div><a href=ad details.php>view details</a></div>
  </div>";

}
echo"</div>";
echo"</div>";

}
elseif(isset($_REQUEST["govId"]) && isset($_REQUEST["catId"]))
{
 
 
  $catId=$_REQUEST["catId"];
  @$govId=$_REQUEST["govId"];
 
  $sql="SELECT * FROM addetails where catId=$catId AND govId=$govId";
  $result3=$conn->query($sql);
  //echo $result3->num_rows;
  while($row2=$result3->fetch_assoc())
  {

   $sql="SELECT * FROM ad where id=".$row2["adId"];
   $res=$conn->query($sql);
   $obj=$res->fetch_assoc();

    if($result3->num_rows!=0)
    {
      echo "<div class=images><img src=".@$row2["photo"]." width=200
    height=200>
    <br>

    
    
    
    <div>".@$obj["name"]."</div><div><a href=ad details.php>view details</a></div>
    </div>";
    }
    
  }
}
elseif (!isset($_REQUEST["catId"])&&!isset($_REQUEST["govId"]))
{
 
  echo"<div class=photo>";
  $sql="SELECT * from addetails";
  $resultDataset=$conn->query($sql);
  while($row=$resultDataset->fetch_assoc())
  {
  
    $sql="SELECT * FROM ad where id=".$row["adId"];
    $result=$conn->query($sql);
    $adObj=$result->fetch_assoc();
    echo "<div class=images><img src=".$row["photo"]." width=200
    height=200>
    <br>
    
    <div>".$adObj["name"]."</div><div><a href=ad details.php>view details</a></div>
    </div>";

  }
echo"</div>";
echo"</div>";
  
}
elseif (!isset($_REQUEST["catId"])&&isset($_REQUEST["govId"]))
{
  @$govId=$_REQUEST["govId"];
 
  $sql="SELECT * FROM addetails where  govId=$govId";
  $result3=$conn->query($sql);
  //echo $result3->num_rows;
  while($row2=$result3->fetch_assoc())
  {

   $sql="SELECT * FROM ad where id=".$row2["adId"];
   $res=$conn->query($sql);
   $obj=$res->fetch_assoc();

    if($result3->num_rows!=0)
    {
      echo "<div class=images><img src=".@$row2["photo"]." width=200
    height=200>
    <br>

    
    
    
    <div>".@$obj["name"]."</div><div><a href=ad details.php>view details</a></div>
    </div>";
    }
    
  }

}




?>











