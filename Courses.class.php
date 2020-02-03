<?php include("config.php"); ?>

<?php

class Courses {

    public function __construct() {

        $this->db = new mysqli(DBhost, DBadmin, DBpassword, DBdatabase);

		if($this->db->connect_errno > 0){
    	die('Fel vid databasanslutning klassfilen [' . $this->db->connect_error . ']');
		}
    }


    public function getCourse() {
        
        $sql = "SELECT * FROM COURSES ORDER BY ENDDATE DESC";

        $result = $this->db->query($sql) or die('Fel vid hämtning av ALLA kurser'); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);		
    }   


    public function getCourseById($GETid) {

        $sql = "SELECT * FROM COURSES WHERE ID = $GETid";
        
        $result = $this->db->query($sql) or die('Fel vid hämtning av UTVALD kurs'); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);	
    } 


    public function addCourse($school, $coursename, $startdate, $enddate) {

        $sql = "INSERT INTO COURSES (SCHOOL, COURSENAME, STARTDATE, ENDDATE) VALUES
        ('$school', '$coursename', '$startdate', '$enddate');";

        return $result = $this->db->query($sql) or die('Fel vid LÄGGA TILL kurs'); 
    }

    
    public function updateCourse($school, $coursename, $startdate, $enddate, $id) {

        $sql = "UPDATE COURSES SET SCHOOL='$school', COURSENAME='$coursename', STARTDATE='$startdate', ENDDATE='$enddate' WHERE ID='$id'";
        return $result = $this->db->query($sql) or die('Fel vid UPPDATERING av kurs'); 
    }


    public function deleteCourse($id) {

        $sql = "DELETE FROM COURSES WHERE ID = $id";
		return $result = $this->db->query($sql) or die('Fel vid RADERING av kurs');
    }
}
?>