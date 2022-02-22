<?php

class User
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "users";

    // object properties
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $celular;
    public $category_id;


    public function __construct($db)
    {
        $this->db_conn = $db;
    }


    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET nome = ?, sobrenome = ?, email = ?, celular = ?, category_id = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->nome);
        $prep_state->bindParam(2, $this->sobrenome);
        $prep_state->bindParam(3, $this->email);
        $prep_state->bindParam(4, $this->celular);
        $prep_state->bindParam(5, $this->category_id);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    // for pagination
    public function countAll()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET nome = :nome, sobrenome = :sobrenome, email = :email, celular = :celular, category_id  = :category_id  WHERE id = :id";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':nome', $this->nome);
        $prep_state->bindParam(':sobrenome', $this->sobrenome);
        $prep_state->bindParam(':email', $this->email);
        $prep_state->bindParam(':celular', $this->celular);
        $prep_state->bindParam(':category_id', $this->category_id);
        $prep_state->bindParam(':id', $this->id);

        // execute the query
        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function delete()
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id =:id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);

        if ($prep_state->execute(array(":id" => $_GET['id']))) {
            return true;
        } else {
            return false;
        }
    }


    function getAllUsers($from_record_num, $records_per_page)
    {
        $sql = "SELECT id, nome, sobrenome, email, celular, category_id FROM " . $this->table_name . " ORDER BY nome ASC LIMIT ?, ?";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    // for edit user form when filling up
    function getUser()
    {
        $sql = "SELECT nome, sobrenome, email, celular, category_id FROM " . $this->table_name . " WHERE id = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->sobrenome = $row['sobrenome'];
        $this->email = $row['email'];
        $this->celular = $row['celular'];
        $this->category_id = $row['category_id'];
    }


}







