<?php include("config.php"); ?>

<?php

class Language {

    public function __construct() {

        $this->db = new mysqli(DBhost, DBadmin, DBpassword, DBdatabase);

		if($this->db->connect_errno > 0){
    	die('Fel vid databasanslutning klassfilen [' . $this->db->connect_error . ']');
		}
    }


    public function getLanguage() {

        $sql = "SELECT SPEAK FROM LANGUAGES";

        $result = $this->db->query($sql) or die('Fel vid hämtning av ALLA språk'); 
        return mysqli_fetch_all($result, MYSQLI_ASSOC);		
    }   


    //Add Update Delete
    public function AUDLanguage($speak) {

        $sql = "DELETE FROM LANGUAGES";
        $result = $this->db->query($sql) or die('Fel vid hämtning av ALLA språk');

        //Parameter 1: var den ska delas
        //Parameter 2: vad som ska delas
        $speakingLanguages = explode(",", $speak);
        $sql = "INSERT INTO LANGUAGES (SPEAK) VALUES";

        foreach ($speakingLanguages as $speaking => $language) {
            if ($speaking == 0) {
                //Inget kommatecken före första språket
                $sql .= "('$language')";
            } else {
                //Slår ihop språken med kommatecken framför varje språk som inte är det första
                $sql .= ",('$language')";
            }
        }

        $result = $this->db->query($sql) or die('Fel vid sändning av språk till databasen');

        //Förhindrar att det läggs på tomma rader vid editering
        $sql = "DELETE FROM LANGUAGES WHERE SPEAK ='';";
        $result = $this->db->query($sql) or die('Fel vid hämtning av ALLA språk');
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}

?>