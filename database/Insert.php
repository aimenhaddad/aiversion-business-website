<?php 
    include_once 'conn.php';	
	if(isset($_POST['Insert'])){ 

	
	$namePro = htmlspecialchars($_POST['namePro']);
	$price = htmlspecialchars($_POST['price']);
	$descriptionPro = htmlspecialchars($_POST['descriptionPro']);
	
	$file=$_FILES['image'];
    $img = array();
	$i=0;
	foreach ($file['tmp_name'] as $key => $value) {
    $tmpname = $file['tmp_name'][$key];
    $Name    =$file['name'][$key];
    $Error   =$file['error'][$key];
    $Size    =$file['size'][$key];
  
    if ($error === 0) {
		if ($file_Size > 20000000) {
			header("Location:../index.php? Sorry, your file is too large."); 
		 }else {
			$file_upload_path = 'uploads/'.$nom;
			move_uploaded_file($tmpname,$file_upload_path);
			$img[$i]=$nom; 
			$i++;
				
	  	}
	}else {
      header("Location:../index.php  unknown error occurred"); 
    }
	}
		// Insert into Databa
    	// Execute query	
		if ($produit->create($namePro, $descriptionPro,$img[0],$price)){	
			header("Location:../index.php?id=  done "); 	
		} else {					
			header("Location:../index.php?id=  failde "); 			
		}	
			
	}
	
	


?>