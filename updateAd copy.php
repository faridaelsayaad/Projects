<?php

include_once "db.php";
$sql="Select * from governorate";
$resultDataset=$conn->query($sql);

$sql="Select * from category";
$resultDataset2=$conn->query($sql);




$adId=$_REQUEST["uId"];
$sql="select * from sessiondetails where uId='$adId'";
$res=$conn->query($sql);
$d=$res->fetch_assoc();




?>


<form action=uppload.php method="POST">
Ad Name<br> <input type=text name=name value="<?php echo$d["name"]?>"><br><br>
governorate<br>
 <select name=govId>
    <?php
    while($row=$resultDataset->fetch_assoc())
    {
        if($row["id"]==$d["govId"])
        {
            echo"<option selected value=".$row["id"]." >".$row["name"]."</option>";

        }
        else{
            echo"<option value=".$row["id"]." >".$row["name"]."</option>";


        }
      
    }
    
    ?>

 </select>
 <br>
 Category<br>
 <select name=catId>
    <?php
    
    while($row=$resultDataset2->fetch_assoc())
    {
        if($row["id"]==$d["catId"])
        {
            echo"<option selected value=".$row["id"]." >".$row["name"]."</option>";

        }
        else{
            echo"<option value=".$row["id"]." >".$row["name"]."</option>";


        }
      
    }
    
    ?>

 </select>

 <br>Price<br> <input type=number name=price value="<?php echo$d["price"]?>"><br><br>

 purchase year<br> <input type=number name=purchaseYear value="<?php echo$d["purchaseYear"]?>"><br><br>
 <br><br>Description<br>
<textarea name="description"  rows="4" cols="50" > <?php echo$d["description"]?></textarea>

<br><br>Upload Image File Path
<input type="file"  name="photo[]"/>

<input type="hidden" name="adId" value="<?php echo$d["id"]?>">

<input type=submit value="save changes">
</form>




