<?php 
    include_once 'conn.php';	
	if(isset($_POST['upstate']) ){ 

	$Id_Client = htmlspecialchars($_POST['Id_Client']);
	$state = htmlspecialchars($_POST['state']);

	if ($produit->updateStatusOrder($Id_Client, $state)){	
		header("Location:../orders-table.php?id=  done "); 	
	} else {					
		header("Location:../orders-table.php?id=  failde "); 			
	}	
	}
?>