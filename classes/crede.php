<?php

class Credenciamento
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "cap_cred";

    // object properties
    public $cred_id;
    public $users_cpf;
    public $cred_insccons;
    public $cred_sitcons;
    public $cred_papsi;
	public $cred_papsq;
	public $cred_ipm;
	public $cred_pr;
	public $cred_pa;
	public $cred_credpre;
	public $cred_recrpre;
	public $cred_solic;
	public $cred_datasolic;
	public $cred_assin;
    public $cred_cmtfav;
    public $cred_cmtjust;
    public $cred_cmtnapsopm;
	public $cred_cmtproopm;
	public $cred_cmtdata;
	public $cred_cmtassin;
	public $cred_cmtassin1;
	public $cred_cmtassin2;
	public $cred_cmtassin3;
	public $cred_cmtassin4;
	public $cred_cmtassin5;
	public $cred_cmtassin6;
	public $cred_cmtassin7;
	public $cred_cmsfav;
	public $cred_cmspac;
	public $cred_datacms;
	public $cred_cmsass;
	public $cred_opm;
	public $cred_datacad;
	public $cred_pmcad;
	public $cred_boletin;
	public $cred_tel;
	public $cred_funcao;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET 
		users_cpf = ?,
		cred_insccons = ?,
		cred_sitcons = ?,
		cred_papsi = ?,
		cred_papsq = ?,
		cred_ipm = ?,
		cred_pr = ?,
		cred_pa = ?,
		cred_credpre = ?, 
		cred_recrpre = ?,
		cred_solic = ?,
		cred_datasolic = ?,
		cred_assin = ?,
        cred_opm = ?,
	    cred_datacad = ?,
		cred_boletin = ?,
	    cred_pmcad = ?,
		cred_tel= ?,
		cred_funcao= ?
		
		";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->users_cpf);
        $prep_state->bindParam(2, $this->cred_insccons);
        $prep_state->bindParam(3, $this->cred_sitcons);
		$prep_state->bindParam(4, $this->cred_papsi);
        $prep_state->bindParam(5, $this->cred_papsq);
		$prep_state->bindParam(6, $this->cred_ipm);
		$prep_state->bindParam(7, $this->cred_pr);
		$prep_state->bindParam(8, $this->cred_pa);
        $prep_state->bindParam(9, $this->cred_credpre);
		$prep_state->bindParam(10, $this->cred_recrpre);
		$prep_state->bindParam(11, $this->cred_solic);
		$prep_state->bindParam(12, $this->cred_datasolic);
		$prep_state->bindParam(13, $this->cred_assin);
		$prep_state->bindParam(14, $this->cred_opm);
        $prep_state->bindParam(15, $this->cred_datacad);
		$prep_state->bindParam(16, $this->cred_boletin);
		$prep_state->bindParam(17, $this->cred_pmcad);
		$prep_state->bindParam(18, $this->cred_tel);
		$prep_state->bindParam(19, $this->cred_funcao);
		
		
 
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
        $sql = "SELECT cred_id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET 
		users_cpf = :users_cpf,
		cred_insccons =:cred_insccons,
		cred_sitcons =:cred_sitcons,
		cred_papsi =:cred_papsi,
		cred_papsq =:cred_papsq,
		cred_ipm =:cred_ipm,
		cred_pr =:cred_pr,
		cred_pa =:cred_pa,
		cred_credpre =:cred_credpre, 
		cred_recrpre =:cred_recrpre,
		cred_solic =:cred_solic,
		cred_datasolic =:cred_datasolic,
		cred_assin =:cred_assin,
        cred_cmtfav =:cred_cmtfav,
        cred_cmtjust =:cred_cmtjust,
        cred_cmtnapsopm =:cred_cmtnapsopm,
	    cred_cmtproopm =:cred_cmtproopm,
	    cred_cmtdata =:cred_cmtdata,
	    cred_cmtassin =:cred_cmtassin,
	    cred_cmsfav =:cred_cmsfav,
	    cred_cmspac =:cred_cmspac,
	    cred_datacms =:cred_datacms,
	    cred_cmsass =:cred_cmsass,
	    cred_datacad =:cred_datacad,
	    cred_pmcad =:cred_pmcad
		
		WHERE cred_id = :cred_id";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(':users_cpf', $this->users_cpf);
        $prep_state->bindParam(':cred_insccons', $this->cred_insccons);
        $prep_state->bindParam(':cred_sitcons', $this->cred_sitcons);
        $prep_state->bindParam(':cred_papsi', $this->cred_papsi);
		$prep_state->bindParam(':cred_papsq', $this->cred_papsq);
		$prep_state->bindParam(':cred_credpre', $this->cred_credpre);
		$prep_state->bindParam(':cred_ipm', $this->cred_ipm);
		$prep_state->bindParam(':cred_pa', $this->cred_pa);
		$prep_state->bindParam(':cred_pr', $this->cred_pr);
        $prep_state->bindParam(':cred_solic', $this->cred_solic);
		$prep_state->bindParam(':cred_recrpre', $this->cred_recrpre);
		$prep_state->bindParam(':cred_datasolic', $this->cred_datasolic);
		$prep_state->bindParam(':cred_assin', $this->cred_assin);
        $prep_state->bindParam(':cred_cmtfav', $this->cred_cmtfav);
        $prep_state->bindParam(':cred_cmtjust', $this->cred_cmtjust);
        $prep_state->bindParam(':cred_cmtnapsopm', $this->cred_cmtnapsopm);
		$prep_state->bindParam(':cred_cmtproopm', $this->cred_cmtproopm);
		$prep_state->bindParam(':cred_cmtdata', $this->cred_cmtdata);
		$prep_state->bindParam(':cred_cmtassin', $this->cred_cmtassin);
		$prep_state->bindParam(':cred_cmsfav', $this->cred_cmsfav);
		$prep_state->bindParam(':cred_cmspac', $this->cred_cmspac);
        $prep_state->bindParam(':cred_datacms', $this->cred_datacms);
		$prep_state->bindParam(':cred_cmsass', $this->cred_cmsass);
		$prep_state->bindParam(':cred_datacad', $this->cred_datacad);
		$prep_state->bindParam(':cred_pmcad', $this->cred_pmcad);
        $prep_state->bindParam(':cred_id', $this->cred_id);

        // execute the query
        if ($prep_state->execute()) {
            return true;
        } else {
			$resu=$prep_state->errorInfo();
			echo "<b style='red'>Erro: </b>".$resu[2];
            return false;
        }
    }
	function updatecms()
    {
        $sql = "UPDATE " . $this->table_name . " SET 
		
	    cred_cmsfav =:cred_cmsfav,
	    cred_cmspac =:cred_cmspac,
	    cred_datacms =:cred_datacms
	   
		
		WHERE cred_id = :cred_id";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);

        
		$prep_state->bindParam(':cred_cmsfav', $this->cred_cmsfav);
		$prep_state->bindParam(':cred_cmspac', $this->cred_cmspac);
        $prep_state->bindParam(':cred_datacms', $this->cred_datacms);

        $prep_state->bindParam(':cred_id', $this->cred_id);

        // execute the query
        if ($prep_state->execute()) {
            return true;
        } else {
			$resu=$prep_state->errorInfo();
			echo "<b style='red'>Erro: </b>".$resu[2];
            return false;
        }
    }
	

	function delete($cred_id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE cred_id = :cred_id ";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':cred_id', $this->cred_id);

        if ($prep_state->execute(array(":cred_id" => $_GET['id']))) {
            return true;
        } else {
			$resu=$prep_state->errorInfo();
			echo "<b style='red'>Erro: </b>".$resu[2];
            return false;
        }
    }
	
    function getAllUsers($users_cpf)
    {
        $sql = "SELECT cred_id,
	    users_cpf ,
		cred_insccons ,
		cred_sitcons ,
		cred_papsi ,
		cred_papsq ,
		cred_ipm ,
		cred_pr ,
		cred_pa ,
		cred_credpre , 
		cred_recrpre ,
		cred_solic ,
		cred_datasolic ,
		cred_assin ,
        cred_cmtfav ,
        cred_cmtjust ,
        cred_cmtnapsopm ,
	    cred_cmtproopm,
	    cred_cmtdata ,
	    cred_cmtassin ,
	    cred_cmsfav ,
	    cred_cmspac ,
	    cred_datacms ,
	    cred_cmsass ,
	    cred_datacad ,
	    cred_pmcad
	FROM " . $this->table_name . " 
	where users_cpf='$users_cpf'";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }
	
	function getCredenciamento()
    {
        $sql = "SELECT 
		cred_id,
		users_cpf ,
		cred_insccons ,
		cred_sitcons ,
		cred_papsi ,
		cred_papsq ,
		cred_ipm ,
		cred_pr ,
		cred_pa ,
		cred_credpre , 
		cred_recrpre ,
		cred_solic ,
		cred_datasolic ,
		cred_assin ,
		cred_opm,
        cred_cmtfav ,
        cred_cmtjust ,
        cred_cmtnapsopm ,
	    cred_cmtproopm,
	    cred_cmtdata ,
	    cred_cmtassin ,
	    cred_cmsfav ,
	    cred_cmspac ,
	    cred_datacms ,
	    cred_cmsass ,
	    cred_datacad ,
	    cred_pmcad,
		cred_tel
	FROM " . $this->table_name . "  ";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }
	function getCredenciar($data1,$data2,$tipo ,$funcao)
    {
        $sql = "SELECT * FROM " . $this->table_name . "  where 
	cred_datacms BETWEEN '$data1' and '$data2' 
	and cred_solic='$tipo' and cred_funcao='$funcao' and cred_cmsfav=1";


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
        $sql = "select users_cpf,
		cred_insccons,
		cred_sitcons,
		cred_papsi,
		cred_papsq,
		cred_ipm,
		cred_pr,
		cred_pa,
		cred_credpre, 
		cred_recrpre,
		cred_solic,
		cred_funcao,
		DATE_FORMAT(cred_datasolic, '%d-%m-%Y') as cred_datasolic,
		cred_assin,
        cred_cmtfav,
        cred_cmtjust,
        cred_cmtnapsopm,
	    cred_cmtproopm,
	    cred_cmtdata,
	    cred_cmtassin,
	    cred_cmsfav,
	    cred_cmspac,
	    cred_datacms,
	    cred_cmsass,
	    cred_datacad,
	    cred_pmcad,
		cred_boletin
		FROM " . $this->table_name . " WHERE cred_id = :cred_id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':cred_id', $this->cred_id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->users_cpf = $row['users_cpf'];
        $this->cred_insccons = $row['cred_insccons'];
		$this->cred_sitcons = $row['cred_sitcons'];
        $this->cred_papsi = $row['cred_papsi'];
        $this->cred_papsq = $row['cred_papsq'];
		$this->cred_credpre = $row['cred_credpre'];
		$this->cred_ipm = $row['cred_ipm']; 
		$this->cred_pa = $row['cred_pa'];
		$this->cred_pr = $row['cred_pr'];
		$this->cred_solic = $row['cred_solic']; 
		$this->cred_recrpre = $row['cred_recrpre'];
		$this->cred_datasolic = $row['cred_datasolic'];
		 $this->cred_assin = $row['cred_assin'];
        $this->cred_cmtfav = $row['cred_cmtfav'];
		$this->cred_cmtjust = $row['cred_cmtjust'];
        $this->cred_cmtnapsopm = $row['cred_cmtnapsopm'];
        $this->cred_cmtproopm = $row['cred_cmtproopm'];
		$this->cred_cmtdata = $row['cred_cmtdata'];
		$this->cred_cmtassin = $row['cred_cmtassin']; 
		$this->cred_cmsfav = $row['cred_cmsfav'];
		$this->cred_cmspac = $row['cred_cmspac'];
		$this->cred_datacms = $row['cred_datacms']; 
		$this->cred_cmsass = $row['cred_cmsass'];
		$this->cred_datacad = $row['cred_datacad'];
		$this->cred_pmcad = $row['cred_pmcad'];
		$this->cred_boletin = $row['cred_boletin'];
        
	
    }
	function getUser()
    {
        $sql = "select 
		cred_id,
		users_cpf ,
		cred_insccons ,
		cred_sitcons ,
		cred_papsi ,
		cred_papsq ,
		cred_ipm ,
		cred_pr ,
		cred_pa ,
		cred_credpre , 
		cred_recrpre ,
		cred_solic ,
		cred_datasolic ,
		cred_assin ,
		cred_opm,
        cred_cmtfav ,
        cred_cmtjust ,
        cred_cmtnapsopm ,
	    cred_cmtproopm,
	    cred_cmtdata ,
	    cred_cmtassin ,
	    cred_cmsfav ,
	    cred_cmspac ,
	    cred_datacms ,
	    cred_cmsass ,
	    cred_datacad ,
	    cred_pmcad
		FROM " . $this->table_name . " WHERE users_cpf = :users_cpf";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':users_cpf', $this->users_cpf);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);
        
		
		 $this->cred_id= $row['cred_id'];
        $this->users_cpf = $row['users_cpf'];
        $this->cred_insccons = $row['cred_insccons'];
		$this->cred_sitcons = $row['cred_sitcons'];
        $this->cred_papsi = $row['cred_papsi'];
        $this->cred_papsq = $row['cred_papsq'];
		$this->cred_credpre = $row['cred_credpre'];
		$this->cred_ipm = $row['cred_ipm']; 
		$this->cred_pa = $row['cred_pa'];
		$this->cred_pr = $row['cred_pr'];
		$this->cred_solic = $row['cred_solic']; 
		$this->cred_recrpre = $row['cred_recrpre'];
		$this->cred_datasolic = $row['cred_datasolic'];
		 $this->cred_assin = $row['cred_assin'];
        $this->cred_cmtfav = $row['cred_cmtfav'];
		$this->cred_cmtjust = $row['cred_cmtjust'];
        $this->cred_cmtnapsopm = $row['cred_cmtnapsopm'];
        $this->cred_cmtproopm = $row['cred_cmtproopm'];
		$this->cred_cmtdata = $row['cred_cmtdata'];
		$this->cred_cmtassin = $row['cred_cmtassin']; 
		$this->cred_cmsfav = $row['cred_cmsfav'];
		$this->cred_cmspac = $row['cred_cmspac'];
		$this->cred_datacms = $row['cred_datacms']; 
		$this->cred_cmsass = $row['cred_cmsass'];
		$this->cred_datacad = $row['cred_datacad'];
		$this->cred_pmcad = $row['cred_pmcad'];
		
		
      return $prep_state;
       
    }

function getCredaprov()
    {
        $sql = "select * FROM " . $this->table_name . " WHERE users_cpf = :users_cpf order by cred_id limit 1";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':users_cpf', $this->users_cpf);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);
        
		
		 $this->cred_id= $row['cred_id'];
        $this->users_cpf = $row['users_cpf'];
        $this->cred_insccons = $row['cred_insccons'];
		$this->cred_sitcons = $row['cred_sitcons'];
        $this->cred_papsi = $row['cred_papsi'];
        $this->cred_papsq = $row['cred_papsq'];
		$this->cred_credpre = $row['cred_credpre'];
		$this->cred_ipm = $row['cred_ipm']; 
		$this->cred_pa = $row['cred_pa'];
		$this->cred_pr = $row['cred_pr'];
		$this->cred_solic = $row['cred_solic']; 
		$this->cred_recrpre = $row['cred_recrpre'];
		$this->cred_datasolic = $row['cred_datasolic'];
		 $this->cred_assin = $row['cred_assin'];
        $this->cred_cmtfav = $row['cred_cmtfav'];
		$this->cred_cmtjust = $row['cred_cmtjust'];
        $this->cred_cmtnapsopm = $row['cred_cmtnapsopm'];
        $this->cred_cmtproopm = $row['cred_cmtproopm'];
		$this->cred_cmtdata = $row['cred_cmtdata'];
		$this->cred_cmtassin = $row['cred_cmtassin']; 
		$this->cred_cmsfav = $row['cred_cmsfav'];
		$this->cred_cmspac = $row['cred_cmspac'];
		$this->cred_datacms = $row['cred_datacms']; 
		$this->cred_cmsass = $row['cred_cmsass'];
		$this->cred_datacad = $row['cred_datacad'];
		$this->cred_pmcad = $row['cred_pmcad'];
		
		
      return $prep_state;
       
    }
