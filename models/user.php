<?php
include_once "helper.php";
include_once "userType.php";

class user
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $phoneNum;
    private $userTypeObj;
    function __construct($id="")
    {
        $conn=db::getConnection();
        if($id!="")
        {
        $sql="SELECT * FROM user WHERE id=$id";
        $result=$conn->query($sql);
        $userObj=$result->fetch_assoc();
        $this->id=$id;
        $this->firstName=$userObj["firstName"];
        $this->lastName=$userObj["lastName"];
        $this->email=$userObj["email"];
        $this->password=$userObj["password"];
        $this->phoneNum=$userObj["phoneNum"];
        $this->userTypeObj=new userType($userObj["userTypeId"]);

        }

    }
    function insertUser($obj)
    {
        $conn=db::getConnection();
        $userTypeObj=$obj->getUserTypeObj();
        $userTypeId=$userTypeObj->getId();
        $sql="INSERT INTO `user`(`firstName`, `lastName`, `phoneNum`, `email`, `password`,`userTypeId`) VALUES ('$obj->firstName','$obj->lastName','$obj->phoneNum','$obj->email','$obj->password','$userTypeId')";
        $conn->query($sql);

	$id=$conn->insert_id;
        $date=date('y-m-d h:i:s');
        $value=md5($id.$date);
        $sql="update user set uId='$value' where id=$id";
        $conn->query($sql);
       

    }
    function updatePassword($obj)
    {
        $conn=db::getConnection();
        $sql="UPDATE `user` SET `password`='$obj->password' WHERE id=$obj->id";
        $conn->query($sql);
      
    }
    function updateUser($obj)
    {
        $conn=db::getConnection();
        $sql="UPDATE `user` SET `firstName`='$obj->firstName',`lastName`='$obj->lastName',`phoneNum`='$obj->phoneNum',`email`='$obj->email' WHERE id=$obj->id";
        $conn->query($sql);
        

    }
    function login($email,$password)
    {
        $conn=db::getConnection();
        $sql="SELECT * FROM user Where email ='".$email."' and password='$password'";
        $res=$conn->query($sql);
        if($row=$res->fetch_assoc())
        {
           $obj=new user();
           $obj->id=$row["id"];
           $obj->firstName=$row["firstName"];
           $obj->lastName=$row["lastName"];
           $obj->lastName=$row["phoneNum"];
           $obj->lastName=$row["email"];
           $obj->password=$row["password"];
           $obj->userTypeObj=new userType($row["userTypeId"]);
           return $obj;
          
        }

     
    
    }
    /*
    function update($obj)
    {
        $conn=db::getConnection();
        $firstName=$obj->firstName;
        $lastName=$obj->lastName;
        $phoneNum=$obj->phoneNum;
        $email=$obj->email;

        $sql="UPDATE `user` SET `firstName`='$firstName',`lastName`='$lastName',`phoneNum`='$phoneNum',`email`='$email' WHERE id=$id";
       $conn->query($sql);
    }
    */
   

	/**
	 * @return mixed
	 */
	function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return user
	 */

	/**
	 * @return mixed
	 */
	function getFirstName() {
		return $this->firstName;
	}
	
	/**
	 * @param mixed $firstName 
	 * @return user
	 */
	function setFirstName($firstName)
    {
		$this->firstName = $firstName;
		return $this;
	}

	function getLastName() {
		return $this->lastName;
	}
	
	
	function setLastName($lastName)
    {
		$this->lastName = $lastName;
		
	}

	function getEmail() {
		return $this->email;
	}
	
	
	function setEmail($email)
    {
		$this->email = $email;
		
	}
	
	function getPassword() {
		return $this->password;
	}
	

	function setPassword($password)
    {
		$this->password = $password;
		
	}

	function getPhoneNum() {
		return $this->phoneNum;
	}
	
	
	function setPhoneNum($phoneNum)
    {
		$this->phoneNum = $phoneNum;
		return $this;
	}
	/**
	 * @return mixed
	 */

	/**
	 * @param mixed $id 
	 * @return user
	 */
	function setId($id): self {
		$this->id = $id;
		return $this;
	}
	/**
	 * @return mixed
	 */
	function getUserTypeObj() {
		return $this->userTypeObj;
	}
	
	/**
	 * @param mixed $userTypeObj 
	 * @return user
	 */
	function setUserTypeObj($userTypeObj): self {
		$this->userTypeObj = $userTypeObj;
		return $this;
	}
}
?>