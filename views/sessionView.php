<html>
    <head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="../views/styleTable.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
</html>
<?php
include_once "header2.php";

class sessionView
{

    function showAll($objects)
    {
        $id=6;

        echo"
        <table>
        <tr id=header>
            <th>Session Date</th>
  
        </tr>";
        foreach($objects as $obj)
        {
          // $Id= $obj->getUId();
          //$date=date('y-m-d h:i:s');
          

          //$value=md5($id.$date);
         // echo $value;
         // $id+=2;
         // echo"<br>".$id;
       
    
      echo"
      <tr>
     
      <td> <a href=../controllers/sessionDetailsController.php?sessionUId=".$obj->getUId().">".$obj->getDate()."</a></td>
   
  </tr>";
    
     }
     echo "</table>";
   
         
    }

}
?>

