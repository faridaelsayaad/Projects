<?php
include_once "helper.php";

class option{
    private $id;
    private $attribName;
    private $type;
    private $uId;

    function __construct($id="")
    {
        if($id!="")
        {
            $conn=db::getConnection();
            $sql="SELECT * FROM option where id=$id";
            $result=$conn->query($sql);
            $optionObj=$result->fetch_assoc();
            $this->id=$optionObj["id"];
            $this->attribName=  $optionObj["attribName"];
            $this->type=  $optionObj["type"];
            $this->uId=$optionObj["uId"];
            



        }
    }
    public function insert($obj)
    {
      $conn=db::getConnection();
      $attribName=$obj->getAttribName();
      $type=$obj->getType();
      $sql="INSERT INTO `option`( `attribName`,`type`) VALUES ('$attribName','$type')";
      echo $sql;
      $conn->query($sql);
      $id=$conn->insert_id;
  
      $date=date('y-m-d h:i:s');
      $value=md5($id.$date);
      $sql="update option set uId='$value' where id=$id";
      $conn->query($sql);
  
    }
    public function returnAllOptions()
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM option";
        $result=$conn->query($sql);
        $listOfOptions=array();
        while($row=$result->fetch_assoc())
        {       
            $option=new option($row["id"]);
            array_push($listOfOptions,$option);
         


        }
        return $listOfOptions;

    }
    public function delete($uId)
    {
      $conn=db::getConnection();
     
      $sql="delete from option where `uId`='$uId'";
      echo "<br>".$sql;
      $conn->query($sql);
  
    }
    public function update($obj)
    {
        $attribName=$obj->attribName;
        $type=$obj->type;
        $uId=$obj->uId;
        $conn=db::getConnection();
        $sql="update option set `attribName`='$attribName',`type`='$type' where uId='$uId'";
        echo "<br>".$sql;
        $conn->query($sql);

    } 
    function getByUid($uId)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM option where uId='$uId'";
      //  echo "helloooo".$sql;
        $result=$conn->query($sql);
        $obj=$result->fetch_assoc();
        $optionObj=new option($obj["id"]);
        return $optionObj;
        

    }

	function getId() {
		return $this->id;
	}
	
	
	function setId($id){
		$this->id = $id;
		
	}
	
	function getAttribName() {
		return $this->attribName;
	}
	

	function setAttribName($attribName) {
		$this->attribName = $attribName;
		
	}


   
  //  $conn=db::getConnection();
   // $sql="select * from productCategoryOption where productCategoryId=".$catId;
 
       


    
	/**
	 * @return mixed
	 */
	function getUId() {
		return $this->uId;
	}
	
	/**
	 * @param mixed $uId 
	 * @return option
	 */
	function setUId($uId): self {
		$this->uId = $uId;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getType() {
		return $this->type;
	}
	
	/**
	 * @param mixed $type 
	 * @return option
	 */
	function setType($type): self {
		$this->type = $type;
		return $this;
	}
}

?>