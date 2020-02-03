<?php include("config.php"); ?>

<?php

class Personalimage {

    public function __construct() {

        $this->db = new mysqli(DBhost, DBadmin, DBpassword, DBdatabase);

		if($this->db->connect_errno > 0){
    	die('Fel vid databasanslutning klassfilen [' . $this->db->connect_error . ']');
		}
    }

    
    public function updatePersonalimage($picture, $userID) {

        $sql = "UPDATE PERSONAL SET PICTURE='$picture' WHERE ID='$userID'";
        return $result = $this->db->query($sql) or die('Fel vid UPPDATERING av personinfo'); 
    }

}
?>