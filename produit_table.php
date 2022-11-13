<?php 
include_once "database/conn.php";
 $query = "SELECT  ID_Pro,Name_Pro, Description_Pro, image, Price FROM produits ";
 $stmt =$conn->prepare($query);
 $stmt->execute();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<?php include 'head.php';?>
</head>
produit_table
<body>
  <?php include 'header.php' ;?>    
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
                        <h4 class="page-title">Product </h4>
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
                        <h3 class="box-title">Product </h3>
                        <div class="justify-content-end ">  
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModaladd" >+</button> 
                             </div>
                            <div class="table-responsive">
                                <table class="table " >
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
                      if($stmt->rowCount()>0){
                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ 
                          ?>
                            <tr >
                                <td><?php echo $row['ID_Pro']?></td>
                                <td><?php echo $row['Name_Pro']?></td>
                                <td ><p   class="lead"><?php echo $row['Description_Pro']?></p></td>
                                <td><?php echo $row['Price']?></td>
                                <td style="display:none;"><?php echo $row['image']?></td>
                                <td class="p-1" class="Modaledit"><img src="database/upload/<?php echo $row['image']?>" height="100px" width="100px"  >  </td>
                               
                                <td>
                                <button type="button" class="btn btn-primary modaledit" data-toggle="modal" ><i class="fas fa-pencil-alt"></i></button>  
                                <a class="btn btn-danger" href="database/delete_produit.php?ID_Pro=<?=$row['ID_Pro'];?>&path=upload/<?php echo $row['image']?>" ><i class='fa fa-trash' ></i></i></a>
                                
                                
                              </td>
                            </tr>


                            <?php }
                          }?>
                                                                
            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
  <!-- Modal EDIT-->
  <div class="modal fade" id="modaledi" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title w-100 font-weight-bold">Modify</h5>
      </div>
     
<div class="modal-body mx-3">
      <form  method="POST" action="database/modify_produit.php" enctype="multipart/form-data" >
          <input type="hidden" name="ID_Pro" id="ID_Pro">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name  Product</label>
            <input type="text" required placeholder="First name" id="namePro" name="namePro" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price</label>
            <input  type="number"  required placeholder="Price" id="price" name="price" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
          <input type="hidden" name="image" id="image">
            <input type='file' name='fil'     accept=".jpg, .png, .jpeg" class="form-control-file">
         </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">	Description</label>
            <textarea class="form-control" required name="descriptionPro" id="descriptionPro" id="message-text"></textarea>
          </div>
        
      </div>
      <div class="modal-footer ">
        <button type="submit" class="btn btn-primary" name="save" >save</button>
        <button type="button" class="btn btn-danger dismissm" data-dismiss="modal">Close</button>
      </div>
   </form>
   </div>
  </div>
  </div>
</div>
        <!-- Modal -->
<div class="modal fade" id="exampleModaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" action="database/Insert.php" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name  Product</label>
            <input type="text" required placeholder="First name"  name="namePro" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price</label>
            <input type="number" required placeholder="Price" name="price" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <input type='file' name='fil'    required   accept=".jpg, .png, .jpeg" class="form-control-file">
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
<script> 
  $(document).ready(function(){

  $(".modaledit").click(function(){
    $("#modaledi").modal("show");

    $tr=$(this).closest('tr');
    var data =$tr.children("td").map(function(){
     return $(this).text();
    }).get();
         
    $('#ID_Pro').val(data['0']);
    $('#namePro').val(data['1']);
    $('#descriptionPro').val(data['2']);
    $('#price').val(data['3']);
    $('#image').val(data['4']);
  });

});


</script>
       
</body>
</html>