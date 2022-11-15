<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skycode_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM produits";
$result = $conn->query($sql);



$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />  
        <meta name="author" content="" />
        <title>Skycode-dz Shop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="css/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/logo.svg" width="100" height="30" class="d-inline-block align-top" alt="">
                </a>
                <div>
                    <form class="form-inline my-2 my-lg-0 ">
                        <div>
                            <span>  Skycode-dz Shop</span>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Skycode-dz Shop</h1>
                    <p class="lead fw-normal text-white-50 mb-0">The best from the best</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container  px-lg-5 mt-5">
                <div class="row justify-content-center">

                <?php
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-sm-12 col-md-4 col-xl-3 mb-5 ">
                        <div class="card h-100  rounded-2 ">
                            <!-- Product image-->
                            <img class="card-img-top  border border-1 border-dark " src="database/upload/<?php echo $row["image"]?>" height="250px"  alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h4 ><?php echo $row["Name_Pro"]?></h4>
                                    <!-- Product price-->
                                   <span class="h5"style="color:#1fd566;"> <?php echo $row["Price"]?> DA</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                              <div class="text-center"><a class="btn btn-outline-primary mt-auto  " style="border-radius: 25px;"  href="product_detail_page.php?id=<?php echo  $row["ID_Pro"] ?>"> Order Now!</a></div>
                            </div>
                        </div>
                    </div>
                 <?php 
                 }}?>   
                </div>
            </div>
        </section>
  

        <!-- Footer -->
        <footer class="page-footer font-small bg-dark text-white-50 fixed-bottom">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright: Skycode-dz 2022</div>
        <!-- Copyright -->
        </footer>
        <!-- Footer -->
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
