<?php
include_once "db.php";

$uId=$_REQUEST["uId"];
$sql="select * from sessionDetails where uId='$uId'";
$result=$conn->query($sql);
$obj=$result->fetch_assoc();
$sessionId=$obj["sessionId"];
$id=$obj["id"];


$sql="delete from sessionDetails where uId='$uId'";
$conn->query($sql);

$sql="select * from sessionDetails where sessionId='$sessionId'";

$result=$conn->query($sql);
echo $result->num_rows;
if($result->num_rows==0)
{
    echo "hiii";
  $sql2= "delete from session where id='$sessionId'";
   $conn->query($sql2);
}


header("location:controllers/sessionController.php");
?>