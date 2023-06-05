<?php
//include_once "header2.php";
include_once "../controllers/headerController.php";
?>
<!DOCTYPE html>

<head>
    

  <link rel="stylesheet" href="../views/styleForm.css">
  <link rel="stylesheet" href="../views/styleSelectOption.css">
  <link rel="stylesheet" href="../views/styleTable.css">

    <link rel="stylesheet" href="../styless.css">
    <link rel="stylesheet" href="../styles.css">
    <style>
        .imgDesc
        {
            margin-left: 100px;
        }
        .images
        {
        
          
          border: 1px solid gray;

        }
        h2
        {
          background-color:rosybrown;
          padding: 10px;
          text-align: center;
          color:white;
         
          
        }
        h2 a{
          color:white;

        }
        h3{
          background-color:#8CBDB2;
          padding: 10px;
          margin-bottom: 20px;
          
          text-align: center;
          color:white;
          

        }
        .viewDetails a
        {
          background-color:rosybrown;
          padding: 10px;
          text-align: center;
          color:white;
          
        }
        .viewDetails:hover {
  
    transform: scale(1.06);
   
}
        .imgL
        {
        
          
          
          width: fit-content;

        }
      
        

       
    </style>


</head>
</html>

    
<?php
//include_once "header2.php";

include_once "options.php";
class sessionDetailsView
{
    function showAllSessionDetails($listOfObjects)
    {
        //include_once "header2.php";
        echo"<div class=photo>";
        foreach($listOfObjects as $obj)
        {
            //echo "hello";
            

            echo "<div class=images><img src=../".$obj->getPhoto()." width=200
            height=200>
            <br>
          
            
            <div>".$obj->getName()."</div>
            <div>EGP ".$obj->getPrice()."</div>
            <div class=viewDetails><a href=../controllers/sessionDetailsController.php?sessionDetailUid=".$obj->getUId().">view details</a></div>
            </div>";

        }
        echo"</div>";
        echo"</div>";

    }
    function showAdd($obj)
    {

    }
    //mian page shows all ads that are
    /*
    function showMainPage($listOfObjects)
    {
        include_once "header2.php";
        echo"<div class=photo>";
        foreach($listOfObjects as $obj)
        {
            //echo "hello";
            

            echo "<div class=images><img src=../".$obj->getPhoto()." width=200
            height=200>
            <br>
          
            
            <div>".$obj->getName()."</div><div><a href=../controllers/sessionDetailsController.php?sessionDetailUid=".$obj->getUId().">view details</a><br><a href=>Add to favorites</a></div>
            </div>";

        }
        echo"</div>";
        echo"</div>";

    }
    */
    function showAllFvorites($listOfObjects)
    {
        include_once "header2.php";
        echo"<div class=photo>";
        foreach($listOfObjects as $obj)
        {
            //echo "hello";
            

            echo "<div class=images><img src=../".$obj->getPhoto()." width=200
            height=200>
            <br>
          
            
            <div><b><h3>".$obj->getName()."</h3></b></div><div><a href=../controllers/sessionDetailsController.php?sessionDetailUid=".$obj->getUId()."><b>view details<br></a><a href=../controllers/favoritesController.php?uId=".$obj->getUId()."&msg=removeFav>Remove from favorites</a></b></div>
            </div>";

        }
        echo"</div>";
        echo"</div>";

    }
    function showAllSessionDetailsUserLogedIn($listOfObjects)
    {
        include_once "header2.php";
        echo"<div class=photo>";
        foreach($listOfObjects as $obj)
        {
            //echo "hello";
            

            echo "<div class=images><img src=../".$obj->getPhoto()." width=200
            height=200>
            <br>
          
            
            <div>".$obj->getName()."</div><div><a href=../controllers/sessionDetailsController.php?sessionDetailUid=".$obj->getUId().">view details</a><a href=../controllers/sessionDetailsController.php?uId=".$obj->getUId()."&msg=updateForm><br>Edit Ad</a> <a href=../delete.php?uId=".$obj->getUId()."> | Delete Ad</a></div>
            </div>";

        }
        echo"</div>";
        echo"</div>";
        //../updateAd.php
    }
    function showEachDetail($sessionDetailsObj,$userObj,$govObj)
    {
        $optionObj=new option();
        $id=$sessionDetailsObj->getId();
        echo"<div class=container>";

        echo "<div class=imgL><img src=../".$sessionDetailsObj->getPhoto()." width=300
        height=300>
        <br>
        
        </div>
        <div class=imgDesc>
        <h3>Product Info</h3>
       
        <b>Product Name:</b>".$sessionDetailsObj->getName()."<br><br>
        <b>Description:</b>".$sessionDetailsObj->getDescription()."<br><br>
        <b>Price:</b>".$sessionDetailsObj->getPrice()."<br><br>
        <b>Purchase Year:</b>".$sessionDetailsObj->getPurchaseYear()."<br><br>
        <b>Governorate:</b>".$govObj->getName()."<br><br>";
      
        $catObj=$sessionDetailsObj->getCatObj();
        $catId=$catObj->getId();
        $pId=$sessionDetailsObj->getId();
        $sessionDetailsId=$sessionDetailsObj->getId();
        //header("location:pCategoryOptionValueController.php?catId=$catId&pId=$pId&msg=showProperties");

       // echo"</div><div class=userInfo><h3> Properties:</h3>";
       
       $optionObj->showOption($catId,$sessionDetailsId);
       echo"<br><h3> Seller Info:</h3>
       Name :".$userObj->getFirstName()." ".$userObj->getLastName()."<br>
       Phone Number :".$userObj->getPhoneNum();

       echo"</div>";




   
       
       

    }
    function showEachDetailNotAddedToFav($sessionDetailsObj,$userObj,$govObj)
    {
        $optionObj=new option();
        
        echo"<div class=container>";

        echo "<div class=imgL><img src=../".$sessionDetailsObj->getPhoto()." width=300
        height=300>
        <br>
       <h2><a href=../controllers/favoritesController.php?msg=addToFav&sessionDetailsId=".$sessionDetailsObj->getId().">Add To Favorites</a></h2>
        </div>
        <div class=imgDesc>
        
        <h3>Product Info</h3>
        <b>Product Name:</b>".$sessionDetailsObj->getName()."<br><br>
        <b>Description:</b>".$sessionDetailsObj->getDescription()."<br><br>
        <b>Price:</b>".$sessionDetailsObj->getPrice()."<br><br>
        <b>Purchase Year:</b>".$sessionDetailsObj->getPurchaseYear()."<br><br>
        <b>Governorate:</b>".$govObj->getName()."<br><br>";
       
        $catObj=$sessionDetailsObj->getCatObj();
        $catId=$catObj->getId();
        $sessionDetailsId=$sessionDetailsObj->getId();
        $optionObj->showOption($catId,$sessionDetailsId);
        echo"<h3> Seller Info:</h3>
        Name :".$userObj->getFirstName()." ".$userObj->getLastName()."<br>
        Phone Number :".$userObj->getPhoneNum();
 
        echo"</div>";

   
       
       

    }
    function showEachDetailUserAdd($sessionDetailsObj,$userObj,$govObj)
    {
        $optionObj=new option();
        
        echo"<div class=container>";

        echo "<div class=imgL><img src=../".$sessionDetailsObj->getPhoto()." width=300
        height=300>
        <br>
        <h2>Your Ad</h2>
        </div>
        <div class=imgDesc>
        <h3>Product Info</h3>
        <b>Product Name:</b>".$sessionDetailsObj->getName()."<br><br>
        <b>Description:</b>".$sessionDetailsObj->getDescription()."<br><br>
        <b>Price:</b>".$sessionDetailsObj->getPrice()."<br><br>
        <b>Purchase Year:</b>".$sessionDetailsObj->getPurchaseYear()."<br><br>
        <b>Governorate:</b>".$govObj->getName()."<br><br>";
       
        $catObj=$sessionDetailsObj->getCatObj();
        $catId=$catObj->getId();
        $sessionDetailsId=$sessionDetailsObj->getId();
        $optionObj->showOption($catId,$sessionDetailsId);

        echo"<br><h3> Seller Info:</h3>
       Name :".$userObj->getFirstName()." ".$userObj->getLastName()."<br>
       Phone Number :".$userObj->getPhoneNum();

       echo"</div>";
    }
    function showEachDetailAddedToFav($sessionDetailsObj,$userObj,$govObj)
    {
        $optionObj=new option();
        
        echo"<div class=container>";

        echo "<div class=imgL><img src=../".$sessionDetailsObj->getPhoto()." width=300
        height=300>
        <br>
        <h2><a href=../controllers/favoritesController.php?uId=".$sessionDetailsObj->getUId()."&msg=removeFav>Remove From Favorites</a></h2>
        </div>
        <div class=imgDesc>
        <h3>Product Info</h3>
  <b>Product Name:</b>".$sessionDetailsObj->getName()."<br><br>
        <b>Description:</b>".$sessionDetailsObj->getDescription()."<br><br>
        <b>Price:</b>".$sessionDetailsObj->getPrice()."<br><br>
        <b>Purchase Year:</b>".$sessionDetailsObj->getPurchaseYear()."<br><br>
        <b>Governorate:</b>".$govObj->getName()."<br><br>";
        $catObj=$sessionDetailsObj->getCatObj();
        $catId=$catObj->getId();
        $sessionDetailsId=$sessionDetailsObj->getId();
        $optionObj->showOption($catId,$sessionDetailsId);
   
        echo"<br><h3> Seller Info:</h3>
        Name :".$userObj->getFirstName()." ".$userObj->getLastName()."<br>
        Phone Number :".$userObj->getPhoneNum();
 
        echo"</div>";
       

    }
    function showEachDetailSessionSet($sessionDetailsObj)
    {
        $optionObj=new option();
        
        echo"<div class=container>";

        echo "<div class=imgL><img src=../".$sessionDetailsObj->getPhoto()." width=300
        height=300>
        <br>
       
        </div>
        <div class=imgDesc>
        <h2>Product Info</h2>
        <h3>Product Name:</h3> ".$sessionDetailsObj->getName()."<br> 
        <h3>Description:</h3>".$sessionDetailsObj->getDescription()."
        <h3>Price:</h3>".$sessionDetailsObj->getPrice()."
        <h3>Purchase Year:</h3>".$sessionDetailsObj->getPurchaseYear();
       
        $catObj=$sessionDetailsObj->getCatObj();
        $catId=$catObj->getId();
        $sessionDetailsId=$sessionDetailsObj->getId();
        $optionObj->showOption($catId,$sessionDetailsId);

   
       
       

    }
    function showInsertForm($listGov,$listCat)
    {
        ?>
        <div class="centerAd">
       
        <h1>Post An Ad</h1>
        <form action=../controllers/sessionDetailsController.php?msg=postAd method="post">
          <div class="txt_field">
          <input type=text name=name required>
            <span></span>
            <label>Ad Name</label>
          </div>
          <div class="txt_field">
          
<div class="select">
   <select name="govId" id="format">
      <option selected disabled>Governorate</option>
      
      <?php
               
               foreach($listGov as $obj)
               {
                   echo"<option value=".$obj->getId().">".$obj->getName()."</option>";
       
               }      
             
            ?>

   </select>
              
</div>
          
            <span></span>
            
          </div>
          <div class="txt_field">
          
          <div class="select">
             <select name="catId" id="format">
                <option selected disabled>Category</option>
                
                <?php
                         
                 foreach($listCat as $obj)
                 {
                    echo"<option value=".$obj->getId().">".$obj->getName()."</option>";
                    

                 }
          
                      ?>
          
             </select>
                        
          </div>
                    
                      <span></span>
                      
                    </div>
          <div class="txt_field">
          <input type=number name=price required>
            <span></span>
            <label> Price</label>
          </div>
          <div class="txt_field">
          <input type=number name=purchaseYear min=1900  max=2099 step=1 required>
            <span></span>
            <label> Purchase Year</label>
          </div>
          <div class="txt_field">
          <label> Description</label><br><br><br><br>
          <textarea name=description rows=1 cols=50 > </textarea>
            <span></span>
            
          </div>
          <div class="txt_field">
          <label> choose an image</label><br><br><br>
         <input type=file  name=photo[] required>
            <span></span>
           
          </div>
          
          <input type="submit" value="Next">
         
        </form>
      </div>
      <?php

       
    /*
        <br><br>Price<br> <input type=number name=price>
<br><br>Purchase Year<br>

<input type=number name=purchaseYear min=1900  max=2099 step=1 />
   
<br><br>Description<br>
<textarea name=description rows=1 cols=50 > </textarea>


<br><br>Upload Image File Path
<input type=file  name=photo[]/>


<input type=submit value=Next>

</h3>
</form>";
*/
    }
    


