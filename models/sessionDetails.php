<?php
include_once "helper.php";
include_once "category.php";
include_once "governorate.php";
include_once "session.php";
include_once "user.php";
class sessionDetails{
    private $id;
    private $name;
    private $catObj;
    private $govObj;
    private $sessionObj;
    private $price;
    private $purchaseYear;
    private $description;
    private $photo;
    private $time;
	private $uId;

    function __construct($id="")
    {
        
       
        if($id!="")
        {
            $conn=db::getConnection();
            $sql="SELECT * FROM sessiondetails WHERE id=$id";
            $result=$conn->query($sql);
            $sessionDetails=$result->fetch_assoc();
            $this->id=$id;
            $this->name=$sessionDetails["name"];
            $this->catObj=new category($sessionDetails["catId"]);
            $this->govObj=new governorate($sessionDetails["govId"]);
           $this->sessionObj=new session($sessionDetails["sessionId"]);
            $this->price=$sessionDetails["price"];
            $this->purchaseYear=$sessionDetails["purchaseYear"];
            $this->description=$sessionDetails["description"];
            $this->photo=$sessionDetails["photo"];
            $this->time=$sessionDetails["time"];
			$this->uId=$sessionDetails["uId"];

        }
    


    }

    function selectBy($column,$value)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM sessionDetails WHERE $column=$value";
       
       
    
        $result=$conn->query($sql);
        $list=array();
        while($row=$result->fetch_assoc())
        { 
           
            $Obj=new sessionDetails($row["id"]);
            array_push($list,$Obj);
        

        }
          
        return $list; 
        

    }
    function selectAll()
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM sessionDetails";
       
    
        $result=$conn->query($sql);
        $sessionDetailsList=array();
        while($row=$result->fetch_assoc())
        { 
          
            $Obj=new sessionDetails($row["id"]);
            array_push($sessionDetailsList,$Obj);
        

        }
          
        return $sessionDetailsList;
        

    }
    function selectByBoth($column1,$value1,$column2,$value2)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM sessionDetails WHERE $column1=$value1 and $column2=$value2 ";
     
       
    
        $result=$conn->query($sql);
        $list=array();
        while($row=$result->fetch_assoc())
        { 
           
            $Obj=new sessionDetails($row["id"]);
            array_push($list,$Obj);
        

        }
          
        return $list; 

    }
	function insertAd($obj)
    {
	    $govObj= $obj->getGovObj();
		//echo $govObj->getName();
	    $govId=$govObj->getId();

		$catObj=$obj->getCatObj();
		$catId=$catObj->getId();

		$sessionObj=$obj->getSessionObj();
		$sessionId=$sessionObj->getId();
	
        $name=$obj->getName();
		$price=$obj->getPrice();
		$purchaseYear=$obj->getPurchaseYear();
		$description=$obj->getDescription();
		$time=$obj->getTime();
		$photo=$obj->getPhoto();;

	//	$govObj=$obj->getGovObj();
		//echo $govObj->name;
	
		//echo "heyyyyyy";
       // echo $govObj->getName();
	
		

        $conn=db::getConnection();
		$sql="INSERT INTO `sessiondetails`(`sessionId`, `name`, `catId`, `govId`, `price`, `purchaseYear`, `description`, `photo`, `time`) VALUES ('$sessionId','$name','$catId','$govId','$price','$purchaseYear','$description','$photo','$time')";
		$conn->query($sql);

		$id=$conn->insert_id;
		
  


   $date=date('y-m-d h:i:s');
   $value=md5($id.$date);
   $sql="update sessiondetails set uId='$value' where id=$id";
   $conn->query($sql);
   //echo "hellooo".$value;
   return $value;

    }
	function update($obj)
	{
		$conn=db::getConnection();

		$id=$obj->getId();
	//	echo "hiiiiiiiiiii<br><br>".$id;
		$govObj= $obj->getGovObj();
		//echo $govObj->getName();
	    $govId=$govObj->getId();

		$catObj=$obj->getCatObj();
		$catId=$catObj->getId();

		$sessionDetailUId=$obj->getUId();
		$catUId=$catObj->getUId();

	
	
        $name=$obj->getName();
		$price=$obj->getPrice();
		$purchaseYear=$obj->getPurchaseYear();
		$description=$obj->getDescription();
		$time=$obj->getTime();
		$photo=$obj->getPhoto();


		$sql="UPDATE sessiondetails SET name='$name',catId=$catId,govId=$govId,price=$price,purchaseYear='$purchaseYear',description='$description',photo='$photo' WHERE id=$id";
        //echo $sql;
		echo "hiiiii<br>".$sessionDetailUId;
		$conn->query($sql);
		
		header("location:pCategoryOptionController.php?msg=updateForm&catUId=$catUId&sessionDetailsUId=".$sessionDetailUId);

	}
	function getByUid($uId)
    {

	
        $conn=db::getConnection();
        $sql="SELECT * FROM sessionDetails where uId='$uId'";
        $result=$conn->query($sql);
        $obj=$result->fetch_assoc();
        $sessionDetailsObj=new sessionDetails(@$obj["id"]);
        return $sessionDetailsObj;
        

    }



	function getId() {
		return $this->id;
	}
	
	
	function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	function getName() {
		return $this->name;
	}
	
	
	function setName($name)
	{
		$this->name = $name;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getCatObj() {
		return $this->catObj;
	}

	function setCatObj($catObj)
	{
		$this->catObj = $catObj;
		return $this;
	}

	function getGovObj() {
		return $this->govObj;
	}
	

	function setGovObj($govObj)
    {
		//echo "hiiii<br><br>hiiii";
		$this->govObj = $govObj;
		//echo $this->govObj->getName();
	
	}

	function getSessionObj() {
		return $this->sessionObj;
	}
	

	function setSessionObj($sessionObj)
	{
		$this->sessionObj = $sessionObj;
		return $this;
	}

	function getPrice() {
		return $this->price;
	}
	
	
	function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}

	function getPurchaseYear() {
		return $this->purchaseYear;
	}

	function setPurchaseYear($purchaseYear)
	{
		$this->purchaseYear = $purchaseYear;
		return $this;
	}

	function getDescription() {
		return $this->description;
	}
	

	
	function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	function getPhoto() {
		return $this->photo;
	}
	
	
	function setPhoto($photo)
	{
		$this->photo = $photo;
		return $this;
	}

	function getTime() {
		return $this->time;
	}
	
	
	function setTime($time)
	{
		$this->time = $time;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getUId() {
		return $this->uId;
	}
	
	/**
	 * @param mixed $uId 
	 * @return sessionDetails
	 */
	function setUId($uId): self {
		$this->uId = $uId;
		return $this;
	}
}


?>