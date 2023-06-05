
<?php
include_once "db.php";
include_once "header2.php";

//selecting category
$sqlst="SELECT * from category";
$resultCat=$conn->query($sqlst);

//selecting govenorate
$sqlst="SELECT * from governorate";
$resultGov=$conn->query($sqlst);



echo"<h1>New Ad</h1>";




echo" <form action=uppload.php method=POST>
Ad Name<br> <input type=text name=name><br><br>
Category<br>";

echo"<select name=catId>";

while($row=$resultCat->fetch_assoc())
{
  
    
  
        echo"<option value=".$row["id"].">".$row["name"]."</option>";


   
}

echo "</select>";
echo "<br><br>Governorate<br><select name=govId> ";


while($row=$resultGov->fetch_assoc())
{

 
  echo"<option value=".$row["id"].">".$row["name"]."</option>";

 

}

?>
</select>

<br><br>Price<br> <input type="number" name="price"/>
<br><br>Purchase Year<br>

<input type="number" name="purchaseYear" min="1900" max="2099" step="1" />
   
<br><br>Description<br>
<textarea name="description"  rows="1" cols="50" > </textarea>


<br><br>Upload Image File Path
<input type="file"  name="photo[]"/>
<?php


?>



<input type="submit" value="Post Ad"/>


</form>




