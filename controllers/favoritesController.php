<?php
include_once "../models/favorites.php";
include_once "../models/sessionDetails.php";
include_once "../views/sessionDetailsView.php";
include_once "../models/user.php";


if(isset($_REQUEST["msg"]))
{
  //  echo $msg;
  if(!isset($_SESSION["id"]))
  {
    session_start();

  }
   
   $id=$_SESSION["id"];
  // echo"helloooo". $id;
    $msg=$_REQUEST["msg"];


    if($msg=="showFav")
    {
       
        $favObj=new favorites();
        $list=$favObj->getUserFavorites($id);
        $sDetailsList=array();
        foreach($list as $favObj)
        {
            $sdObj=$favObj->getSessionDetailsObj();
            $id=$sdObj->getId();

            $obj=new sessionDetails($id);
            array_push($sDetailsList,$obj);

        }
        $viewObj=new sessionDetailsView();
        $viewObj->showAllFvorites($sDetailsList);
     
        
    }
    if($msg=="addToFav")
    {
       
        $sessionDetailsId=$_REQUEST["sessionDetailsId"];
        $userId=$_SESSION["id"];

        $userObj=new user($userId);
        $sessionDetailsObj=new sessionDetails($sessionDetailsId);

        $objFav=new favorites();
        $objFav->setUserObj($userObj);
        $objFav->setSessionDetailsObj($sessionDetailsObj);
        $objFav->insert($objFav);
        header("location:favoritesController.php?msg=showFav");
      //  $re
      //  $catObj=new category($catId);
        //$obj->setCatObj($catObj);
        

    }
    if($msg=="removeFav")
    {
        $uId=$_REQUEST["uId"];
        $sDetailsObj=new sessionDetails();
        $sessionDetailsObj=$sDetailsObj->getByUid($uId);
        $id=$sessionDetailsObj->getId();
        $favObj=new favorites();
        $favObj->remove($id);
        header("location:favoritesController.php");


    }
}

?>