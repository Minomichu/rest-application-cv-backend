<?php include("config.php"); ?>

<?php

class Webimage {

    public function __construct() {

        $this->db = new mysqli(DBhost, DBadmin, DBpassword, DBdatabase);

		if($this->db->connect_errno > 0){
    	die('Fel vid databasanslutning klassfilen [' . $this->db->connect_error . ']');
		}
    }

    
    public function updateWebimage($webimage, $id) {

        $sql = "UPDATE WEBPAGE SET WEBIMAGE='$webimage' WHERE ID='$id'";
        return $result = $this->db->query($sql) or die('Fel vid UPPDATERING av webimage'); 
    }

}
?>