


<?php
session_start();
include_once "db.php";

$email=$_REQUEST["email"];
$password=$_REQUEST["password"];

$sql="SELECT * FROM user Where email ='".$email."' and password='$password'";
$res=$conn->query($sql);
$msg="wrong email or password!";
if($row=$res->fetch_assoc())
{
   $_SESSION["firstName"]=$row["firstName"];
   $_SESSION["lastName"]=$row["lastName"];
   $_SESSION["id"]=$row["id"];
   $_SESSION["password"]=$row["password"];

    header("location:final.php");

}
else{
    
    echo "wrong email or password";
    header("location:login.php?msg=$msg");
}



?>