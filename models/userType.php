<?php
include_once "helper.php";

class userType
{
    private $id;
    private $name;
    
    function __construct($id="")
    {
        $conn=db::getConnection();
        if($id!="")
        {
          
            $sql="SELECT * FROM usertype WHERE id =$id";
            $result=$conn->query($sql);
            $userTypeObj=$result->fetch_assoc();
            $this->id=$id;
            $this->name=$userTypeObj["name"];
         
            
        }
       

    }
    function selectAll()
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM userType";
       
    
        $result=$conn->query($sql);
        $list=array();
        while($row=$result->fetch_assoc())
        { 
          
            $Obj=new usertype($row["id"]);
            array_push($list,$Obj);
        

        }
          
        return $list; 
        

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
}

?>