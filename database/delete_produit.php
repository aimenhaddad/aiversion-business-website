<?php

 include_once "../database/conn.php";

if(isset($_GET['ID_Pro']) && isset($_GET['path'])) {
    $me="";

    $filePath=$_GET['path'];
    $ID_Pro=$_GET['ID_Pro'] ;
    if (file_exists($filePath)) {
        unlink($filePath);
    	// Execute query	  
            if ($produit->delete($ID_Pro)){	
                $me="delete done"; 	
            } else {					
                $me="delete failde"; 				
            }

        }else {
       
        $me="no delete local";
    }
   header("Location:../index.php? $me");
}




?>