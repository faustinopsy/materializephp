<?php
// set page headers
$page_title = "Editar Usuário";
include_once "../include/header.php";

// read user button
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn info pull'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Voltar ";
    echo "</a>";
echo "</div>";

// isset() is a PHP function used to verify if ID is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

// include database and object user file
include_once '../classes/database.php';
include_once '../classes/user.php';
include_once '../initial.php';

// instantiate user object
$user = new User($db);
$user->id = $id;
$user->getUser();

// check if the form is submitted
if($_POST)
{

    // set user property values
    $user->nome = htmlentities(trim($_POST['nome']));
    $user->sobrenome = htmlentities(trim($_POST['sobrenome']));
    $user->celular = htmlentities(trim($_POST['celular']));
    $user->email = htmlentities(trim($_POST['email']));
    $user->category_id = $_POST['category_id'];

    // Edit user
    if($user->update()){
        
echo "<script>
//M.toast({html: 'Atualizado com sucesso', classes: 'rounded'});
var toastHTML = '<b style=color:green>Sucesso&nbsp;</b><span>&nbsp;Atualizado com Sucesso</span>';
  M.toast({html: toastHTML, classes: 'rounded'});	
</script>";
    }

    // if unable to edit user
    else{
  
echo "<script>
var toastHTML = '<b style=color:orange>Erro&nbsp;</b><span>&nbsp;Não pode Atualizar</span>';
  M.toast({html: toastHTML, classes: 'rounded'});		
</script>";
    }
}
?>

    <!-- Bootstrap Form for updating a user -->
    <form action='edit.php?id=<?php echo $id; ?>' method='post'>

        <table class='w3-table  w3-border w3-card-4'>

            <tr>
                <td>Nome</td>
                <td><input type='text' name='nome' value='<?php echo $user->nome;?>' class='form-control' placeholder="Nome" required></td>
            </tr>

            <tr>
                <td>Sobrenome</td>
                <td><input type='text' name='sobrenome' value='<?php echo $user->sobrenome;?>' class='form-control' placeholder="obrenome" required></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type='email' name='email' value='<?php echo $user->email;?>' class='form-control' placeholder="Email" required></td>
            </tr>

            <tr>
                <td>Celular</td>
                <td><input type='number' name='celular' value='<?php echo $user->celular;?>' class='form-control' placeholder="Celular" required></td>
            </tr>

            <tr>
                <td>Categoria</td>
                <td>

                    <?php
                    // read the user categories from the database
                    include_once '../classes/category.php';

                    $category = new Category($db);
                    $prep_state = $category->getAll();

                    // put them in a select drop-down
                    echo "<select class='browser-default' name='category_id'>";
                    echo "<option>--- Selecione a Categoria ---</option>";

                    while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){
                        extract($row_category);

                        // current category of the person must be selected
						if($user->category_id == $id){ //if user category_id is equal to category id,
                            echo "<option value='$id' selected>"; //Specifies that an option should be pre-selected when the page loads
                        }else{
                            echo "<option value='$id'>";
                        }

						echo "$nome </option>";
                    }
                    echo "</select>";
                    ?>
                </td>
            </tr>


            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn success" >
                        <span class=""></span> Atualizar
                    </button>
                </td>
            </tr>

        </table>
    </form>

<?php
include_once "../include/footer.php";
?>