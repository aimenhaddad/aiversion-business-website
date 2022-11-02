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


public function getID($ID_Pro ){
    $stmt = $this->db->prepare("SELECT Name_Pro, Description_Pro, image, Price FROM produits WHERE ID_Pro =:ID_Pro ");
    $stmt->execute(array(":ID_Pro "=>$ID_Pro ));
    $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
    return $editRow;
}




public function update($ID_Pro,$namePro, $descriptionPro,$imagePro,$price){
    try{
        $stmt = $this->db->prepare("UPDATE produits SET namePro=:namePro,descriptionPro=:descriptionPro,imagePro=:imagePro,price=:price WHERE ID_Pro=:ID_Pro");
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

            if($stmt->rowCount()>0){
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>
                    <tr>
                        <td><?php echo $row['ID_Pro']?></td>
                        <td><?php echo $row['Name_Pro']?></td>
                        <td><?php echo $row['Description_Pro']?></td>
                        <td><?php echo $row['Price']?></td>
                        <td class="p-1"> <img src="<?php echo $row['image']?>" height="100px" width="100" class="img-fluid img-thumbnail " >  </td>
                    </tr>
<?php
 
                }
            }else{
                ?>
                <td>No records :( </td>
                </tr>
                <?php
            }

        }




}



 






?>