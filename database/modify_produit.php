<?php 
    include_once 'conn.php';	
	if(isset($_POST['save']) && isset($_FILES['fil'])){ 
    $ID_Pro=$_POST['ID_Pro'] ;
	$namePro = "";
	$price = "";
	$descriptionPro = "";
    $image = "";
    $new_img_name="";
    $image = htmlspecialchars($_POST['image']);
	$namePro = htmlspecialchars($_POST['namePro']);
	$price = htmlspecialchars($_POST['price']);
	$descriptionPro = htmlspecialchars($_POST['descriptionPro']);
	
	$img_name = $_FILES['fil']['name'];
    $img_size = $_FILES['fil']['size'];
    $tmp_name = $_FILES['fil']['tmp_name'];
    $error = $_FILES['fil']['error'];
    echo " ".$img_name;
    echo " ".$image;
if (!empty($img_name)) {
    if ($error === 0) {
		if ($file_Size > 20000000) {
			header("Location:../index.php? Sorry, your file is too large."); 
		 }else {
			  $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			  $img_ex_lc = strtolower($img_ex);

			  $new_img_name =$namePro.".".$img_ex_lc;
			  $img_upload_path = 'upload/'.$new_img_name;
			  move_uploaded_file($tmp_name, $img_upload_path);
            
              $filePath='upload/'.$image;
              if (file_exists($filePath)) {
              unlink($filePath);  }
			}
	  
	}else {
            header("Location:../index.php  unknown error occurred"); 
    }
	}else{
        $new_img_name=$image;
    }
     // Insert into Databa
				// Execute query	
				if ($produit->update($ID_Pro,$namePro, $descriptionPro,$new_img_name,$price)){	
					header("Location:../index.php?id=  done "); 	
				} else {					
					header("Location:../index.php?id=  failde "); 			
				}	

	}
		
			
	
	
	


?>