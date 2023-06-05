<?php

$name=$_REQUEST["name"];
$catId=$_REQUEST["catId"];
$govId=$_REQUEST["govId"];
$price=$_REQUEST["price"];
$purchaseYear=$_REQUEST["purchaseYear"];
$description=$_REQUEST["description"];
$photo=$_REQUEST["photo"];
$adId=$_REQUEST["adId"];



$fileName = $_POST['photo'][0];   

echo$fileName."<br>";
echo$adId;
echo$description;
//header("locaion:updateAdDb.php?name=".@$name."&fileName=".@$fileName."&catId=".@$catId."&govId=".@$govId."&price=".@$price."&purchaseYear=".@$purchaseYear."&description=".@$description."&adId=".@$adId."&photo=".@$fileName.
if(isset($adId))
{
  // echo"<br>".$adId; 
   header("location:updateAdDb.php?name=$name&fileName=$fileName&catId=$catId&govId=$govId&price=$price&purchaseYear=$purchaseYear&description=$description&adId=$adId");
   
}
else{
    header("location:insertAdDb.php?name=$name&fileName=$fileName&catId=$catId&govId=$govId&price=$price&purchaseYear=$purchaseYear&description=$description&photo=$fileName");
}



?>