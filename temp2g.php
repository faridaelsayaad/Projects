
<?php
include_once "db.php";

//selecting category
$sqlst="SELECT * from category";
$resultCat=$conn->query($sqlst);

//selecting govenorate
$sqlst="SELECT * from governorate";
$resultGov=$conn->query($sqlst);



echo"<h1>New Ad</h1>";
if(isset($_REQUEST["adId"]))
{
   
  echo "enta bt3mel update";
    //selecting ad
    $adId=$_REQUEST["adId"];
    $sql="SELECT * FROM ad where id=$adId";
    $res=$conn->query($sql);
    $adObj=$res->fetch_assoc();


    //selecting ad details
    $sql="SELECT * FROM addetails where adId=$adId";
    $res=$conn->query($sql);
    $adDetailsObj=$res->fetch_assoc();


    //selecting from category
    $var=$adDetailsObj["catId"];
    $sql="SELECT * FROM category where id =$var";
    $res=$conn->query($sql);
    //$catObj->fetch_assoc();



    
     


}
else
{
    //echo"you're posting a new AD";
}





echo" <form action=uppload.php method=POST>
Ad Name<br> <input type=text name=name value=".@$adObj["name"]."><br><br>
Category<br>";
echo$adId;
echo"<select name=catId>";

while($row=$resultCat->fetch_assoc())
{
  
    if(isset($_REQUEST["adId"]))
    {

        if($row["id"]==$adDetailsObj["catId"])
        {
           
            echo"<option selected value=".$row["id"].">".$row["name"]."</option>";


        }
        else{
            echo"<option selected value=".$row["id"].">".$row["name"]."</option>";
        }


   


    }
    else{
        echo"<option value=".$row["id"].">".$row["name"]."</option>";


    }
    
}

echo "</select>";
echo "<br><br>Governorate<br><select name=govId> ";


while($row=$resultGov->fetch_assoc())
{

 if(isset($_REQUEST["govId"]))
 {
  if($row["id"]==$_REQUEST["govId"])
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

?>
</select>
<?php echo @$adDetailsObj["price"]?>
<br><br>Price<br> <input type="number" name="price" value="<?php echo @$adDetailsObj["price"]?>">
<br><br>Purchase Year<br>

<input type="number" name="purchaseYear" value="<?php echo @$adDetailsObj["purchaseYear"]?>" min="1900" max="2099" step="1" />
   
<br><br>Description<br>
<textarea name="description"  rows="4" cols="50" > <?php echo@$adDetailsObj["description"]?></textarea>


<br><br>Upload Image File Path
<input type="file"  name="photo[]"/>
<?php

$adId=$adDetailsObj["adId"];
?>



<input type="submit"/>


</form>
<?php


?>



