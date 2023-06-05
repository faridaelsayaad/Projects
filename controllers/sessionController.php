<?php
include_once "../models/session.php";
include_once "../views/sessionView.php";

session_start();
$id=$_SESSION["id"];

$sessionObj=new session();
$objects=$sessionObj->selectBy("userId",$id);

$objView=new sessionView();
$objView->showAll($objects);





?>