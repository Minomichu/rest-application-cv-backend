<?php include("config.php"); ?>

<?php

class Work {

    public function __construct() {

        $this->db = new mysqli(DBhost, DBadmin, DBpassword, DBdatabase);

		if($this->db->connect_errno > 0){
    	die('Fel vid databasanslutning klassfilen [' . $this->db->connect_error . ']');
		}
    }


    public function getWork() {
        
        $sql = "SELECT * FROM WORK ORDER BY ENDDATE DESC";

        $result = $this->db->query($sql) or die('Fel vid hämtning av ALLA jobb'); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);		
    }   


    public function getWorkById($GETid) {

        $sql = "SELECT * FROM WORK WHERE ID = $GETid";
        
        $result = $this->db->query($sql) or die('Fel vid hämtning av UTVALT jobb'); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);	
    } 


    public function addWork($workplace, $title, $workStartdate, $workEnddate) {

        $sql = "INSERT INTO WORK (WORKPLACE, TITLE, STARTDATE, ENDDATE) VALUES
        ('$workplace', '$title', '$workStartdate', '$workEnddate');";

        return $result = $this->db->query($sql) or die('Fel vid LÄGGA TILL jobb'); 
    }

    
    public function updateWork($workplace, $title, $workStartdate, $workEnddate, $id) {

        $sql = "UPDATE WORK SET WORKPLACE='$workplace', TITLE='$title', STARTDATE='$workStartdate', ENDDATE='$workEnddate' WHERE ID='$id'";
        return $result = $this->db->query($sql) or die('Fel vid UPPDATERING av jobb'); 
    }


    public function deleteWork($id) {

        $sql = "DELETE FROM WORK WHERE ID = $id";
		return $result = $this->db->query($sql) or die('Fel vid RADERING av jobb');
    }
}
?>