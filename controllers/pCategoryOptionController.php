<?php



include_once "../models/pCategoryOptionValue.php";
include_once "../views/productCategoryOptionView.php";
include_once "../views/categoryView.php";
include_once "../views/optionView.php";
include_once "../models/productCategoryOption.php";
include_once "../models/option.php";
include_once "../models/category.php";
include_once "../models/sessionDetails.php";

if(isset($_REQUEST["msg"]))
{
  $msg=$_REQUEST["msg"];
  if($msg=="showForm"||$msg="updateForm")
  {
    
    $catUId=$_REQUEST["catUId"];
  // $sessionDetailIdUId=$_REQUEST["sessionDetailsUId"];
  
    $sessionDetailUId=$_REQUEST["sessionDetailsUId"];
  // echo $sessionDetailUId;
    $catObj=new category();
    $catObj=$catObj->getByUid($catUId);
    //echo $catObj->getName();
    
    
    
    $sessionDetailsObj=new sessionDetails();
    $sessionDetailsObj=$sessionDetailsObj->getByUid($sessionDetailUId);
  //  echo $sessionDetailsObj->getName();
    $sessionDetailId=$sessionDetailsObj->getId();
    
      

      $catId=$catObj->getId();
      $pCatOptionObj=new productCategoryOption();
      $pCatOptionList=$pCatOptionObj->selectByPCatId($catId);
      $optionList=array();
      foreach($pCatOptionList as $obj)
      {
        $optionObj=$obj->getOptionObj();
      //  echo $optionObj->getAttribName();
        array_push($optionList,$optionObj);



      }
    
      if($msg=="showForm")
      {
        $optionView=new productCategoryOptionView();
        $optionView->showForm($optionList,$catUId,$sessionDetailUId);



      }
      if($msg=="updateForm")
      {
        
        $pCOVObj=new pcategoryoptionvalue();
        $pCOVList=$pCOVObj->selectBy("pId",$sessionDetailId);
        //$pCOVList=
        $optionView=new productCategoryOptionView();
        $optionView->showUpdateForm($optionList,$catUId,$sessionDetailUId,$pCOVList);

      }
        

  }
  


}
if(isset($_REQUEST["command"]))
  {
    
    if($_REQUEST["command"]=="showCategories")
    {
      //echo "hiiiiiiiiiiiiiii";
      $obj=new category();
      $listOfCategories=$obj->returnAllCategories();
      
      $categoryViewObj=new categoryView();
      echo"<br>";
      if($_REQUEST["extraCommand"]=="addToCat")
      {
        $categoryViewObj->listCatAddOption($listOfCategories);

      }
      if($_REQUEST["extraCommand"]=="delFromCat")
      {
        $categoryViewObj->listCatDelOption($listOfCategories);

      }
   


    }
    if($_REQUEST["command"]=="showOptions")
    {
      $counter=0;
      $uId=$_REQUEST["uId"];
  
      $catObj=new category();
      $catObj=$catObj->getByUid($uId);
      $id=$catObj->getId();
      $catUId=$_REQUEST["uId"];

      $pcategoryOptionObj=new productCategoryOption();
      $pCatOptionsList=$pcategoryOptionObj->selectByPCatId($id);
      
      $optionObj=new option();
      $optionsList=$optionObj->returnAllOptions();
      foreach($optionsList as $obj)
      {
        $f=0;
        foreach($pCatOptionsList as $pCObj)
        {
          $optionObj=$pCObj->getOptionObj();
          $optionId=$optionObj->getId();

          
          if($obj->getId()==$optionId)
          {
            $f=1;
          }


        }
        if($f==0)
        {
          $viewObj=new optionView();
          if($counter==0)
          {
            echo"
            <table>
            <tr id=header>
                <th>Option Name</th>
                <th>Action</th>
             </tr>";
            

          }
         $counter++;
       
        

     
          $viewObj->showEachOption($obj,$catUId);

          //echo "<br>".$obj->getAttribName()."<br>";
        }
        
      }
      echo"</table>";





    }
    if($_REQUEST["command"]=="showOptionsToDel")
    {
      $catUId=$_REQUEST["uId"];
      $catObj=new category();
      $catObj=$catObj->getByUid($catUId);
      $id=$catObj->getId();
      //echo $id;

      

      $pcategoryOptionObj=new productCategoryOption();
      $pCatOptionsList=$pcategoryOptionObj->selectByPCatId($id);
      $optionList=array();
      foreach($pCatOptionsList as $obj)
      {
        $optionObj=$obj->getOptionObj();
        array_push($optionList,$optionObj);
      }

      $viewObj=new optionView();
      $viewObj->showDelOptionFromCat($optionList,$catUId);






    }
    if($_REQUEST["command"]=="addToCategory")
    {
      $catUId=$_REQUEST["catUId"];
      $optionUId=$_REQUEST["optionUId"];

      $categoryObj=new category();

      $optionObj=new option();

      $categoryObj=$categoryObj->getByUid($catUId);
      $optionObj=$optionObj->getByUid($optionUId);

      $obj=new productCategoryOption();
      $obj->setCategoryObj($categoryObj);
      $obj->setOptionObj($optionObj);
      $obj->insert($obj);
     // header("location:pCategoryOptionController.php?command=showCategories&extraCommand=addToCat");
     header("location:adminController.php?command=showOptionPermissions");
   

    }
  
    if($_REQUEST["command"]=="delOptionFromCatDB")
    {
      $optionUId=$_REQUEST["uId"];
      $catUId=$_REQUEST["catUId"];
      $optionObj=new option();
      $optionObj=$optionObj->getByUid($optionUId);
      $catObj=new category();
      $catObj=$catObj->getByUid($catUId);
      $optionId=$optionObj->getId();
      $catId=$catObj->getId();
      $obj=new productCategoryOption();
      $obj->delete($catId,$optionId);
      //header("location:pCategoryOptionController.php?command=showCategories&extraCommand=delFromCat&uId=$catUId");
      header("location:adminController.php?command=showOptionPermissions");
      
    }

    if($_REQUEST["command"]=="addToCategory")
    {

    }
  }



?>