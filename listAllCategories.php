<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <style>
      .search{
        margin-top: 10%;
        margin-left: 40%;
        

      }
      .parent
      {
        margin-top: 0px;
 
     
      }
      </style>
</head>
</html>


<form method="POST" class="search">
   <input type=text name="FirstName" onkeyup="searchuser(this.value)" placeholder="search name"><br>
    <div id="myresult"></div>
   
</form>
<script>
function searchuser(str)
{
    //alert(str);
// document.getElementById("myresult").innerHTML=str;
 var xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
    
    if(this.readyState==4 && this.status==200)
    {
        document.getElementById("myresult").innerHTML=this.responseText;

    }

 };
 xmlhttp.open("GET","searchAdAjax.php?query="+str,true);
 xmlhttp.send();

}
</script>
<?php
//categories

$sql="SELECT * From category";
$resultDataset=$conn->query($sql);
echo"<div class=parent>";
echo"<div class="."cat"."><h3>Categories</h3> ";


while($row=$resultDataset->fetch_assoc())
{
  echo "<a href=final.php?catId=".$row["id"].">".$row["name"]."<br><br>";

}
echo"<a href=final.php>All Categories</a>
<br><br>
<h3>Filter By governorate</h3>";
?>