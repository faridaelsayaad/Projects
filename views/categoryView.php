<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="../views/styleTable.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    
  <link rel="stylesheet" href="../views/styleForm.css">
    <style>
      .cat
      {
        /* background-color:rgb(200, 186, 185);*/
        background-color: whitesmoke;
        
         padding:20px;

      }
      a,.cat
      {
         color:black;
         


      }
      h2{
         text-align: center;
      }
   </style>


</head>
</html>

<?php

include_once "../controllers/headerController.php";
class categoryView
{
    function listAllCategories($categoryObj)
    {
       echo"<div class=parent>";
       echo"<div class=cat><h2>Categories</h2> <br>";
       echo "<a href=../controllers/final.php>All Categories<br><br></a>";
       foreach($categoryObj as $cat)
       {
         $id=$cat->getId();
        
         $name=$cat->getName();
         $uId=$cat->getUId();
         echo "<a href=../controllers/final.php?uId=".$uId.">".$name."<br><br></a>";
          // echo "<a href=../controllers/final.php?catId=".$id.">".$name."<br><br></a>";
       }
      

       
    }
    function listCatAddOption($categoryObjList)
    {
      echo"
      <table>
      <tr id=header>
          <th>Categoy</th>
          
       
      </tr>";
      foreach($categoryObjList as $cat)
      {
        $id=$cat->getId();
       
        $name=$cat->getName();
        $uId=$cat->getUId();
      // echo "$uId";
      echo"
      <tr>
     
      <td><a href=../controllers/pCategoryOptionController.php?uId=".$uId."&command=showOptions>".$name."</a></td>
   
  </tr>";
    
     }
     echo "</table>";
   
      
       
    }
    function listCatDelOption($categoryObjList)
    {
      echo"
      <table>
      <tr id=header>
          <th>Categoy</th>
          
       
      </tr>";
      foreach($categoryObjList as $cat)
      {
        $id=$cat->getId();
       
        $name=$cat->getName();
        $uId=$cat->getUId();
      // echo "$uId";
      echo"
      <tr>
     
      <td><a href=../controllers/pCategoryOptionController.php?uId=".$uId."&command=showOptionsToDel>".$name."</a></td>
   
  </tr>";
    
     }
     echo "</table>";
   

    }
    function listCategoriesToUpdate($categoryObj)
    {
      echo"
      <table>
      <tr id=header>
          <th>Categoy</th>
          <th>Action</th>
          
       
      </tr>";
      foreach($categoryObj as $cat)
      {
        $id=$cat->getId();
       
        $name=$cat->getName();
        $uId=$cat->getUId();
      // echo "$uId";
      echo"
      <tr>
     <td>$name</td>
      <td><a href=../controllers/categoryController.php?command=showUpdateForm&uId=".$uId.">Update</a></td>
   
  </tr>";
    
     }
     echo "</table>";
   
     
       
      

       
    }
    function listCategoriesToDelete($categoryObj)
    {
      echo"
      <table>
      <tr id=header>
          <th>Categoy</th>
          <th>Action</th>
          
       
      </tr>";
      foreach($categoryObj as $cat)
      {
        $id=$cat->getId();
       
        $name=$cat->getName();
        $uId=$cat->getUId();
      // echo "$uId";
      echo"
      <tr>
     <td>$name</td>
      <td><a href=../controllers/categoryController.php?command=delete&uId=".$uId.">Delete<br></a></td>
   
  </tr>";
    
     }
     echo "</table>";

     

       
    }
    function showInsertForm()
    {
      echo" <div class=center>
        
      
      
      <h2>Add Category</h2>
      <form action=../controllers/categoryController.php?command=insertDB method=POST>";
     
    
         echo" <div class=txt_field>
         <input type=text name=name required>
            <span></span>
            <label>category Name</label>
          </div>
      
    
 
        <div class=pass></div>
        <input type=submit value=Add>
        <div class=signup_link>
         
        </div>
      
    </div>
    </form>";










   

    }
    function showUpdateForm($obj)
    {
      $name=$obj->getName();
      $uId=$obj->getuID();
      echo" <div class=center>
        
      
      
      <h2>update Category </h2>";
      echo" <form action=../controllers/categoryController.php?command=updateDB&uId=$uId method=POST>";
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
      
      
        


  
  
  





  

    

}


?>