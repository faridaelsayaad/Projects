<?php
class pCatOptionValueView
{
   function showForm($object)
   {
    echo" <form action=pcategoryoptionvalueController.php?msg=postAd method=POST>
    Ad Name<br> <input type=text name=name><br><br>

    

    </form>";
   }
   function showProperties($optionObj,$pCOVObj)
   {

   }


}



?>