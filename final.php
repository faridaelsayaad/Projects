<html>
<head>
    <link rel="stylesheet" href="styles.css">


</head>
</html>



<?php
session_start();
include_once "db.php";


if(isset($_SESSION["id"]))
{
    include_once "header2.php";

}
elseif((!isset($_SESSION["id"])))
{
    include_once "header.php";

}

include_once "listAllCategories.php";
include_once "listAllGovernorates.php";
include_once "listProducts.php";

?>