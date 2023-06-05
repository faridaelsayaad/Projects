<html>
<head>
    
<meta charset="UTF-8">
    <link rel="stylesheet" href="../views/styleTable.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../views/styleForm.css">
 
</head>
<?php
include_once "../controllers/headerController.php";
class governorateView{

    function showFormCatIdSet($uId)
    {
        echo"<form action=../controllers/final.php?uId=".$uId." method=POST>";
    

    }
    function showFormCatIdNotSet()
    {
        
        echo"<form action=../controllers/final.php? method=POST>";
  
        
    }
    function listGovernoratesToUpdate($govObj)
    {
        echo"
        <table>
        <tr id=header>
            <th>Governorate Name</th>
            <th>Action</th>
         
        </tr>";
        foreach($govObj as $obj)
       {
         $id=$obj->getId();
        
         $name=$obj->getName();
         $uId=$obj->getUId();
        // echo "$uId";
        echo"
        <tr>
        <td>".$name."</td>
        <td><a href=../controllers/governorateController.php?command=showUpdateForm&uId=".$uId.">Update</a></td>
     
    </tr>";
      
       }
       echo "</table>";



      

       
    }
    function listGovernoratesToDelete($govObj)
    {
        
        echo"
        <table>
        <tr id=header>
            <th>Governorate Name</th>
            <th>Action</th>
         
        </tr>";
        foreach($govObj as $obj)
       {
         $id=$obj->getId();
        
         $name=$obj->getName();
         $uId=$obj->getUId();
        // echo "$uId";
        echo"
        <tr>
        <td>".$name."</td>
        <td><a href=../controllers/governorateController.php?command=delete&uId=".$uId.">Delete</a></td>
     
    </tr>";
      
       }
       echo "</table>";

    

       
    }
    function showInsertForm()
    {
        echo" <div class=center>
        
      
      
      <h2>Add Governorate</h2>
      <form action=../controllers/governorateController.php?command=insertDB method=POST>";
     
    
         echo" <div class=txt_field>
         <input type=text name=name required>
            <span></span>
            <label>governorate Name</label>
          </div>
      
    
 
        <div class=pass></div>
        <input type=submit value=Add>
        <div class=signup_link>
         
        </div>
      
    </div></form>";


   

    }
    function showUpdateForm($obj)
    {
        $name=$obj->getName();
        $uId=$obj->getuID();
        echo" <div class=center>
          
        
        
        <h2>update Governroate </h2>";
        echo" <form action=../controllers/governorateController.php?command=updateDB&uId=$uId method=POST>";
        echo "<br><br>
        <div class=txt_field>
        <input type=text name=name value=$name>
              <span></span>
              <label>category Name</label>
            </div>
            <input type=submit value=Update>
            <div class=signup_link>
             
            </div>
          
        </div></form>";
       
        
  

    }


    function showAll($govId,$listOfObjects)
    {
        
        echo "<div class=select><select name=govId id=format>";
        echo" <option selected disabled>Choose a governorate</option>";
        if($govId!="")
        {
          
            foreach($listOfObjects as $obj)
            {
                if($obj->getId()==$govId)
                {
                   echo"<option selected value=".$obj->getId().">".$obj->getName()."</option>";
                    
     
                }
                else
                {
                    //echo"<option value=".$obj->getId().">".$obj->getId().",".$govId."</option>";
                    
                    echo"<option value=".$obj->getId().">".$obj->getName()."</option>";
    
                }
            }

        }
        else if($govId=="")
        {
            
            foreach($listOfObjects as $obj)
            {
            echo"<option value=".$obj->getId().">".$obj->getName()."</option>";
            }
    

        }
        echo"</select>
        </div>
        <br><br>
        <input class=button type=submit value=Filter>

        </div>
        </form>";

















/*










        "<div class=select>
   <select name=name=govId id=format>
      <option selected disabled>Choose a governorate</option>";
      
     
      if($govId!="")
      {
        
          foreach($listOfObjects as $obj)
          {
              if($obj->getId()==$govId)
              {
                 echo"<option selected value=".$obj->getId().">".$obj->getName()."</option>";
                  
   
              }
              else
              {
                  //echo"<option value=".$obj->getId().">".$obj->getId().",".$govId."</option>";
                  
                  echo"<option value=".$obj->getId().">".$obj->getName()."</option>";
  
              }
          }

      }
      else if($govId=="")
      {
          
          foreach($listOfObjects as $obj)
          {
          echo"<option value=".$obj->getId().">".$obj->getName()."</option>";
          }
  

      }
      echo"</select></div>
                       
        
        <input type=submit value=Filter>

        </div>
        </form>";
        */

    }
}
?>
   








    