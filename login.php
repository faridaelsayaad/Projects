<?php

include_once"header.php";
?>
<font color=red>
<?php
if(isset($_REQUEST["msg"]))
{
    $msg=$_REQUEST["msg"];
    echo"<br><br><br><h3>".$msg."</h3>";
    
}

?>
</font>
<br><br><br>
<div>
<h1>Log in</h1>
</div>
<form action=doLogin.php method=POST>
E-mail<br><input type=email name="email"><br><br>
Password<br><input type=Password name="password"><br><br>

<input type=submit>
<?php 
echo "<br> new user? <a href=register.php>Register now!</a>";

?>
</form>
