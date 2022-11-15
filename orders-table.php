<?php 
include_once "database/conn.php";
$stmt =$conn->prepare($produit->datavieworder());
$stmt->execute();
?>

<!DOCTYPE html>
<html dir="ltl" lang="en">

<head>
    <?php include 'head.php';?>
<title>Admin</title>

</head>

<body>
    <?php include 'header.php';?>
  <?php include 'sidebar.php';?>
        
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
      
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Orders </h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
   
       
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Order</h3>
                        
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Full Name</th>
                                            <th class="border-top-0">Phone Number</th>
                                            <th class="border-top-0">Quantity</th>
                                            <th class="border-top-0">Price</th>
                                            <th class="border-top-0">Product</th>
                                            <th class="border-top-0">City</th>
                                            <th class="border-top-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                     if($stmt->rowCount()>0){
                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ 
                                            if($row['State']==1){
                                                $stylec="color:#f0ad4e ";
                                            }elseif($row['State']==2){
                                                  $stylec="color:#5cb85c";   
                                                }else{
                                                  $stylec="color:#d9534f";   
                                                }
                                            ?>
                                        <tr >
                                            <td><?php echo $row['Id_Client']?></td>
                                            <td><?php echo $row['Name_Client']?></td>
                                            <td><?php echo $row['Phone_Client']?></td>
                                            <td><?php echo $row['Qte']?></td>
                                            <td><?php echo $row['Price']?></td>
                                            <td><?php echo $row['Name_Pro']?></td>
                                            <td><?php echo $row['City']?></td>
                                           
                                            <td> 
                                            <form method="POST" action="database/modify_orders.php">
                                                <input type="hidden" name="Id_Client" value="<?php echo $row['Id_Client']?>">
                                         
                                            <select name="state" style="<?=$stylec?>" >
                                             <?php $produit->Statuview($row['State']);  ?>
                                            </select>  
                                            <input type="submit" class="btn btn-text  text-sm"  name="upstate" value="save" style="<?=$stylec?>"/>
                                       
                                            </form>
                                            </td>

                                        </tr>
                                        <?php }}?>
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