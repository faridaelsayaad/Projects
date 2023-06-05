<?php
include_once "../models/helper.php";

/*
    function getFeatures($catId,$productId)
    {
        $conn=db::getConnection();
        $sql="select * from productCategoryOption where productCategoryId=1";
        echo $sql;
        echo"<br>";
       // $sql="select * from productCategoryOption where productCategoryId=".$catId;
        $result=$conn->query($sql);

        while($row1=$result->fetch_assoc())
        {
            echo $row1["id"];
            //echo $row1["optionId"];
          
            $sql="select * from option where id=".$row1["optionId"];
            $result=$conn->query($sql);
            $optionObj=$result->fetch_assoc();
            echo $optionObj["attribName"];

        }


    }
 */
class option
{
    function showOption($catId,$pId)
    {
        
        $conn=db::getConnection();
        $sql="select * from productCategoryOption where productCategoryId=".$catId;
     
       // $sql="select * from productCategoryOption where productCategoryId=".$catId;
        $result=$conn->query($sql);

        echo"</div><div class=userInfo><h3> Properties:</h3>";
        while($row1=$result->fetch_assoc())
        {
                  
            $sql="select * from option where id=".$row1["optionId"];
            $result2=$conn->query($sql);
            $optionObj=$result2->fetch_assoc();
            echo "<b>".$optionObj["attribName"].": ";

            $sql="select * from pcategoryoptionvalue where pCOID=".$row1["id"]." and pId=$pId";
           // echo $sql;
            $result3=$conn->query($sql);
            $valueObj=$result3->fetch_assoc();
            echo $valueObj["value"]."<br>";



        }
       


    }
}


?>