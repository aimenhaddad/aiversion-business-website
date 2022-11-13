<?php
 include_once "conn.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Name_Client  = htmlspecialchars($_POST["Name_Client"]);
  $Phone_Client = htmlspecialchars($_POST["Phone_Client"]);
  $Qte          = htmlspecialchars( $_POST["Qte"]);
  $Name_Pro     = htmlspecialchars($_POST["Name_Pro"]);
  $State        = htmlspecialchars( $_POST["State"]);
  $City         = htmlspecialchars($_POST["City"]);
  $Price        = htmlspecialchars( $_POST["Price"]);
  $shipping     = htmlspecialchars($_POST["shipping"]);
  $id           = htmlspecialchars($_POST["id"]);
  $State        = 1 ;
  if (empty($Name_Client) || empty($Phone_Client )  ) {
    header("Location:../product_detail_page.php?id=$id&Error=champ name or phone can't be empty ");
    exit() ;
  }
  if (empty($Name_Pro) || empty($City) || empty($Price) ) {
    
    header("Location:../product_detail_page.php?id=$id&Error=error");
    exit() ;
  }
  if ($Qte==0) {
    header("Location:../product_detail_page.php?id=$id&Error= $Qte quantity can't be 0 ");
    exit() ;
  }
  

  if ($produit->createOrder($Name_Client,$Phone_Client,$Qte,$Name_Pro,$State,$City, $Price, $shipping)){	
    header("Location:../product_detail_page.php?id=$id&Success=Add Success "); 	
  } else {					
    header("Location:../product_detail_page.php?id=$id&Error=failde "); 			
  }	

}


$conn->close();
?>