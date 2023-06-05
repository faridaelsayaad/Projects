<?php
include_once "helper.php";
include_once "category.php";
include_once "option.php";

class productCategoryOption{
    private $id;
    private $categoryObj;
    private $optionObj;


    function __construct($id="")
    {
        if($id!="")
        {
            $conn=db::getConnection();
            $sql="SELECT * FROM productcategoryoption where id=$id";
            $result=$conn->query($sql);
            $pcatOptionObj=$result->fetch_assoc();
            $this->id=$pcatOptionObj["id"];
            $this->categoryObj= new category($pcatOptionObj["productCategoryId"]);
            $this->optionObj=new option($pcatOptionObj["optionId"]);
            



        }
    }
	function insert($obj)
	{
		$conn=db::getConnection();
		$categoryObj=$obj->categoryObj;
		$catId=$categoryObj->getId();

		$optionObj=$obj->optionObj;
		$optionId=$optionObj->getId();

		$sql="INSERT INTO `productcategoryoption`(`productCategoryId`, `optionId`) VALUES ('$catId','$optionId')";
		$conn->query($sql);


	}
	function delete($catId,$optionId)
	{
		$conn=db::getConnection();
		$sql="delete from productCategoryOption where productCategoryId=$catId and optionId=$optionId";
		echo "<br><br>".$sql;
		$conn->query($sql);

	}
   
    function selectByPCatId($catId)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM productCategoryOption WHERE productCategoryId=$catId";
       
       
    
        $result=$conn->query($sql);
        $list=array();
        while($row=$result->fetch_assoc())
        { 
           
            $Obj=new productCategoryOption($row["id"]);
            array_push($list,$Obj);
        

        }
          
        return $list; 
        

    }





	function getId() {
		return $this->id;
	}
	
	
	function setId($id) {
		$this->id = $id;
		
	}
	/**
	 * @return mixed
	 */
	function getCategoryObj() {
		return $this->categoryObj;
	}
	
	/**
	 * @param mixed $categoryObj 
	 * @return productCategoryOption
	 */
	function setCategoryObj($categoryObj): self {
		$this->categoryObj = $categoryObj;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getOptionObj() {
		return $this->optionObj;
	}
	
	/**
	 * @param mixed $optionObj 
	 * @return productCategoryOption
	 */
	function setOptionObj($optionObj): self {
		$this->optionObj = $optionObj;
		return $this;
	}
}

?>