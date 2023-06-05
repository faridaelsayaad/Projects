<?php
include_once "helper.php";

    $conn=db::getConnection();
    $sql="select * from productCategoryOption where productCategoryId=1";
    echo $sql;
    echo"<br>";
// $sql="select * from productCategoryOption where productCategoryId=".$catId;
    $result=$conn->query($sql);
    echo $result->num_rows;
    echo "<br>";
    while($row1=$result->fetch_assoc())
    {
        echo $row1["id"];
        //echo $row1["optionId"];
    // echo "please I'm almost done";
    /*
        $sql="select * from option where id=".$row1["optionId"];
        $result=$conn->query($sql);
        $optionObj=$result->fetch_assoc();
        echo $optionObj["attribName"];
        */

    }
?>