// conta a quantidade
     function conta($users_cpf) {

      $unic = "SELECT * FROM " . $this->table_name . " WHERE users_cpf = '$users_cpf'";

      $prep_state = $this->db_conn->prepare($unic);
      $prep_state->execute();
	  $row = $prep_state->fetch(PDO::FETCH_ASSOC);
       $num = $prep_state->rowCount(); 
	  
      return $num;
    }
	
	
		function assinar()
    {
        $sql = "INSERT INTO cap_assinarcred SET 
		users_cred = ?,
		cred_id = ?,
		cred_cmsass = ?
		
		";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->users_cred);
        $prep_state->bindParam(2, $this->cred_id);
        $prep_state->bindParam(3, $this->cred_cmsass);
		
		
 
        if ($prep_state->execute()) {
            return true;
        } else {
			$resu=$prep_state->errorInfo();
			echo "<b style='red'>Erro: </b>".$resu[2];
            return false;
        }
    }
	function deleteassina()
    {
        $sql = "DELETE FROM cap_assinarcred WHERE assinarcred_id=:assinarcred_id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':assinarcred_id', $this->assinarcred_id);

        if ($prep_state->execute(array(":assinarcred_id" => $_GET['id']))) {
            return true;
        } else {
			$resu=$prep_state->errorInfo();
			echo "<b style='red'>Erro: </b>".$resu[2];
            return false;
        }
    }
	function contaassina($credid) {

      $unic = "SELECT * FROM cap_assinarcred WHERE cred_id= '$credid'";

      $prep_state = $this->db_conn->prepare($unic);
      $prep_state->execute();
	  $row = $prep_state->fetch(PDO::FETCH_ASSOC);
       $num = $prep_state->rowCount(); 
	  
      return $num;
    }
	function assinaturas($credid) {

      $sql = "SELECT * FROM cap_assinarcred WHERE cred_id= '$credid'";

      $prep_state = $this->db_conn->prepare($sql);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }
	
	
	
	
	
}







