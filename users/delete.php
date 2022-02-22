<?php

//set page headers
$page_title = "Excluir Usuários";
include_once "../include/header.php";
include_once '../classes/database.php';
include_once '../classes/user.php';
include_once '../initial.php';
// get database connection

$user = new User($db);

// check if the submit button yes was clicked
if (isset($_POST['del-btn']))
{
    $id = $_GET['id'];
    $user->delete();
    header("Location: delete.php?deleted");
}
      // check if the user was deleted
      if(isset($_GET['deleted'])){
         echo "<script>
//M.toast({html: 'Excluido com sucesso', classes: 'rounded'});
var toastHTML = '<b style=color:green>Sucesso&nbsp;</b><span>&nbsp;Excluido com Sucesso</span>';
  M.toast({html: toastHTML, classes: 'rounded'});	
</script>";
    }

    
      
?>
<!-- Bootstrap Form for deleting a user -->
<?php
    if (isset($_GET['id'])) {
        echo "<form method='post'>";
            echo "<table class='w3-table  w3-border w3-card-4'>";
                echo "<input type='hidden' name='id' value='id' />";
                    echo"<div class='alert warning'>";
                        echo"Tem certeza em excluir o ID ".$_GET['id']."?";
                    echo"</div>";
                echo"<button type='submit' class='btn danger' name='del-btn'>";
                    echo"SIM";
                echo"</button>";
                    echo str_repeat('&nbsp;', 2);
                echo"<a href='index.php' class='btn default' role='button'>";
                    echo" Não";
                echo"</a>";
            echo"</table>";
        echo"</form>";
    }
else {  // Back to the first page
        echo"<a href='index.php' class='btn btn-success'> Home </a>";
     }
?>

<?php
include_once "../include/footer.php";
?>