<?php

include_once "helper.php";
include_once "user.php";

class session
{
   private $id;
   private $userObj;
   private $date;
   private $uId;

   function __construct($id="")
   {
      if($id!="")
      {
         $conn=db::getConnection();
         $sql="SELECT * FROM session WHERE id=$id";
         $result=$conn->query($sql);
         $sessionObj=$result->fetch_assoc();
         $this->id=$id;
         $this->userObj=new user($sessionObj["userId"]);
         $this->date=$sessionObj["date"];
         $this->uId=$sessionObj["uId"];

      }
      
   }
   function selectBy($column,$value)
   {
      $conn=db::getConnection();
      $sql="SELECT * FROM session WHERE $column=$value";
      $result=$conn->query($sql);
      $list=array();
      while($row=$result->fetch_assoc())
      { 
         
          $Obj=new session($row["id"]);
          array_push($list,$Obj);
      

      }
        
      return $list; 

   }
   function selectByBoth($column1,$value1,$column2,$value2)
   {

      $conn=db::getConnection();
      $sql="SELECT * FROM session WHERE $column1=$value1 and $column2=$value2 ";
     
     
  
      $result=$conn->query($sql);
      $list=array();
      $ct=0;
      while($row=$result->fetch_assoc())
      { 
         
          $Obj=new session($row["id"]);
          array_push($list,$Obj);
          

      }
        
      return $list; 

  }
  function selectByBoth2($column1,$value1,$column2,$value2)
  {

     $conn=db::getConnection();
     $sql="SELECT * FROM session WHERE $column1='$value1' and $column2=$value2 ";
    
    
     echo $sql;
     $result=$conn->query($sql);
     $obj=$result->fetch_assoc();
     if(isset($obj))
     {
      $Object=new session($obj["id"]);
      return $Object;

     }
   

 }
  function insert($obj)
  {
   $userObj=$obj->getUserObj();
   
   $userId=$userObj->getId();
   $date=$obj->getDate();
   //$tim

   $conn=db::getConnection();
   $sql="INSERT INTO `session`( `date`, `userId`) VALUES ('$date','$userId')";
   $conn->query($sql);
   $sessionId=$conn->insert_id;
  


   $date=date('y-m-d h:i:s');
   $value=md5($sessionId.$date);
   $sql="update session set uId='$value' where id=$sessionId";
   $conn->query($sql);
   return $sessionId;



  }
  function getByUid($uId)
  {
      $conn=db::getConnection();
      $sql="SELECT * FROM session where uId='$uId'";
    //  echo "helloooo".$sql;
      $result=$conn->query($sql);
      $obj=$result->fetch_assoc();
      $sessionObj=new session($obj["id"]);
      return $sessionObj;
      
  }


  
	/**
	 * @return mixed
	 */
	function getUserObj() {
		return $this->userObj;
	}
	
	/**
	 * @param mixed $userObj 
	 * @return session
	 */
	function setUserObj($userObj): self {
		$this->userObj = $userObj;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getDate() {
		return $this->date;
	}
	
	/**
	 * @param mixed $date 
	 * @return session
	 */
	function setDate($date): self {
		$this->date = $date;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	

	function setId($id)
   {
		$this->id = $id;
		
	}
	/**
	 * @return mixed
	 */
	function getUId() {
		return $this->uId;
	}
	
	/**
	 * @param mixed $uId 
	 * @return session
	 */
	function setUId($uId): self {
		$this->uId = $uId;
		return $this;
	}
}


?>