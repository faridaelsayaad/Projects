<?php
include_once "../db.php" ;

$sql="SELECT * From category";
$resultDataset=$conn->query($sql);
?>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
                    
                </div>
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
               
                
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
               
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                <?php
                while($row=$resultDataset->fetch_assoc())
                {
                
                ?>
                        <a href="" class="nav-item nav-link"><?php echo $row["name"] ?></a>
                     
                        <?php
                }


?>
   
                    </div>
                   
             </nav>
               
            </div>

    







