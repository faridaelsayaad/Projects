<?php
include_once "headerController.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../views/styleTable.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


class adminView
{
    function showAdminPermissions()
    {
        ?>
        <table>
        <tr id="header">
            <th><a href=../controllers/adminController.php?command=showCatPermissions>Categories</a></th>
            <th><a href=../controllers/adminController.php?command=showGovPermissions>Governorates</a></th>
            <th><a href=../controllers/adminController.php?command=showOptionPermissions>Options</a></th>
          
        </tr>

    </table>
  <?php
    }

    function showCatPermissions()
    {
        ?>
        <table>
        <tr id="header">
            <th><a href=../controllers/categoryController.php?command=showInsertForm>Add a new Category</a></th>
            <th><a href=../controllers/categoryController.php?command=showCatToUpdate>Update Categories</a></th>
            <th><a href=../controllers/categoryController.php?command=showCatToDelete>Delete Categories</a></th>
          
        </tr>

    </table>
  <?php
     

    }
    function showGovPermissions()
    {
        ?>
        <table>
        <tr id="header">
            <th><a href=../controllers/governorateController.php?command=showInsertForm>Add a new governorate</a></th>
            <th><a href=../controllers/governorateController.php?command=showGovToUpdate>Update governorates</a></th>
            <th><a href=../controllers/governorateController.php?command=showGovToDelete>Delete governorates</a></th>
          
        </tr>

    </table>
  <?php
  
  
    }
    function showOptionPermissions()
    {
        ?>
        <table>
        <tr id="header">
            <th><a href=../controllers/optionController.php?command=showInsertForm>Add a new Option</a></th>
            <th><a href=../controllers/optionController.php?command=showOptionsToUpdate>Update options</a></th>
            <th><a href=../controllers/optionController.php?command=showOptionsToDelete>Delete options</a></th>
            <th><a href=../controllers/pCategoryOptionController.php?command=showCategories&extraCommand=addToCat>Ad an option to a Category</a></th>
            <th><a href=../controllers/pCategoryOptionController.php?command=showCategories&extraCommand=delFromCat>Delete an Option From a Category</a></th>

        </tr>

    </table>
    <?php
    }
}
?>