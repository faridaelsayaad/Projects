<?php
include_once "../models/governorate.php";
include_once "../views/governorateView.php";
include_once "../models/category.php";
$obj=new governorate();
$listOfObjects=$obj->selectAll();
$objView=new governorateView();
if(!isset($_REQUEST["command"]))
{
    if(isset($_REQUEST["uId"]))
    {
        $uId=$_REQUEST["uId"];
        $obj=new category();
      // $object=$obj->getByUid($uId);
     // $catId=$obj->getId();
        $objView->showFormCatIdSet($uId);
        


    
    }
    else
    {
    
        $objView->showFormCatIdNotSet();
    }



    if(isset($_REQUEST["govId"]))
    {
        $govId=$_REQUEST["govId"];
        $objView->showAll($govId,$listOfObjects);
    // $objView->showOptionGovIdSet($govId,$listOfObjects);

    }
    else
    {
        $objView->showAll("",$listOfObjects);
    

    }

}
if(isset($_REQUEST["command"]))
{
    
    if($_REQUEST["command"]=="showInsertForm")
    {
        $viewObj=new governorateView();
        $viewObj->showInsertForm();

    }   
    if($_REQUEST["command"]=="insertDB")
    {        
        $name=$_REQUEST["name"];
        $govObj=new governorate();
        $govObj->setName($name);
        $govObj->insert($govObj);
        header("location:governorateController.php?command=showGovToUpdate");


        //$category->insert($name);
    }
    if($_REQUEST["command"]=="showGovToUpdate")
    {
        $obj=new governorate();
        $listOfGov=$obj->selectAll();
        $viewObj=new governorateView();
        $viewObj->listGovernoratesToUpdate($listOfGov);

    }
    if($_REQUEST["command"]=="showUpdateForm")
    {
        $uId=$_REQUEST["uId"];

        $govObj=new governorate();
        $govObj=$govObj->getByUid($uId);
        $viewObj=new governorateView();
        $viewObj->showUpdateForm($govObj);
    }
    if($_REQUEST["command"]=="updateDB")
    {
        $uId=$_REQUEST["uId"];
        $name=$_REQUEST["name"];
        $govObj=new governorate();
        $govObj->setName($name);
        $govObj->setUId($uId);
        $govObj->update($govObj);
        header("location:governorateController.php?command=showGovToUpdate");

    }
    if($_REQUEST["command"]=="showGovToDelete")
    {
        $obj=new governorate();
        $listOfGov=$obj->selectAll();
        $viewObj=new governorateView();
        $viewObj->listGovernoratesToDelete($listOfGov);
       

    }
    if($_REQUEST["command"]=="delete")
    {
        $uId=$_REQUEST["uId"];
        $govObj=new governorate();
        $govObj->delete($uId);
        header("location:governorateController.php?command=showGovToDelete");

    }


}




  

?>