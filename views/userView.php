
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../views/styleForm.css">
  <link rel="stylesheet" href="../views/styleSelectOption.css">

    <link rel="stylesheet" href="../views/styleTable.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>



  

</head>
</html>
<?php
include_once "../controllers/headerController.php";

class userView
{
    function ShowForm()
    {
        echo"
        <div calss=center>
        <h1>Log in</h1>
        </div>
        <form action=loginController.php method=POST>
       <div class=txt_field>
        <input type=email name=email required>
        <label>username</label>
        </div>
        <div class=txt_field>
        <input type=Password name=password required>
        <label>password</label>
        </div>
        <input type=submit value=Login>
        <div class=signup_link>
        Not a member?<a href=../controllers/userController.php?command=registrationForm>Register now!</a>
        </div>
        </form>
        </div>";
       
      

       

    }
    function showUpdateForm($obj)
    {
        $firstName=$obj->getFirstName();
        $lastName=$obj->getLastName();
        $phoneNum=$obj->getPhoneNum();
        $email=$obj->getEmail();

        echo "<div class=centerr>
        <font color=red>
     
      </font>
     
        <h1>Register</h1>
        <form action=../controllers/userController.php?command=updateDB method=post>
          <div class=txt_field>
          <input type=text name=firstName value=$firstName>
            <span></span>
            <label>First Name</label>
          </div>
          <div class=txt_field>
          <input type=text name=lastName value=$lastName>
            <span></span>
            <label>Last Name</label>
          </div>
          
          <div class=txt_field>
          <input type=text name=phoneNum value=$phoneNum>
            <span></span>
            <label>Phone Number</label>
          </div>
          <div class=txt_field>
          <input type=email name=email value=$email>
            <span></span>
            <label>Email Address</label>
          </div>
         

            
          
          <div class=pass></div>
          <input type=submit value=Update>
          <div class=signup_link>
          
          </div>
        </form>
      </div>";
     
        
        
        


    }
    function  showChangePasswordForm($msg="")
    {
      ?>
      <div class="center">
      <font color=red>
     <?php
    
    if($msg!="")
    {
       echo"<br><br>";
        echo"<h3>".$msg."</h3>";
        
    }
    ?>
    </font>
      <h1>Update Password</h1>
      <form action=../controllers/userController.php?command=validatePassword method="post">
        <div class="txt_field">
        <input type=password name=oldPassword >
          <span></span>
          <label>Old Password</label>
        </div>
        <div class="txt_field">
       <input type=password name=newPassword>
          <span></span>
          <label>New Password</label>
        </div>
        <div class="pass"></div>
        <input type="submit" value="Change Password">
        <div class="signup_link">
         
        </div>
      </form>
    </div>

     <?php
        
    }

    function showLoginForm($msg="")
    {
       
    ?>
        <div class="center">
        <font color=red>
       <?php
      
      if($msg!="")
      {
         echo"<br><br>";
          echo"<h3>".$msg."</h3>";
          
      }
      ?>
      </font>
        <h1>Login</h1>
        <form action=../controllers/userController.php?command=login method="post">
          <div class="txt_field">
          <input type=email name=email required>
            <span></span>
            <label>Username</label>
          </div>
          <div class="txt_field">
          <input type=Password name=password required>
            <span></span>
            <label>Password</label>
          </div>
          <div class="pass"></div>
          <input type="submit" value="Login">
          <div class="signup_link">
            Not a member? <a href=../controllers/userController.php?command=registrationForm>Register now!</a>
          </div>
        </form>
      </div>
      <?php
      /*
        echo"
        <div calss=center>
        <h1>Log in</h1>
        </div>
        <form action=../controllers/userController.php?command=login method=POST>
       <div class=txt_field>
        <input type=email name=email required>
        <label>username</label>
        </div>
        <div class=txt_field>
        <input type=Password name=password required>
        <label>password</label>
        </div>
        <input type=submit value=Login>
        <div class=signup_link>
        Not a member?<a href=../controllers/userController.php?command=registrationForm>Register now!</a>
        </div>
        </form>
        </div>";
        */
    }
    function showRegistrationForm($listOfObjects)
    {
      ?>
      
      <div class="centerr">
        <font color=red>
     
      </font>
     
        <h1>Register</h1>
        <form action=../controllers/userController.php?command=register method="post">
          <div class="txt_field">
          <input type=text name=firstName required>
            <span></span>
            <label>First Name</label>
          </div>
          <div class="txt_field">
          <input type=text name=lastName required>
            <span></span>
            <label>Last Name</label>
          </div>
          
          <div class="txt_field">
          <input type=text name=phoneNum required>
            <span></span>
            <label>Phone Number</label>
          </div>
          <div class="txt_field">
          <input type=email  onkeyup=searchEmail(this.value)  name=email required>
            <span></span>
            <label>Email Address</label>
          </div>
          <div class="txt_field">
          <input type=password name=password required>
            <span></span>
            <label>Password</label>
          </div>
          <div class="txt_field">
          
<div class="select">
   <select name="userTypeId" id="format">
      <option selected disabled>USER TYPE</option>
      
      <?php
               
                foreach($listOfObjects as $obj)
                {
                    echo"<option value=".$obj->getId().">".$obj->getName()."</option>";
        
                }
        
              
                       
             
               

            ?>

   </select>
              
</div>
          
            <span></span>
            
          </div>
          <div class="pass"></div>
          <input type="submit" value="Register">
          <div class="signup_link">
          
          </div>
        </form>
      </div>
      <?php


     
        
    }

    
    function showAccount()
    {
      echo"
      <table>
      <tr id=header>
          <th>Account</th>

      </tr>";
      echo"<tr>
      <td><a href=../controllers/userController.php?command=update>Edit Account Info</a></td>
      </tr>
      <tr>
      <td><a href=../controllers/userController.php?command=changePassword>Change Password</a></td>

      </tr>
      </table>";
      
      
    }


}
?>