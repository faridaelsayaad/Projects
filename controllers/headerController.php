<?php

session_start();


if(isset($_SESSION["id"]))
{
    if($_SESSION["userTypeId"]==1)
    {
        include_once "../views/header2.php";

    }
    else{
        include_once "../views/header3.php";

    }
    //include_once "../views/header2.php";
    //$obj->showHeader1();

}
elseif((!isset($_SESSION["id"])))
{
    
    include_once "../views/header.php";
   // $obj->showHeader2();


}

?>