<?php


include_once "helper.php";
include_once "productCategoryOption.php";
include_once "sessionDetails.php";
class pcategoryoptionvalue{



    private $id;
    private $pCatOptionObj;
    private $sessionDetailsObj;
    private $value;


    function __construct($id="")
    {
        if($id!="")
        {
            $conn=db::getConnection();
            $sql="SELECT * FROM pcategoryoptionvalue where id=$id";
            $result=$conn->query($sql);
            $pcatOptionValueObj=$result->fetch_assoc();
            $this->id=$pcatOptionValueObj["id"];
            $this->pCatOptionObj= new productCategoryOption($pcatOptionValueObj["pCOId"]);
            $this->sessionDetailsObj= new sessionDetails($pcatOptionValueObj["pId"]);
            $this->value=$pcatOptionValueObj["value"];
            



        }
    }
	function selectBy($column,$value)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM pcategoryoptionValue WHERE $column=$value";
       
       
     //  echo $sql;
        $result=$conn->query($sql);
        $list=array();
        while($row=$result->fetch_assoc())
        { 
           
            $Obj=new pcategoryoptionvalue($row["id"]);
            array_push($list,$Obj);
        

        }
          
        return $list; 
        

    }
	function getOptionValue($pCOID,$pId)
    {
        $conn=db::getConnection();
       
		$sql="select * from pcategoryoptionvalue where pCOID=".$pCOID." and pId=$pId";
		
		$result=$conn->query($sql);
		$obj=$result->fetch_assoc();
		//echo $obj["value"];
		//$id=$obj["id"];
	//	$p=new productCategoryOption();
		$pcatOptionValueObj=new pCategoryOptionValue($obj["id"]);

	
		
		//echo $pcatOptionValueObj->value;
		return $pcatOptionValueObj;
     
       
    

    }
	function insert($obj)
	{
		$conn=db::getConnection();
		$pCatOptionObj=$obj->getPCatOptionObj();
		$pCOId=$pCatOptionObj->getId();

		$sessionDetailObj=$obj->getSessionDetailsObj();
		$sessionDetailId=$sessionDetailObj->getId();

		//echo"<br>---------------";
		$value=$obj->getValue();

		//echo "<br>";
		//echo $pCOId;
		//echo "<br>";
		//echo "sessionDetailsId:".$sessionDetailId;
		//echo "<br>".$value;

		$sql="INSERT INTO `pcategoryoptionvalue`(`pCOId`, `pId`, `value`) VALUES ('$pCOId','$sessionDetailId','$value')";
		$conn->query($sql);
		

        

	}
	function update($id,$value)
	{
		$conn=db::getConnection();
	$sql="UPDATE `pcategoryoptionvalue` SET `value`='$value' WHERE id=$id";
	//echo "<br><br>".$sql."<br><br>";

	$conn->query($sql);


	}






	/**
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	
	function setId($id){
		$this->id = $id;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getPCatOptionObj() {
		return $this->pCatOptionObj;
	}
	

	function setPCatOptionObj($pCatOptionObj): self {
		$this->pCatOptionObj = $pCatOptionObj;
		return $this;
	}
	
	function getSessionDetailsObj() {
		return $this->sessionDetailsObj;
	}
	
	
	function setSessionDetailsObj($sessionDetailsObj): self {
		$this->sessionDetailsObj = $sessionDetailsObj;
		return $this;
	}
	
	function getValue() {
		return $this->value;
	}

	function setValue($value)
	{
		$this->value = $value;
		
	}
}

?>