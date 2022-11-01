<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<?php include 'head.php';?>
</head>

<body>
        <?php include 'header.php';?>
       <!--  ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'sidebar.php';?>
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
      
        <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Product Table</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <!-- Table Produit  -->
        <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                        <h3 class="box-title">Product   Table</h3>
                        <div class="justify-content-end ">    <?php include 'modal/modal-add-product.php';?>  </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">Elite admin</td>
                                            <td>SALE</td>
                                            <td><span class="text-success">$24</span></td>
                                        
                                            <td class="txt-oflo">April 18, 2021</td>
                                            <td class="p-1"> <img src="plugins/images/users/1-old.jpg" height="100px" width="100" class="img-fluid img-thumbnail " >  </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">Elite admin</td>
                                            <td>SALE</td>
                                            <td><span class="text-success">$24</span></td>
                                            
                                            <td class="txt-oflo">April 18, 2021</td>
                                            <td class="p-1"> <img src="plugins/images/users/1.jpg" height="100px" width="100" class="img-fluid img-thumbnail " >  </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td class="txt-oflo">Elite admin</td>
                                            <td>SALE</td>
                                            <td><span class="text-success">$24</span></td>
                                        
                                            <td class="txt-oflo">April 18, 2021</td>
                                            <td class="p-1"> <img src="plugins/images/users/2.jpg" height="100px" width="100" class="img-fluid img-thumbnail " >  </td>
                                        </tr>
                                
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
         <?php include 'footer.php';?>     
</body>

</html>