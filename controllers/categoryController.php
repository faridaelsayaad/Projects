<?php
include_once "../models/category.php";
include_once "../views/categoryView.php";
//session_start();

if(!isset($_REQUEST["command"]))
{
    $obj=new category();
$listOfCategories=$obj->returnAllCategories();

$categoryViewObj=new categoryView();
$categoryViewObj->listAllCategories($listOfCategories);

}
else
{
    if($_REQUEST["command"]=="showInsertForm")
    {
        $viewObj=new categoryView();
        $viewObj->showInsertForm();

    }   
    if($_REQUEST["command"]=="insertDB")
    {        
        $name=$_REQUEST["name"];
        $catObj=new category();
        $catObj->setName($name);
        $catObj->insert($catObj);
        header("location:categoryController.php?command=showCatToUpdate");


        //$category->insert($name);
    }
    if($_REQUEST["command"]=="showCatToUpdate")
    {
        $obj=new category();
        $listOfCategories=$obj->returnAllCategories();
        $viewObj=new categoryView();
        $viewObj->listCategoriesToUpdate($listOfCategories);

    }
    if($_REQUEST["command"]=="showCatToDelete")
    {
        $obj=new category();
        $listOfCategories=$obj->returnAllCategories();
        $viewObj=new categoryView();
        $viewObj->listCategoriesToDelete($listOfCategories);

    }
    if($_REQUEST["command"]=="showUpdateForm")
    {
        $uId=$_REQUEST["uId"];

        $categoryObj=new category();
        $categoryObj=$categoryObj->getByUid($uId);
        $viewObj=new categoryView();
        $viewObj->showUpdateForm($categoryObj);
    }
    if($_REQUEST["command"]=="updateDB")
    {
        $uId=$_REQUEST["uId"];
        $name=$_REQUEST["name"];
        $catObj=new category();
        $catObj->setName($name);
        $catObj->setUId($uId);
        $catObj->update($catObj);
        
       header("location:categoryController.php?command=showCatToUpdate");

    }
    if($_REQUEST["command"]=="delete")
    {
        $uId=$_REQUEST["uId"];
        $categoryObj=new category();
        $categoryObj->delete($uId);
        header("location:categoryController.php?command=showCatToDelete");

    }

    
}





?>