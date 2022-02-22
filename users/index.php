<?php

// include database and object files
include_once '../classes/database.php';
include_once '../classes/user.php';
include_once '../classes/category.php';
include_once '../initial.php';

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 5; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query limit clause

// instantiate database and user object
$user = new User($db);
$category = new Category($db);

// include header file
$page_title = "Usuários";
include_once "../include/header.php";

// create user button
echo "<div class='right-button-margin'>";
echo "<a href='create.php' class='btn info pull'>";
echo "<i class='fa fa-plus-square' ></i> Criar Novo";
echo "</a>";
echo "</div>";
echo "<a class='waves-effect waves-light btn modal-trigger' href='#modal1'>Novo</a>";

// select all users
$prep_state = $user->getAllUsers($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

   echo "<div class='w3-responsive'>";
echo "<input type='text' id='myInput' onkeyup='mybusca()' placeholder='Procure o Nome..'>";
include_once 'pagination.php';
echo "<table id='myTable' class='w3-table w3-bordered w3-border w3-card-4'><tr class='header'>";
    echo "<tr>";
	echo "<th>Ação</th>";
    echo "<th>Nome</th>";
    echo "<th>Sobrenome</th>";
    echo "<th id='esconder'>E-Mail</th>";
    echo "<th>Telefone</th>";
    echo "<th>Perfil</th>";
    echo "<th>Ação</th>";
    echo "</tr>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tr>";
		echo "<td>";
		// edit user button
        echo "<a href='edit.php?id=" . $id . "' class='btn warning left-margin orange' >";
        echo "<i class='fa fa-pencil-square-o' ></i><label id='esconder' style=color:white> Editar</label>";
        echo "</a>";
		echo "</td>";
        echo "<td>$row[nome]</td>";
        echo "<td>$row[sobrenome]</td>";
        echo "<td id='esconder'>$row[email]</td>";
        echo "<td>$row[celular]</td>";
		echo "</td>";
        echo "<td>";
                    $category->id = $category_id;
					$category->getName();
					echo $category->nome;
        echo "</td>";

        echo "<td>";
       

        // delete user button
        echo "<a href='delete.php?id=" . $id . "' class='btn waves-effect waves-light btn modal-trigger' onclick='getId($id)'>";
        echo "<i class='fa fa-trash'></i><label id='esconder' style=color:white> Excluir</label>";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table><br>";

    // include pagination file
    
}

// if there are no user
else{
    echo "<div> No User found. </div>";
    }
?>
 <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4></h4>
      
    </div>
  
  </div>

<?php
include_once "../include/footer.php";
?>