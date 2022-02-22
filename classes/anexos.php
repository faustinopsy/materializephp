<?php

class Anexos
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "cap_anexos";

    // object properties
    public $anexos_id;
    public $users_cpf;
	public $anexos_tipo;
    public $anexos_doc;
    public $anexos_datacad;
	public $anexos_pmcad;
	public $cred_id;
	

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET 
		users_cpf = ?,
		anexos_tipo = ?,
        anexos_doc= ?,
		anexos_datacad= ?,
	    anexos_pmcad = ?,
		cred_id = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->users_cpf);
        $prep_state->bindParam(2, $this->anexos_tipo);
        $prep_state->bindParam(3, $this->anexos_doc);
		$prep_state->bindParam(4, $this->anexos_datacad);
        $prep_state->bindParam(5, $this->anexos_pmcad);
		$prep_state->bindParam(6, $this->cred_id);

		
		
 
        if ($prep_state->execute()) {
            return true;
        } else {
			print_r($prep_state->errorInfo());
            return false;
        }

    }
function createupload()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET 
		users_cpf = ?,
		anexos_tipo= ?,
		anexos_doc = ?,
		cred_id=?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->users_cpf);
		$prep_state->bindParam(2, $this->anexos_tipo);
		$prep_state->bindParam(3, $this->anexos_doc);
       $prep_state->bindParam(4, $this->cred_id);
 
        if ($prep_state->execute()) {
            return true;
        } else {
			$resu=$prep_state->errorInfo();
			echo "<b style='red'>Erro: </b>".$resu[2];
            return false;
        }

    }
    // for pagination
    public function countAll()
    {
        $sql = "SELECT anexos_id  FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


   
	

	function delete($anexos_id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE anexos_id= :anexos_id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':anexos_id',$this->anexos_id);

        if ($prep_state->execute(array(":anexos_id" => $_GET['id']))) {
            return true;
        } else {
			$resu=$prep_state->errorInfo();
			echo "<b style='red'>Erro: </b>".$resu[2];
            return false;
        }
    }
	
    function getAllUsers($data1, $data2)
    {
        $sql = "SELECT 
	    anexos_id ,
		users_cpf ,
		anexos_tipo,
		anexos_doc,
        anexos_datacad ,
	    anexos_pmcad 
	FROM " . $this->table_name . " 
	ORDER BY anexos_id  DESC";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }
	function getAnexosCpf($cpf)
    {
        $sql = "SELECT 
		anexos_id ,
		users_cpf ,
		anexos_tipo,
		anexos_doc,
        anexos_datacad ,
	    anexos_pmcad 
	FROM " . $this->table_name . "  where 
	users_cpf = '$cpf'";


        $prep_state = $this->db_conn->prepare($sql);



        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

	function getAnexos($data1,$data2)
    {
        $sql = "SELECT 
		anexos_id ,
		users_cpf ,
		anexos_tipo,
		anexos_doc,
        anexos_datacad ,
	    anexos_pmcad  
	FROM " . $this->table_name . "  where 
	anexos_datacad BETWEEN '$data1' and '$data2' 
	order by anexos_datacad desc";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    // for edit user form when filling up
    function getUsercms()
    {
        $sql = "select 
		anexos_id ,
		users_cpf ,
		anexos_tipo,
		anexos_doc,
        anexos_datacad ,
	    anexos_pmcad 
		FROM " . $this->table_name . " WHERE anexos_id  = :anexos_id ";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':anexos_id ', $this->anexos_id );
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->users_cpf = $row['users_cpf'];
        $this->anexos_tipo = $row['anexos_tipo'];
		$this->anexos_doc = $row['anexos_doc'];
        $this->anexos_datacad = $row['anexos_datacad'];
		$this->anexos_pmcad = $row['anexos_pmcad'];
	
        
	
    }
	function getUser()
    {
        $sql = "select 
		anexos_id ,
		users_cpf ,
		anexos_tipo,
		anexos_doc,
        anexos_datacad ,
	    anexos_pmcad 
		FROM " . $this->table_name . " WHERE anexos_id = :anexos_id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':anexos_id', $this->anexos_id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->users_cpf = $row['users_cpf'];
        $this->anexos_tipo = $row['anexos_tipo'];
		$this->anexos_doc = $row['anexos_doc'];
		$this->anexos_datacad = $row['anexos_datacad'];
		$this->anexos_pmcad = $row['anexos_pmcad'];
		
        
	
    }

// conta a quantidade
     function conta($cred_id) {

      $unic = "SELECT * FROM " . $this->table_name . " WHERE cred_id = '$cred_id'";

      $prep_state = $this->db_conn->prepare($unic);
      $prep_state->execute();
	  $row = $prep_state->fetch(PDO::FETCH_ASSOC);
       $num = $prep_state->rowCount(); 
	  
      return $num;
    }
	function contadoc($cred_id,$tipo) {

      $unic = "SELECT * FROM " . $this->table_name . " WHERE cred_id = '$cred_id' and anexos_tipo='$tipo'";

      $prep_state = $this->db_conn->prepare($unic);
      $prep_state->execute();
	  $row = $prep_state->fetch(PDO::FETCH_ASSOC);
       $num = $prep_state->rowCount(); 
	  
      return $num;
    }
}







