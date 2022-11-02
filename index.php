<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<?php include 'head.php';?>


</head>

<body>
        <?php include 'header.php' ;?>
       <!--  ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'sidebar.php';?>
<?php include_once 'database/Insert.php' ;?>

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
                        <div class="justify-content-end ">  
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >+</button> 
                             </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
       
                                        	<?php
                                             include_once 'database/conn.php';
                                              $produit->dataview();
                                               ?>
            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" action="database/Insert.php" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name  Product</label>
            <input type="text" placeholder="First name"  name="namePro" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price</label>
            <input type="text" placeholder="Price" name="price" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <input type='file' name='image[]'    required  multiple accept=".jpg, .png, .jpeg" class="form-control-file">
         </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">	Description</label>
            <textarea class="form-control" name="descriptionPro" id="message-text"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="Insert" value="Save"/>
      </div>
    </form>
    </div>
  </div>
</div>

         <?php include 'footer.php';?>     
</body>

</html>