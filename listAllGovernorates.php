<?php


//Filter By Governorate
$sql="SELECT * FROM governorate";
if(isset($_REQUEST["catId"]))
{
  echo"<form action=final.php?catId=".$_REQUEST["catId"]." method=POST>";
}
else
{
  echo"<form action=final.php? method=POST>";
}

echo "<select name=govId>";
$result=$conn->query($sql);
echo"<option>----choose a governorate----</option>";

while($row=$result->fetch_assoc())
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
echo"</select>
<br><br>
<input type=submit value=Filter>

</div>
</form>";

?>
