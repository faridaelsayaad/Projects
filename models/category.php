<?php
include_once "helper.php";

class category
{
    private $id;
   private $name;
   private $uId;
    //private $categories=array();

    function __construct($id="")
    {
        if($id!="")
        {
            $conn=db::getConnection();
            $sql="SELECT * FROM category where id=$id";
            $result=$conn->query($sql);
            $categoryObj=$result->fetch_assoc();
            $this->id=$categoryObj["id"];
            $this->name=$categoryObj["name"];
            $this->uId=$categoryObj["uId"];
            



        }
    }
       
  public function insert($obj)
  {
    $conn=db::getConnection();
    $name=$obj->getName();
    $sql="INSERT INTO `category`( `name`) VALUES ('$name')";
    $conn->query($sql);
    $id=$conn->insert_id;

    $date=date('y-m-d h:i:s');
    $value=md5($id.$date);
    $sql="update category set uId='$value' where id=$id";
    $conn->query($sql);

  }
  public function update($obj)
  {
    $name=$obj->getName();
    $uId=$obj->getuID();
    $conn=db::getConnection();
    $sql="update category set name='$name' where uId='$uId'";
    $conn->query($sql);

  }
  public function delete($uId)
  {
    $conn=db::getConnection();
   
    $sql="delete from category where `uId`='$uId'";
    echo "<br>".$sql;
    $conn->query($sql);

  }

    public function returnAllCategories()
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM category";
        $result=$conn->query($sql);
        $listOfCategories=array();
        while($row=$result->fetch_assoc())
        {       
            $cat=new category($row["id"]);
            array_push($listOfCategories,$cat);
         


        }
        return $listOfCategories;

    }
    function getByUid($uId)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM category where uId='$uId'";
      //  echo "helloooo".$sql;
        $result=$conn->query($sql);
        $obj=$result->fetch_assoc();
        $catObj=new category($obj["id"]);
        return $catObj;
        

    }
    /*
    public function getObjects()
    {
        return $this->categories;

    }
    */
    
    public function getName()
    {
        return $this->name;


    }
    public function getId()
    {
        return $this->id;

    }

 


   




	function getUId() {
		return $this->uId;
	}
	
	function setUId($uId)
    {
		$this->uId = $uId;
		return $this;
	}
	/**
	 * @param mixed $name 
	 * @return category
	 */
	function setName($name): self {
		$this->name = $name;
		return $this;
	}
	
/*
$catObj=new category(" ");
foreach($catObj->categories as $cat)
{
   
    echo $cat->name."<br>";
}
*/
}



?>