<?php
include_once "../models/user.php";
include_once "../models/userType.php";
include_once "../models/helper.php";
include_once "../views/userView.php";


if($_REQUEST["command"]=="login")
{
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $objEncrypt=new Encrypt();
    $passEnc=$objEncrypt->Encrypt($password,3);
   // echo $passEnc;
  
    $objModel=new user();
    $obj=$objModel->login($email,$passEnc);
    if(isset($obj))
    {
        session_start();
        $userTypeObj=$obj->getUserTypeObj();

        $_SESSION["id"]=$obj->getId();
        $_SESSION["password"]=$obj->getPassword();
        $_SESSION["userTypeId"]=$userTypeObj->getId();
        
        if($_SESSION["userTypeId"]==1)
        {
            header("location:final.php");

        }
        if($_SESSION["userTypeId"]==2)
        {
            header("location:adminController.php?command=showAdminPermissions");

        }
     
  
    }
    else{
        $viewObj=new userView();
        $msg="Wrong Email or password";
        $viewObj->showLoginForm($msg);
       // header("location:../views/loginFormWrongView.php?msg=wrong email or password");
    }
    

}

if($_REQUEST["command"]=="register")
{
    $firstName=$_REQUEST["firstName"];
    $lastName=$_REQUEST["lastName"];
    $phoneNum=$_REQUEST["phoneNum"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $userTypeId=$_REQUEST["userTypeId"];
    $userTypeObj=new userType($userTypeId);
    echo $userTypeObj->getName();
    

    $objEncrypt=new Encrypt();
    $passEnc=$objEncrypt->Encrypt($password,3);


    $obj=new user();
    $obj->setUserTypeObj($userTypeObj);
    $obj->setFirstName($firstName);
    $obj->setLastName($lastName);
    $obj->setPhoneNum($phoneNum);
    $obj->setEmail($email);
    $obj->setPassword($passEnc);
   
  
    $obj->insertUser($obj);
    header("location:../phpMailer/email.php?email=$email");
    /*
    header("location:userController.php?command=loginForm");
    */


}
if($_REQUEST["command"]=="myAccount")
{

    $viewObj=new userView();
    $viewObj->showAccount();


}
if($_REQUEST["command"]=="update")
{
    
    $id=$_SESSION["id"];

    $userObj=new user($id);
    $viewObj=new userView();
    $viewObj->showUpdateForm($userObj);


    

}
if($_REQUEST["command"]=="updateDB")
{
    session_start();
    $id=$_SESSION["id"];
    $firstName=$_REQUEST["firstName"];
    $lastName=$_REQUEST["lastName"];
    $phoneNum=$_REQUEST["phoneNum"];
    $email=$_REQUEST["email"];
    $obj=new user();
    $obj->setFirstName($firstName);
    $obj->setLastName($lastName);
    $obj->setPhoneNum($phoneNum);
    $obj->setEmail($email);
    $obj->setId($id);
    $obj->updateUser($obj);
    header("location:userController.php?command=myAccount");

}
if($_REQUEST["command"]=="loginForm")
{
    $viewObj=new userView();
    $viewObj->showLoginForm();
}
if($_REQUEST["command"]=="registrationForm")
{
    $userTypeObj=new userType();

    $userTypeList=$userTypeObj->selectAll();
    $viewObj=new userView();
    $viewObj->showRegistrationForm($userTypeList);
}
if($_REQUEST["command"]=="changePassword")
{
    $vObj=new userView();
    $vObj->showChangePasswordForm();


}
if($_REQUEST["command"]=="validatePassword")
{
    session_start();
    $currentPassword=$_SESSION["password"];

    $password=$_REQUEST["oldPassword"];
    $objEncrypt=new Encrypt();
    $oldPassword=$objEncrypt->Encrypt($password,3);
 
    $password=$_REQUEST["newPassword"];
    $objEncrypt=new Encrypt();
    $newPassword=$objEncrypt->Encrypt($password,3);


    echo"Currentpassword: ".$currentPassword;
    echo"<br>oldPassword: ".$oldPassword;

    $id=$_SESSION["id"];
    if($oldPassword==$currentPassword)
    {
        $obj=new user();
        $obj->setId($id);
        $obj->setPassword($newPassword);
        $obj->updatePassword($obj);
        $_SESSION["password"]=$newPassword;
    header("location:userController.php?command=myAccount");
    
    }
else
{
    $msg="Password is incorrect";
    $viewObj=new userView();
    $viewObj->showChangePasswordForm($msg);

}
}





?>