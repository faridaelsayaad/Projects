<?php


include_once "db.php";
include_once "header.php";
?>

<div>
<h1>New Member</h1>
</div>
<form action=insertUser.php method="POST">

First Name<br><input type="text" name=firstName><br>
<br>last Name<br><input type="text" name=lastName><br>
<br>Phone Number<br><input type="text" name=phoneNum><br>
<br>Email Address<br><input type="email"  onkeyup="searchEmail(this.value)"  name=email><br>
<div id="myEmail"></div>
<br>Password<br><input type="password"  onkeyup="searchPassword(this.value)" name=password><br><br>
<div id="myresult"></div>
<input type=submit>

</form>
<script>
function searchPassword(str)
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
 xmlhttp.open("GET","searchPassAjax.php?query="+str,true);
 xmlhttp.send();

}

function searchEmail(str)
{
    //alert(str);
// document.getElementById("myresult").innerHTML=str;
 var xmlhttp = new XMLHttpRequest();
 xmlhttp.onreadystatechange=function()
 {
    
    if(this.readyState==4 && this.status==200)
    {
        document.getElementById("myEmail").innerHTML=this.responseText;

    }

 };
 xmlhttp.open("GET","searchEmailAjax.php?query="+str,true);
 xmlhttp.send();

}
</script>
<?php