    function showUpdateForm($sessionDetailObj,$listGov,$listCat,$govId,$catId)
    {
        $purchaseYear=$sessionDetailObj->getPurchaseYear();
        $desc=$sessionDetailObj->getDescription();
       // $catObj=$sessionDetailObj->getCatObj();
       // $catUId=$catObj->getUId();
       $sessionDetailUId=$sessionDetailObj->getUId();
       $name=$sessionDetailObj->getName();
       
       echo" <div class=centerAd>
       
        <h1>Post An Ad</h1>
        <form action=../controllers/sessionDetailsController.php?msg=updateAd&sessionDetailUId=$sessionDetailUId method=post>
          <div class=txt_field>
          <input type=text name=name value='$name'>
            <span></span>
            <label>Ad Name</label>
          </div>
          <div class=txt_field>
          
<div class=select>
   <select name=govId id=format>";
 
      
    
               
   foreach($listGov as $obj)
   {
       if($obj->getId()==$govId)
       {
           echo"<option selected value=".$obj->getId().">".$obj->getName()."</option>";

       }
       else
       {
           echo"<option value=".$obj->getId().">".$obj->getName()."</option>";

       }
     

   }    
             
            

   echo"</select>
              
</div>
         
            <span></span>
            
          </div>
          <div class=txt_field>
          
          <div class=select>
             <select name=catId id=format>
                <option selected disabled>Category</option>";
                
                
                         
                foreach($listCat as $obj)
                {
    
                    if($obj->getId()==$catId)
                    {
                        echo"<option selected value=".$obj->getId().">".$obj->getName()."</option>";
            
                    }
                    else
                    {
                        echo"<option value=".$obj->getId().">".$obj->getName()."</option>";
    
                    }
    
                   
    
                
    
                }
                      
          
           echo"  </select>
                        
          </div>
                    
                      <span></span>
                      
                    </div>
          <div class=txt_field>
          <input type=number name=price value=".$sessionDetailObj->getPrice().">
            <span></span>
            <label> Price</label>
          </div>
          <div class=txt_field>
          <input type=number name=purchaseYear value=$purchaseYear min=1900  max=2099 step=1>
            <span></span>
            <label> Purchase Year</label>
          </div>
          <div class=txt_field>
          <label> Description</label><br><br><br><br>
          <textarea name=description rows=1 cols=50 >".$desc." </textarea>
            <span></span>
            
          </div>
          <div class=txt_field>
          <label> choose an image</label><br><br><br>
         <input type=file  name=photo[] required>
            <span></span>
           
          </div>
          
          <input type=submit value=Next>
         
        </form>
      </div>";
      
        
        

  }


}
?>




