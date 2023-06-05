<?php
include_once "db.php";
include_once "header2.php";

session_start();
$id=$_SESSION["id"];

$sql="select * from user where id=$id";
$res=$conn->query($sql);
$u=$res->fetch_assoc();




?>
<br><br><br><br><br>
<form action=updateUserDb.php method="POST">

First Name<br><input type="text" name=firstName value="<?php echo $u["firstName"] ?>"><br>
<br>last Name<br><input type="text" name=lastName value="<?php echo $u["lastName"] ?>"><br>
<br>Phone Number<br><input type="text" name=phoneNum value="<?php echo $u["phoneNum"] ?>"><br>
<br>Email Address<br><input type="email" name=email value="<?php echo $u["email"] ?>"><br>

<input type=submit value="save changes">

</form>
