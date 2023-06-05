<?php
include_once "../models/sessionDetails.php";
include_once "../views/sessionDetailsView.php";
include_once "../models/category.php";
include_once "../models/governorate.php";
include_once "../models/category.php";
include_once "../models/session.php";
include_once "../models/user.php";
include_once "../models/favorites.php";
include_once "headerController.php";
$obj=new sessionDetails();

if(isset($_REQUEST["msg"]))
{
   
   
    $msg=$_REQUEST["msg"];

    if($msg=="postAd")
    {
        session_start();
     
        $name=$_REQUEST["name"];
        $catId=$_REQUEST["catId"];
        $govId=$_REQUEST["govId"];
        $price=$_REQUEST["price"];
        $purchaseYear=$_REQUEST["purchaseYear"];
        $description=$_REQUEST["description"];
        $photo=$_REQUEST["photo"];

        $fileName = $_POST['photo'][0];  
        $userId=$_SESSION["id"];
        $var="images/ads/".$fileName;
        $date=date('y-m-d'); 
        $time=date("h:i:sa");

        $obj=new sessionDetails();
        $governorateObj=new governorate($govId);

   
         echo $governorateObj->getName();
         $obj->setGovObj($governorateObj) ;
 
        $obj->setName($name);
        $catObj=new category($catId);
        $catUId=$catObj->getuID();
        $obj->setCatObj($catObj);
     
        
        
       
        $obj->setPrice($price);
        echo $obj->getPrice();
        $obj->setPurchaseYear($purchaseYear);
        $obj->setDescription($description);
        $obj->setPhoto($var);
        $obj->setTime($time);
        $sessionObj=new session();
        $sObj=$sessionObj->selectByBoth2("date",$date,"userId",$userId);
        
      
        if($sObj!=Null)
        {
          //  echo "heloooooooooooocdc";
            //echo "hello".$_SESSION["id"];
            $obj->setSessionObj($sObj);

        }
        else{
            
            $date=date('y-m-d'); 
            $userId=$_SESSION["id"];

            

            $userObj=new user($userId);
            
            $sessionObj->setUserObj($userObj);
            $sessionObj->setDate($date);
           // $sessionObj->setUId()
            $sessionId=$sessionObj->insert($sessionObj);
          //  $sessionId=$conn->insert_id;
            $sessionObj->setId($sessionId);
            $obj->setSessionObj($sessionObj);


        }
        
        
        
        $sessionDetailsUid=$obj->insertAd($obj);


        
     
      // echo "hi".$sessionDetailsUid;
      header("location:pCategoryOptionController.php?catUId=$catUId&sessionDetailsUId=$sessionDetailsUid&msg=showForm");
     


    }
    if($msg=="insertForm")
    {
        echo"inside";
        $obj=new governorate();
        $listGov=$obj->selectAll();
        $objCat=new category();
        $listCat=$objCat->returnAllCategories();

        $viewObj=new sessionDetailsView();
        $viewObj->showInsertForm($listGov,$listCat);



    }
    if($msg=="updateForm")
    {
        $uId=$_REQUEST["uId"];
        $sessionDetailObj=new sessionDetails();
        $sessionDetailObj=$sessionDetailObj->getByUid($uId);
        $sessionDetailId=$sessionDetailObj->getId();


        $govObj=$sessionDetailObj->getGovObj();
        $catObj=$sessionDetailObj->getCatObj();

        $govId=$govObj->getId();
        $catId=$catObj->getId();

        $obj=new governorate();
        $listGov=$obj->selectAll();
        $objCat=new category();
        $listCat=$objCat->returnAllCategories();

        $viewObj=new sessionDetailsView();
        $viewObj->showUpdateForm($sessionDetailObj,$listGov,$listCat,$govId,$catId);
        

    }
    if($msg=="updateAd")
    {
       // session_start();
       $sessionDetailObj=new sessionDetails();

       $sessionDetailUId=$_REQUEST["sessionDetailUId"];
       $sessionDetailObj=$sessionDetailObj->getByUid($sessionDetailUId);
       $sessionDetailId=$sessionDetailObj->getId();



        $name=$_REQUEST["name"];
        $catId=$_REQUEST["catId"];
        $govId=$_REQUEST["govId"];
        $price=$_REQUEST["price"];
        $purchaseYear=$_REQUEST["purchaseYear"];
        $description=$_REQUEST["description"];
        $photo=$_REQUEST["photo"];

        $fileName = $_POST['photo'][0];  
        $userId=$_SESSION["id"];
        $var="images/ads/".$fileName;
        $date=date('y-m-d'); 
        $time=date("h:i:sa");

        $obj=new sessionDetails();
        $governorateObj=new governorate($govId);

       
         echo $governorateObj->getName();
         $obj->setGovObj($governorateObj) ;
 
        $obj->setName($name);
        $catObj=new category($catId);
        $catUId=$catObj->getuID();
        $obj->setCatObj($catObj);
        $obj->setUId($sessionDetailUId);
        
        
       
        $obj->setPrice($price);
        echo $obj->getPrice();
        $obj->setPurchaseYear($purchaseYear);
        $obj->setDescription($description);
        $obj->setPhoto($var);
        $obj->setTime($time);
        $obj->setId($sessionDetailId);

        $obj->update($obj);

    }
   
}
else
{
   
    
    if(isset($_REQUEST["sessionUId"]))
    {
      
        $uId=$_REQUEST["sessionUId"];
        $obj=new session();
        $obj2=$obj->getByUid($uId);
     

        $sessionId=$obj2->getId();
        $dObj=new sessionDetails();
    
        $dObj2=$dObj->selectBy("sessionId",$sessionId);
        
        $viewObj=new sessionDetailsView();
        $viewObj->showAllSessionDetailsUserLogedIn($dObj2);
        
    
    
    
    
    }
    else
    {
 
    if(isset($_REQUEST["uId"])&&!isset($_REQUEST["govId"]))
    {
        $uId=$_REQUEST["uId"];
        $catObj=new category();
        $object=$catObj->getByUid($uId);
        $catId=$object->getId();
       

       
       $listOfObjects= $obj->selectBy("catId",$catId);
    
    
    }
    else if(!isset($_REQUEST["uId"])&&!isset($_REQUEST["govId"]))
    {
      
        $listOfObjects= $obj->selectAll();
    
    
    }
    else if(!isset($_REQUEST["uId"])&&isset($_REQUEST["govId"]))
    {
        
        $govId=$_REQUEST["govId"];
        $listOfObjects= $obj->selectBy("govId",$govId);
    
    
    }
    else if(isset($_REQUEST["uId"])&&isset($_REQUEST["govId"]))
    {
      
        
        $uId=$_REQUEST["uId"];
        $catObj=new category();
        $object=$catObj->getByUid($uId);
        $catId=$object->getId();
       
        $govId=$_REQUEST["govId"];
        $listOfObjects= $obj->selectByBoth("catId",$catId,"govId",$govId);
        
    
    
    
    }
    if(isset($_REQUEST["sessionDetailUid"]))
    {
  
        $flag=0;
        $uId=$_REQUEST["sessionDetailUid"];
        $object=new sessionDetails();
        $object2=$object->getByUid($uId);
        $sessionDetailId=$object2->getId();
       // echo var_dump($obj2);
     
      $viewObj=new sessionDetailsView();
      if(!isset($_SESSION["id"]))
      {
       
        $sessionObj=$object2->getSessionObj();
        $govObj=$object2->getGovObj();
        $userObj=$sessionObj->getUserObj();
        $viewObj->showEachDetail($object2,$userObj,$govObj);
        

      }
      if(isset($_SESSION["id"]))
      {

        $id=$_SESSION["id"];
       
       

        $sessionObj=new session();
        $sessionObjList=$sessionObj->selectBy("userId",$id);
        foreach($sessionObjList as $obj)
        {
           // echo $obj->getDate();
            $sessionId=$obj->getId();
          //  echo $sessionId;
            $sessionDetailsObj=new sessionDetails();
            $listSessionDetails=$sessionDetailsObj->selectBy("sessionId",$sessionId);
            foreach($listSessionDetails as $obj2)
            {
                if($sessionDetailId==$obj2->getId())
                {
                    $govObj=$object2->getGovObj();
                    $userObj=new user($id);

                    $viewObj->showEachDetailUserAdd($object2,$userObj,$govObj);
                    $flag=1;

                }
            }
        }
        

        $favObj=new favorites();
    
        $listOfObj=$favObj->getUserFavorites($id);

        foreach($listOfObj as $obj)
        {
            //echo $obj->getId();
            $uObj=$obj->getUserObj();
            $userIdFav=$uObj->getId();
            //echo $userIdFav;
            
            $sdObj=$obj->getSessionDetailsObj();
            $sdId=$sdObj->getId();
          
           if($sdId==$object2->getId())
            {
                $govObj=$sdObj->getGovObj();
                $sessionObj=$sdObj->getSessionObj();
            
               $userObj=$sessionObj->getUserObj();
                $viewObj->showEachDetailAddedToFav($sdObj,$userObj,$govObj);
                $flag=1;               
            }
        

        }
        if($flag==0)
        {
           // $userObj=$object2->get
            $govObj=$object2->getGovObj();
            $sessionObj=$object2->getSessionObj();
            
            $userObj=$sessionObj->getUserObj();
            $viewObj->showEachDetailNotAddedToFav($object2,$userObj,$govObj);

        }

      }
     
    //
    
    
    
    }
   /*
    if(isset($_REQUEST["sessionId"]))
    {
        $sessionId=$_REQUEST["sessionId"];
        //$obj=new sessionDetails();
        echo $sessionId;
        $obj2=$obj->selectBy("sessionId",$sessionId);
      
        $viewObj=new sessionDetailsView();
        $viewObj->showAllSessionDetails($obj2);
        
    
    
    
    
    }
    */

  
    if(!isset($_REQUEST["sessionDetailUid"]))
    {
        $viewObj=new sessionDetailsView();
        $viewObj->showAllSessionDetails($listOfObjects);
    
    }
   
    
    
    }
    
    
}


















?>