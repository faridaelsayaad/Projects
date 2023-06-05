<?php

include_once"header2.php";
?>
<font color=red>
<?php

if(isset($_REQUEST["msg"]))
{
    $msg=$_REQUEST["msg"];
    echo"<h3>".$msg."</h3>";
    
}

?>
</font>
<form action="updatePasswordDb.php" method="POST">
<br>Old Password<br><input type="password" name=oldPassword ><br><br>
<br>New Passwordd<br><input type="password" name=newPassword><br><br>
<input type=submit value="Change Password">
</form>