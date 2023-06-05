<?php
include_once "db.php";

$Email=$_REQUEST["query"];

$sql="SELECT * FROM user WHERE `email`='$Email' ";
$result=$conn->query($sql);
$obj=$result->fetch_assoc();
if(isset($obj))
{
    echo "<font color=red>Email is already taken!";
}



?>
</font>