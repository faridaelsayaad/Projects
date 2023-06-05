<?php
include_once "helper.php";
include_once "sessionDetails.php";
include_once "user.php";
include_once "headerController.php";
class favorites
{
    private $id;
    private $sessionDetailsObj;
    private $userObj;

    
    function __construct($id="")
    {
        $conn=db::getConnection();
        if($id!="")
        {
          
            $sql="SELECT * FROM favorites WHERE id =$id";
            $result=$conn->query($sql);
            $favoritesObj=$result->fetch_assoc();
            $this->id=$id;
            $this->sessionDetailsObj=new sessionDetails($favoritesObj["adId"]);
            $this->userObj=new user($favoritesObj["userId"]);
            
        }
       

    }
    function getUserFavorites($id)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM favorites where userId=$id";
       
    
        $result=$conn->query($sql);
        $list=array();
        while($row=$result->fetch_assoc())
        { 
          
            $Obj=new favorites($row["id"]);
            array_push($list,$Obj);
        

        }
          
        return $list; 
        

    }
    function insert($obj)
    {
        $conn=db::getConnection();

        $userObj=$obj->getUserObj();
        $userId=$userObj->getId();

        $sDetailObj=$obj->getSessionDetailsObj();
        $sDId=$sDetailObj->getId();
        $sql="INSERT INTO favorites(adId, userId) VALUES ($sDId,$userId)";
        $conn->query($sql);



    }
    function remove($id)
    {
        $conn=db::getConnection();
        $sql="delete from favorites where adId=$id";
        $conn->query($sql);
    }

	function getId() {
		return $this->id;
	}
	
	
	function setId($id)
    {
		$this->id = $id;
		
	}

	function getSessionDetailsObj() {
		return $this->sessionDetailsObj;
	}
	
	
	function setSessionDetailsObj($sessionDetailsObj)
    {
		$this->sessionDetailsObj = $sessionDetailsObj;
		
	}

	function getUserObj() {
		return $this->userObj;
	}
	
	function setUserObj($userObj)
    {
		$this->userObj = $userObj;
		
	}
}
?>