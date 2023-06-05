
<?php
include_once "db.php";
session_start();
$uId=$_REQUEST["uId"];
$fileName=$_REQUEST["fileName"];
echo $fileName;

$name=$_REQUEST["name"];
$catId=$_REQUEST["catId"];
$govId=$_REQUEST["govId"];
$price=$_REQUEST["price"];
$purchaseYear=$_REQUEST["purchaseYear"];
$description=$_REQUEST["description"];

$adId=$_REQUEST["adId"];
$userId=$_SESSION["id"];
$var="images/ads/".$fileName;




echo$adId;
echo$name;

   echo"ypu'reUpdating";
   /*
    //$adId=$_REQUEST["adId"];
    $sql="UPDATE ad set name='$name' WHERE id=$adId";
    echo$sql;
    
    $conn->query($sql);
    */
echo"hello";



    //adId=$conn->insert_id;
  echo $fileName;
    $sql="UPDATE sessiondetails SET name='$name',catId=$catId,govId=$govId,price=$price,purchaseYear='$purchaseYear',description='$description',photo='$var' WHERE id=$adId";

    $conn->query($sql);
    //header("location:controllers/pCategoryOptionValue?msg=update.php?uId=$uId");
    header("location:controllers/sessionController.php");

?>