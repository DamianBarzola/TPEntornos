 <?php
 
 class UserModel extends Model{

    private $id;
    private $apellido;
    private $nombre;
    private $email;
    private $password;
    private $tipo;


    public function __construct()
    {
      parent::__construct();
    }

    public function signIn($email){
        
        $result = mysqli_query($conn, "SELECT id,email, password, nombre,tipo,apellido,idPPS   
                                        FROM users left join solicitudes on id=id_user WHERE email = '$email'");
        
        // Variable $row hold the result of the query
		$row = mysqli_fetch_assoc($result);
			
		// Variable $hash hold the password hash on database
		$hash = $row['password'];
        return $this->db->query($row);;
}

}

?>