<?php
include_once "../views/adminView.php";



if($_REQUEST["command"]=="showAdminPermissions")
{
   // echo "hellooo";
    $viewObj=new adminView();
    $viewObj->showAdminPermissions();
}
if($_REQUEST["command"]=="showCatPermissions")
{
    $viewObj=new adminView();
    $viewObj->showCatPermissions();
}
if($_REQUEST["command"]=="showGovPermissions")
{
    $viewObj=new adminView();
    $viewObj->showGovPermissions();
    


}
if($_REQUEST["command"]=="showOptionPermissions")
{
    $viewObj=new adminView();
    $viewObj->showOptionPermissions();

}




?>