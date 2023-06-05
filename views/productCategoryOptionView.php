<html>
<head>
    

  <link rel="stylesheet" href="../views/styleForm.css">
</head>
<?php

class productCategoryOptionView
{
     function showForm($optionList,$catUId,$sessionDetailUId)
    {
        $i=0;
        $listObjects=array();

       echo" <div class=center>
        
      
      
        <h1>Ad properties</h1>
        <form action=../controllers/pCategoryOptionValueController.php?msg=insert&catUId=$catUId&sessionDetailUId=$sessionDetailUId method=post>";
       
        foreach($optionList as $obj)
        {
            
           echo" <div class=txt_field>
           <input type=text name=name".$i." required>
              <span></span>
              <label>".$obj->getAttribName()."</label>
            </div>";
        
            $i++;
          
            

        }
    ?>
         
          <div class="pass"></div>
          <input type="submit" value="Post">
          <div class="signup_link">
           
          </div>
        </form>
      </div>
      <?php
       // productId=$productId&pcatOptionId=$pcatOptionId
       
  





    }
    
    function showUpdateForm($optionList,$catUId,$sessionDetailUId,$pCOVList)
    {
        $i=0;
        $listObjects=array();
        echo" <div class=center>
        
      
      
        <h1>Ad properties</h1>
        <form action=pCategoryOptionValueController.php?msg=update&catUId=$catUId&sessionDetailUId=$sessionDetailUId  method=post>";
       
        foreach($optionList as $obj)
        {
            
            $pObj=$pCOVList[$i];
            $val=$pObj->getValue();
           echo" <div class=txt_field>
           <input type=text name=name".$i." value=$val>
              <span></span>
              <label>".$obj->getAttribName()."</label>
            </div>";
        
            $i++;
          
            

        }
    ?>
         
          <div class="pass"></div>
          <input type="submit" value="Post">
          <div class="signup_link">
           
          </div>
        </form>
      </div>
      <?php

       

    }

    
}


?>