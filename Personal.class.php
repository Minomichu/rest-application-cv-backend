<?php include("config.php"); ?>

<?php

class Personal {

    public function __construct() {

        $this->db = new mysqli(DBhost, DBadmin, DBpassword, DBdatabase);

		if($this->db->connect_errno > 0){
    	die('Fel vid databasanslutning klassfilen [' . $this->db->connect_error . ']');
		}
    }


    public function getPersonal() {

        $sql = "SELECT * FROM PERSONAL";
        $result = $this->db->query($sql) or die('Fel vid hämtning av ALL personinfo'); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);		
    }   

    
    public function updatePersonal($firstname, $lastname, $worktitle, $phone, $email, $city, $userID) {

        $sql = "UPDATE PERSONAL SET FIRSTNAME ='$firstname', LASTNAME='$lastname', WORKTITLE='$worktitle', PHONE='$phone', EMAIL='$email', CITY='$city' WHERE ID='$userID'";
        return $result = $this->db->query($sql) or die('Fel vid UPPDATERING av personinfo'); 
    }
}
?>