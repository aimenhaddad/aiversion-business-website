<?php 
    include_once 'conn.php';	
	if(isset($_POST['Insert']) && isset($_FILES['fil']) ){ 
		
		
	$namePro = htmlspecialchars($_POST['namePro']);
	$price = htmlspecialchars($_POST['price']);
	$descriptionPro = htmlspecialchars($_POST['descriptionPro']);
	if(empty($namePro) ){
			header("Location:../index.php?Error=champ name can't be empty ");
			exit() ;
	}
	if(empty($price) ){
			header("Location:../index.php?Error=champ price can't be empty "); 
			exit();
	}
	$img_name = $_FILES['fil']['name'];
    $img_size = $_FILES['fil']['size'];
    $tmp_name = $_FILES['fil']['tmp_name'];
    $error = $_FILES['fil']['error'];
  
    if ($error === 0) {
		if ($file_Size > 20000000) {
			header("Location:../index.php?Error=Sorry, your file is too large."); 
		 }else {
			  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			  $img_ex_lc = strtolower($img_ex);
	  
			  $new_img_name =$namePro.".".$img_ex_lc;
			  $img_upload_path = 'upload/'.$new_img_name;
			  move_uploaded_file($tmp_name, $img_upload_path);
			  // Insert into Databa
				// Execute query	
				if ($produit->create($namePro, $descriptionPro,$new_img_name,$price)){	
					header("Location:../index.php?Success=Add Success "); 	
				} else {					
					header("Location:../index.php?Error=failde "); 			
				}	
	  	}
	}else {
      header("Location:../index.php?Error=unknown error occurred"); 
    }
	}
		
			
	
	
	


?>