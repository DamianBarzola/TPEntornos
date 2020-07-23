
<?php

public class Conexion{
// Connection variables
    private $dbhost	= "localhost";	   // localhost or IP
    private $dbuser	= "root";		  // database username
    private $dbpass	= "root";		     // database password
    private $dbname	= "pps";    // database name
                    
    private $conn;

    public function __construct(){
        $this->conn = new mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
  
}
?>