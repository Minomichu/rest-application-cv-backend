<?php include("config.php"); ?>

<?php

class Webpage {

    public function __construct() {

        $this->db = new mysqli(DBhost, DBadmin, DBpassword, DBdatabase);

		if($this->db->connect_errno > 0){
    	die('Fel vid databasanslutning klassfilen [' . $this->db->connect_error . ']');
		}
    }


    public function getWeb() {
        
        $sql = "SELECT * FROM WEBPAGE";

        $result = $this->db->query($sql) or die('Fel vid hämtning av ALLA sidor'); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);		
    }   


    public function getWebById($GETid) {

        $sql = "SELECT * FROM WEBPAGE WHERE ID = $GETid";
        
        $result = $this->db->query($sql) or die('Fel vid hämtning av UTVALD sida'); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);	
    } 


    public function addWeb($firstWebimage, $webname, $weburl, $webdescription) {

        $sql = "INSERT INTO WEBPAGE (WEBIMAGE, WEBNAME, WEBURL, WEBDESCRIPTION) VALUES
        ('$firstWebimage', '$webname', '$weburl', '$webdescription');";

        return $result = $this->db->query($sql) or die('Fel vid LÄGGA TILL sida'); 
    }

    
    public function updateWeb($webname, $weburl, $webdescription, $id) {

        $sql = "UPDATE WEBPAGE SET WEBNAME='$webname', WEBURL='$weburl', WEBDESCRIPTION='$webdescription' WHERE ID='$id'";
        return $result = $this->db->query($sql) or die('Fel vid UPPDATERING av sida'); 
    }


    public function deleteWeb($id) {

        $sql = "DELETE FROM WEBPAGE WHERE ID = $id";
		return $result = $this->db->query($sql) or die('Fel vid RADERING av sida');
    }
}
?>