<?php

class Produits{
    private $db;


public function __construct($conn){
    $this->db = $conn;
}




    public function create($namePro, $descriptionPro,$imagePro,$price){
    try{
        $stmt = $this->db->prepare("INSERT INTO produits( Name_Pro, Description_Pro, image, Price)
        VALUES ( :namePro, :descriptionPro ,:imagePro,:price)");
        $stmt->bindparam(":namePro",$namePro);
        $stmt->bindparam(":descriptionPro",$descriptionPro);
        $stmt->bindparam(":imagePro",$imagePro);
        $stmt->bindparam(":price",$price);
        $stmt->execute();
        return true;
        }catch(PDOException $e){
        echo 'Error : '. $e->getMessage();
        return false;
        }
    }
    
  

    public function getID($ID_Pro){
    $stmt = $this->db->prepare("SELECT Name_Pro, Description_Pro, image, Price FROM produits WHERE ID_Pro =:ID_Pro ");
    $stmt->execute(array(":ID_Pro "=>$ID_Pro ));
    $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
    return $editRow;
    }






    public function update($ID_Pro,$namePro, $descriptionPro,$imagePro,$price){
    
        try{
        $stmt = $this->db->prepare("UPDATE produits SET Name_Pro=:namePro,Description_Pro=:descriptionPro,image=:imagePro,Price=:price WHERE ID_Pro=:ID_Pro");
        $stmt->bindparam(":namePro",$namePro);
        $stmt->bindparam(":descriptionPro",$descriptionPro);
        $stmt->bindparam(":imagePro",$imagePro);
        $stmt->bindparam(":price",$price);
        $stmt->bindparam(":ID_Pro",$ID_Pro);
        $stmt->execute();
        return true;
        }catch(PDOException $e){
        echo 'Error : '. $e->getMessage();
        return false;
        }
    }



    public function delete($ID_Pro){
            $stmt = $this->db->prepare("DELETE FROM produits WHERE ID_Pro=:ID_Pro");
            $stmt->bindparam(":ID_Pro",$ID_Pro);
            $stmt->execute();
            return true;
        
    }





    public function dataview(){
            $query = "SELECT  ID_Pro,Name_Pro, Description_Pro, image, Price FROM produits ";
            $stmt =$this->db->prepare($query);
            $stmt->execute();
            return $stmt;
    }



   
    public function createOrder($Name_Client,$Phone_Client,$Qte,$Name_Pro,$State,$City, $Price, $shipping){
    try{
        $stmt = $this->db->prepare("INSERT INTO orders(Name_Client,Phone_Client,Qte,Name_Pro,State,City, Price, shipping) VALUES 
         (:Name_Client, :Phone_Client ,:Qte,:Name_Pro,:State,:City,:Price,:shipping)");
        $stmt->bindparam(":Name_Client",$Name_Client);
        $stmt->bindparam(":Phone_Client",$Phone_Client);
        $stmt->bindparam(":Qte",$Qte);
        $stmt->bindparam(":Name_Pro",$Name_Pro);
        $stmt->bindparam(":State",$State);
        $stmt->bindparam(":City",$City);
        $stmt->bindparam(":Price",$Price);
        $stmt->bindparam(":shipping",$shipping);
        $stmt->execute();
        return true;
        }catch(PDOException $e){
        echo 'Error : '. $e->getMessage();
        return false;
        }
    }

    public function updateStatusOrder($Id_Client,$StatU_Order){
        try{
            $stmt = $this->db->prepare("UPDATE orders SET StatU_Order=:StatU_Order   WHERE Id_Client=:Id_Client");
            $stmt->bindparam(":StatU_Order",$StatU_Order);
            $stmt->bindparam(":Id_Client",$Id_Client);
            $stmt->execute();
            return true;
            }catch(PDOException $e){
            echo 'Error : '. $e->getMessage();
            return false;
            }
        }
       
    
    public function Statuview($StatU_Order){
            $query = "SELECT  ID_Status, statu FROM status ";
            $stmt =$this->db->prepare($query);
            $stmt->execute();        
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){ 
            if($row['ID_Status']==$StatU_Order){ ?>
                <option value="<?=$row['ID_Status']?>"selected><?=$row['statu']?></option> 
                <?php }else{ ?>
                <option value="<?=$row['ID_Status']?>"><?=$row['statu']?></option>
                <?php }
            }
        }
    }

?>