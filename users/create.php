<?php

// set page headers
$page_title = "Criar usuários";
include_once "../include/header.php";

// read user button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn info pull'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Voltar ";
    echo "</a>";
echo "</div>";

// get database connection
include_once '../classes/database.php';
include_once '../initial.php';


// check if the form is submitted
if ($_POST){

    // instantiate user object
    include_once '../classes/user.php';
    $user = new User($db);

    // set user property values
    $user->nome = htmlentities(trim($_POST['nome']));
    $user->sobrenome = htmlentities(trim($_POST['sobrenome']));
    $user->email = htmlentities(trim($_POST['email']));
    $user->celular = htmlentities(trim($_POST['celular']));
    $user->category_id = $_POST['category_id'];


    // if the user able to create
    if($user->create()){
  echo "<script>
//M.toast({html: 'Cadastrado com sucesso', classes: 'rounded'});
var toastHTML = '<b style=color:green>Sucesso&nbsp;</b><span>&nbsp;Cadastrado com Sucesso</span>';
  M.toast({html: toastHTML, classes: 'rounded'});	
</script>";
    }

    // if unable to edit user
    else{
  
echo "<script>
var toastHTML = '<b style=color:orange>Erro&nbsp;</b><span>&nbsp;Não pode Cadastrar</span>';
  M.toast({html: toastHTML, classes: 'rounded'});		
</script>";
    }
}
?>

<!-- Bootstrap Form for creating a user -->
<form action='create.php' role="form" method='post'>

    <table class='w3-table  w3-border w3-card-4'>

        <tr>
            <td>Nome</td>
            <td><input type='text' name='nome'  class='form-control' placeholder="Nome" required></td>
        </tr>

        <tr>
            <td>Sobrenome</td>
            <td><input type='text' name='sobrenome' class='form-control' placeholder="Sobrenome" required></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control validate' placeholder="Email" required >
			<span class='helper-text' data-error='Errado' data-success='Correto'>Verificador</span></td>
        </tr>

        <tr>
            <td>Celular</td>
            <td><input type='number' name='celular' class='form-control' placeholder="Celular" required></td>
        </tr>

        <tr>
            <td>Category</td>
            <td>
                <?php
                    // choose user categories
                    include_once '../classes/category.php';

                    $category = new Category($db);
                    $prep_state = $category->getAll();
                    echo "<select class='browser-default' name='category_id'>";

                        echo "<option>--- Selecione a Categoria ---</option>";

                        while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){

                            extract($row_category);

                            echo "<option value='$id'> $nome </option>";
                        }
                    echo "</select>";
                ?>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn success"> Salvar
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "../include/footer.php";
?>

