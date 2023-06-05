<?php
include_once "../views/optionView.php";
include_once "../models/option.php";

if($_REQUEST["command"]=="showInsertForm")
{
    $viewObj=new optionView();
    $viewObj->showInsertForm();

}   
if($_REQUEST["command"]=="insertDB")
{        
    $name=$_REQUEST["name"];
    $type=$_REQUEST["type"];
    $optionObj=new option();
    $optionObj->setAttribName($name);
    $optionObj->setType($type);
    $optionObj->insert($optionObj);
    header("location:optionController.php?command=showOptionsToUpdate");


    //$category->insert($name);
}
if($_REQUEST["command"]=="showOptionsToUpdate")
{
    $obj=new option();
    $listOfOptions=$obj->returnAllOptions();
    $viewObj=new optionView();
    $viewObj->listOptionsToUpdate($listOfOptions);

}
if($_REQUEST["command"]=="showUpdateForm")
{
    $uId=$_REQUEST["uId"];

    $optionObj=new option();
    $optionObj=$optionObj->getByUid($uId);
    $viewObj=new optionView();
    $viewObj->showUpdateForm($optionObj);
}

if($_REQUEST["command"]=="updateDB")
{
    $uId=$_REQUEST["uId"];
    $name=$_REQUEST["name"];
    $type=$_REQUEST["type"];
    $optionObj=new option();
    $optionObj->setAttribName($name);
    $optionObj->setUId($uId);
    $optionObj->setType($type);
    $optionObj->update($optionObj);
    header("location:optionController.php?command=showOptionsToUpdate");

}
if($_REQUEST["command"]=="showOptionsToDelete")
{
    $obj=new option();
    $listOfOptions=$obj->returnAllOptions();
    $viewObj=new optionView();
    $viewObj->listOptionsToDelete($listOfOptions);

}
if($_REQUEST["command"]=="delete")
{
    $uId=$_REQUEST["uId"];
    $optionObj=new option();
    $optionObj->delete($uId);
    header("location:optionController.php?command=showOptionsToDelete");

}



?>