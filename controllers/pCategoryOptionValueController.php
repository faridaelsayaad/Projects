<?php

include_once "../models/pCategoryOptionValue.php";
include_once "../views/optionView.php";
include_once "../models/productCategoryOption.php";
include_once "../models/option.php";
include_once "../models/category.php";
include_once "../models/sessionDetails.php";


if(isset($_REQUEST["msg"]))
{
    $msg=$_REQUEST["msg"];
    if($msg=="insert")
    {
        $catUId=$_REQUEST["catUId"];
        $sessionDetailUId=$_REQUEST["sessionDetailUId"];

        $catObj=new category();
        $catObj=$catObj->getByUid($catUId);
      //  echo $catObj->getName();
        $catId=$catObj->getId();
        
        
        $sessionDetailsObj=new sessionDetails();
        $sessionDetailsObj=$sessionDetailsObj->getByUid($sessionDetailUId);
       // echo $sessionDetailsObj->getName();
        $sessionDetailId=$sessionDetailsObj->getId();

        
        $pCatOptionObj=new productCategoryOption();
        $pCatOptionList=$pCatOptionObj->selectByPCatId($catId);
      //  $optionList=array();
      $i=0;
        foreach($pCatOptionList as $obj)
        {
            $value=$_REQUEST["name".$i];
            
 
            $pCatOptionValueObj=new pcategoryoptionvalue();
         
            $pCatOptionValueObj->setPCatOptionObj($obj);
            $pCatOptionValueObj->setSessionDetailsObj($sessionDetailsObj);
            $pCatOptionValueObj->setValue($value);
            $i++;
            $pCatOptionValueObj->insert($pCatOptionValueObj);
            header("location:sessionController.php");
            /*
            $optionObj=$obj->getOptionObj();
            echo $optionObj->getAttribName();
            array_push($optionList,$optionObj);*/



        }
       

        

    }
    if($msg=="update")
    {
        $sessionDetailUId=$_REQUEST["sessionDetailUId"];

     
        
        $sessionDetailsObj=new sessionDetails();
        $sessionDetailsObj=$sessionDetailsObj->getByUid($sessionDetailUId);
       // echo $sessionDetailsObj->getName();
        $sessionDetailId=$sessionDetailsObj->getId();

        echo "hiiiiiiii";
        $pCOVObj=new pcategoryoptionvalue();
        $pCOVList=$pCOVObj->selectBy("pId",$sessionDetailId);
        $i=0;
        foreach($pCOVList as $obj)
        {
            $value=$_REQUEST["name".$i];
            echo $value;
            $id=$obj->getId();
            $pObj=new pcategoryoptionvalue();
            $pObj->update($id,$value);
            $i++;

        }
       header("location:sessionController.php");

    }
    if($msg=="showProperties")
    {
        $pId=$_REQUEST["pId"];
        $catId=$_REQUEST["catId"];
       
        $pCatOptionObj=new productCategoryOption();
        $pCatOptionList=$pCatOptionObj->selectByPCatId($catId);
        foreach($pCatOptionList as $obj)
        {
            $id=$obj->getId();
            $optionObject=$obj->getOptionObj();
            $optionId=$optionObject->getId();
            $optionObj=new option($optionId);

            $pCatOptionValueObj=new pcategoryoptionvalue();
            $pCOVObj=$pCatOptionValueObj->getOptionValue($id,$pId);
          //  echo "<br><br>heeeeeeee";

            //echo $optionObj->getAttribName();
           // echo $pCOVObj->getValue();
            $viewObj=new pCatOptionValueView();
            $viewObj->showProperties( $optionObj,$pCOVObj);
          //  echo $valueObj->ge
            
            




        }
     
       // $sql="select * from productCategoryOption where productCategoryId=".$catId;
       /*
        $result=$conn->query($sql);

        echo"</div><div class=userInfo><h3> Properties:</h3>";
        while($row1=$result->fetch_assoc())
        {
                  
            $sql="select * from option where id=".$row1["optionId"];
            $result2=$conn->query($sql);
            $optionObj=$result2->fetch_assoc();
            echo "<b>".$optionObj["attribName"].":</b> ";

            $sql="select * from pcategoryoptionvalue where pCOID=".$row1["id"]." and pId=$pId";
           // echo $sql;
            $result3=$conn->query($sql);
            $valueObj=$result3->fetch_assoc();
            echo $valueObj["value"]."<br><br>";



        }
        echo "</div>";
        */

    }

    

}

?>