<?php
include_once "helper.php";

class governorate
{
    private $id;
    private $name;
    private $uId;
    //private $listOfGovernorates=array();
    function __construct($id="")
    {
        $conn=db::getConnection();
        if($id!="")
        {
          
            $sql="SELECT * FROM governorate WHERE id =$id";
            $result=$conn->query($sql);
            $governorateObj=$result->fetch_assoc();
            $this->id=$id;
            $this->name=$governorateObj["name"];
            $this->uId=$governorateObj["uId"];
            
        }
       

    }
    public function delete($uId)
    {
      $conn=db::getConnection();
     
      $sql="delete from governorate where `uId`='$uId'";
      echo "<br>".$sql;
      $conn->query($sql);
  
    }
    public function insert($obj)
    {
      $conn=db::getConnection();
      $name=$obj->getName();
      $sql="INSERT INTO `governorate`( `name`) VALUES ('$name')";
      $conn->query($sql);
      $id=$conn->insert_id;
  
      $date=date('y-m-d h:i:s');
      $value=md5($id.$date);
      $sql="update governorate set uId='$value' where id=$id";
      $conn->query($sql);
  
    }
    public function update($obj)
    {
      $name=$obj->getName();
      $uId=$obj->getuID();
      $conn=db::getConnection();
      $sql="update governorate set name='$name' where uId='$uId'";
      $conn->query($sql);
  
    }
    function selectAll()
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM governorate";
       
    
        $result=$conn->query($sql);
        $list=array();
        while($row=$result->fetch_assoc())
        { 
          
            $Obj=new governorate($row["id"]);
            array_push($list,$Obj);
        

        }
          
        return $list; 
        

    }
    function getByUid($uId)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM governorate where uId='$uId'";
      //  echo "helloooo".$sql;
        $result=$conn->query($sql);
        $obj=$result->fetch_assoc();
        $govObj=new governorate($obj["id"]);
        return $govObj;
        

    }



	function getName() {
		return $this->name;
	}
	

	function setName($name){
		$this->name = $name;

	}

	function getId() {
		return $this->id;
	}

	function setId($id){
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
	 * @return governorate
	 */
	function setUId($uId): self {
		$this->uId = $uId;
		return $this;
	}
}

?>