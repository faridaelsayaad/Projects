<!DOCTYPE html>
<html lang="en">
<head>
    




    <meta charset="UTF-8">
    <link rel="stylesheet" href="../views/styleTable.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/styleForm.css">
    <title>Table</title>

    <style>
        #header a
        {
            color:white;
        }
        #header a:hover
        {
            color:black;
        }
        </style>

  
  
</head>
</html>
<?php
include_once "../controllers/headerController.php";
class optionView{

    function showInsertForm()
    {
        echo" <div class=center>
        
      
      
        <h2>Add Option</h2>
        <form action=../controllers/optionController.php?command=insertDB method=POST>";
       
      
           echo" <div class=txt_field>
           <input type=text name=name>
              <span></span>
              <label>Option Name</label>
            </div>

            <div class=txt_field>
           <input type=text name=type>
              <span></span>
              <label>Type</label>
            </div>
        
        
      
   
          <div class=pass></div>
          <input type=submit value=Add>
          <div class=signup_link>
           
          </div>
        
      </div></form>";
       
  



   

    }
    function showUpdateForm($obj)
    {
        $attribName=$obj->getAttribName();
        $type=$obj->getType();
        $uId=$obj->getuID();
        echo" <div class=center>
          
        
        
        <h2>update Option </h2>";
        echo"  <form action=../controllers/optionController.php?command=updateDB&uId=$uId method=POST>";
        echo "<br><br>
        <div class=txt_field>
        <input type=text name=name value=$attribName>
              <span></span>
              <label>Option Name</label>
            </div>
            <div class=txt_field>
            <input type=text name=type value='$type'>
              <span></span>
              <label>Type</label>
            </div>
         
            <input type=submit value=Update>
            <div class=signup_link>
             
            </div>
          
        </div></form>";

  

    }
    function listOptionsToUpdate($optionList)
    {

        echo"
      <table>
      <tr id=header>
          <th>Option Name</th>
          <th>Action</th>
          
       
      </tr>";
      foreach($optionList as $obj)
      {
        $id=$obj->getId();
       
        $name=$obj->getAttribName();
        $uId=$obj->getUId();
      // echo "$uId";
      echo"
      <tr>
     
      <td>".$name."</td>
      <td><a href=../controllers/optionController.php?command=showUpdateForm&uId=".$uId.">Update<br></a></td>
   
  </tr>";
    
     }
     echo "</table>";
   
      
       

     
      
      
      

       
    }
    function listOptionsToDelete($optionList)
    {
        echo"
        <table>
        <tr id=header>
            <th>Option Name</th>
            <th>Action</th>
         
        </tr>";
        foreach($optionList as $obj)
       {
         $id=$obj->getId();
        
         $name=$obj->getAttribName();
         $uId=$obj->getUId();
        // echo "$uId";
        echo"
        <tr>
        <td>".$name."</td>
        <td><a href=../controllers/optionController.php?command=delete&uId=".$uId.">Delete<br></a></td>
     
    </tr>";
      
       }
       echo "</table>";
      

       
    }
    function showDelOptionFromCat($optionList,$catUId)
    {
        echo"
        <table>
        <tr id=header>
            <th>Option Name</th>
            <th>Action</th>
         
        </tr>";
        foreach($optionList as $obj)
       {
         $id=$obj->getId();
        
         $name=$obj->getAttribName();
         $uId=$obj->getUId();
        // echo "$uId";
        echo"
        <tr>
        <td>".$name."</td>
        <td><a href=../controllers/pCategoryOptionController.php?command=delOptionFromCatDB&uId=".$uId."&catUId=$catUId>Delete</a></td>
     
    </tr>";
      
       }
       echo "</table>";

     
      

    }
    
    function showEachOption($obj,$catUId)
    {
       
        $name=$obj->getAttribName();
        $uId=$obj->getuID();
       
       echo"<tr>
        <td>$name</td>
        <td><a href=../controllers/pCategoryOptionController.php?command=addToCategory&optionUId=".$uId."&catUId=$catUId>Add</a></td>
       
     
        </tr>";

        
       
    }




    
    
}
?>