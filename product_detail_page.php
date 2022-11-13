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

// True because $a is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$sql = "SELECT * FROM produits WHERE ID_Pro =".$id ;

$result = $conn->query($sql);



}


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
        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet"/>

        <!-- Core theme CSS (includes Bootstrap)-->
         <link rel="stylesheet" href="css/bootstrap.min.css">
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
            </nav>
        <!-- Page header with logo and tagline-->
 
        <!-- Page content-->
        <div class="container">

            <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                ?>
            <div class="row">
               
                <!-- Side widgets-->
                <div class="col-lg-6 my-2">
                    <!-- Search widget-->
                 
                        <div class="mx-3 h1"><b ><?php echo $row["Name_Pro"]?></b></div>
                        <div class="mx-3 text-success "><span class=" h2" ><?php echo $row["Price"]?> DA</span></div>
                
                        
                    <div class="card-body">
                        <form  action="database/insert_order.php" method="post" class="well form-horizontal">
                                <input name="Name_Pro" type="hidden" value="<?php echo $row["Name_Pro"]?>"/> 
                                <input name="Price" type="hidden" value="<?php echo $row["Price"]?>"/> 
                                <input name="shipping" type="hidden" value="0"/> 
                                <input name="id" type="hidden" value="<?= $id?>"/> 
                                

                                <div class="row">

                                   <div class="form-group mb-2 col-md-6">
                                    <label class="control-label">Full Name</label>
                                      <div class=" inputGroupContainer">
                                         <div class="input-group-prepend"><input id="fullName"  type="text" name="Name_Client" placeholder="Full Name" class="form-control" required="true" value=""></div>
                                      </div>
                                   </div>

                                   <div class="form-group mb-2 col-md-6">
                                    <label class="control-label">Phone</label>
                                      <div class=" inputGroupContainer">
                                         <div class="input-group-prepend">
                                            <input id="phone"type="text"  name="Phone_Client" placeholder="Phone" class="form-control" required="true" value="" >
                                        </div>
                                      </div>
                                   </div>

                                </div>
                                <div class="row">

                                    <div class="form-group mb-3 col-md-8 ">
                                        <select name ="City" class="form-control "   style="width: 100%;" >
                                                    <option value="Adrar">1-Adrar</option> 
                                                    <option value="Chlef">2-Chlef</option> 
                                                    <option value="Laghouat">3-Laghouat  </option> 
                                                    <option value="Oum El Bouaghi ">4-Oum El Bouaghi </option> 
                                                    <option value="Batna ">5-Batna </option> 
                                                    <option value="Bejaia">6-Bejaia</option> 
                                                    <option value="Biskra">7-Biskra</option> 
                                                    <option value="Bechar">8-Bechar</option> 
                                                    <option value="Blida ">9-Blida </option> 
                                                    <option value="Bouira">10-Bouira</option> 
                                                    <option value="Tamanrasset">11-Tamanrasset</option> 
                                                    <option value="Tebessa ">12-Tebessa </option> 
                                                    <option value="Tlemcen ">13-Tlemcen </option> 
                                                    <option value="Tiaret  ">14-Tiaret  </option> 
                                                    <option value="Tizi Ouzou  ">15-Tizi Ouzou  </option> 
                                                    <option value="Algiers ">16-Algiers </option> 
                                                    <option value="Djelfa  ">17-Djelfa  </option> 
                                                    <option value="Jijel   ">18-Jijel   </option> 
                                                    <option value="Setif">19-Setif   </option> 
                                                    <option value="Saida   ">20-Saida   </option> 
                                                    <option value="Skikda  ">21-Skikda  </option> 
                                                    <option value="Sidi Bel Abbes ">22-Sidi Bel Abbes </option> 
                                                    <option value="Annaba  ">23-Annaba  </option> 
                                                    <option value="Guelma  ">24-Guelma  </option> 
                                                    <option value="Constantine ">25-Constantine </option> 
                                                    <option value="Medea">26-Medea</option> 
                                                    <option value="Mostaganem  ">27-Mostaganem  </option> 
                                                    <option value="MSila">28-MSila</option> 
                                                    <option value="Mascara     ">29-Mascara     </option> 
                                                    <option value="Ouargla     ">30-Ouargla     </option> 
                                                    <option value="Oran ">31-Oran </option> 
                                                    <option value="El Bayadh   ">32-El Bayadh   </option> 
                                                    <option value="Illizi             ">33-Illizi             </option> 
                                                    <option value="Bordj Bou Arreridj ">34-Bordj Bou Arreridj </option> 
                                                    <option value="Boumerdes     ">35-Boumerdes     </option> 
                                                    <option value="El Tarf       ">36-El Tarf       </option> 
                                                    <option value="Tindouf       ">37-Tindouf       </option> 
                                                    <option value="Tissemsilt    ">38-Tissemsilt    </option> 
                                                    <option value="El Oued       ">39-El Oued       </option> 
                                                    <option value="Khenchela     ">40-Khenchela     </option> 
                                                    <option value="Souk Ahras    ">41-Souk Ahras    </option> 
                                                    <option value="Tipaza        ">42-Tipaza        </option> 
                                                    <option value="Mila          ">43-Mila          </option> 
                                                    <option value="Ain Defla     ">44-Ain Defla     </option> 
                                                    <option value="Naama         ">45-Naama         </option> 
                                                    <option value="Ain Temouchent">46-Ain Temouchent</option> 
                                                    <option value="Ghardaia      ">47-Ghardaia      </option> 
                                                    <option value="Relizane      ">48-Relizane      </option> 
                                                    <option value="El MGhair     ">49-El MGhair     </option> 
                                                    <option value="El Menia      ">50-El Menia      </option> 
                                                    <option value="Ouled Djellal ">51-Ouled Djellal </option> 
                                                    <option value="Bordj Baji Mokhtar ">52-Bordj Baji Mokhtar </option> 
                                                    <option value="Beni Abbes         ">53-Beni Abbes         </option> 
                                                    <option value="Timimoun           ">54-Timimoun           </option> 
                                                    <option value="Touggourt          ">55-Touggourt          </option> 
                                                    <option value="Djanet             ">56-Djanet             </option> 
                                                    <option value="In Salah           ">57-In Salah           </option> 
                                                    <option value="In Guezzam         ">58-In Guezzam         </option> 
                                        </select>
                                    </div>
                                    
                                    <div class="form-group  col-md-4">
                                        <button  class="quantity-left-minus btn btn-danger btn-number btn-sm"  data-type="minus" data-field=""> <i class="fa fa-minus" style="font-size:16px"></i> </button>
                                        <input type="number" id="quantity" name="Qte" class="input-number" value="1" min="1" max="100" style="font-size:17px" >
                                        <button  class="quantity-right-plus btn btn-success btn-number btn-sm" data-type="plus" data-field="" ><i class="fa fa-plus" style="font-size:16px"></i></button>
                                    </div>
                                </div> 
                                   <div class="text-center">
                                    <button  class="btn btn-outline-primary  col-12 " type="submit">Order Now!</button>
                                   </div>
                                  
                            </form>  
                    </div>
                    <div class="">
                        <div class=" text-muted  mx-3 h4">Description</div>
                        <p class="card-text mx-4 h6"><?php echo $row["Description_Pro"]?></p>
                    </div>
                </div>
                
                 <!-- Blog entries-->
                 <div class="col-lg-6 my-2">

                        <img class="card-img-top "  src="database/upload/<?php echo $row["image"]?>" height="400px" width="400px"  alt="..." />
                </div>
            </div>
                             <?php 
                 }}?>  
        </div>
        
        
        <!-- Footer -->
        <footer class="page-footer font-small bg-dark text-white-50 fixed-bottom">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright: Skycode-dz 2022</div>
        <!-- Copyright -->
        </footer>
        <!-- Footer -->
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script >
            $(document).ready(function(){
            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){    
                    // Stop acting like a button
                    e.preventDefault();
                    // Get the field name
                    var quantity = parseInt($('#quantity').val());
                    
                    // If is not undefined
                        
                        $('#quantity').val(quantity + 1);

                    
                        // Increment
                    
                });

                $('.quantity-left-minus').click(function(e){
                    // Stop acting like a button
                    e.preventDefault();
                    // Get the field name
                    var quantity = parseInt($('#quantity').val());
                    
                    // If is not undefined
                
                        // Increment
                        if(quantity>1){
                        $('#quantity').val(quantity - 1);
                        }
                });
                
            });
        </script>
    </body>
</html>
