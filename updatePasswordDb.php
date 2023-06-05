<?php

session_start();
include_once "db.php";
$currentPassword=$_SESSION["password"];

$oldPassword=$_REQUEST["oldPassword"];
$newPassword=$_REQUEST["newPassword"];
echo$currentPassword;
echo$oldPassword;

$id=$_SESSION["id"];
if($oldPassword==$currentPassword)
{
    $sql="UPDATE `user` SET `password`='$newPassword' WHERE id=$id";
    $conn->query($sql);
    $_SESSION["password"]=$newPassword;
   header("location:account.php");
 
}
else
{
    $msg="password is incorrect";
   header("location:updatePassword.php?msg=$msg");
}


?>