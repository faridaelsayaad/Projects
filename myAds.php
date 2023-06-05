<html>
<head>
 
</head>
</html>

<?php
include_once "db.php";
include_once "header2.php";
session_start();
$userId=$_SESSION["id"];
$sql="SELECT * FROM session where userId=$userId";
$res=$conn->query($sql);
while($row=$res->fetch_assoc())
{
    echo"<br><br><br><br><br><a href=myAdDetails.php?sessionId=".$row["id"].">".$row["date"]."</a><br>";
}


?>