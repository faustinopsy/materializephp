<?php

ini_set('display_errors', 1); // see an error when they pop up
error_reporting(E_ALL); // report all php errors

?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_title; ?></title>

         <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
       <link href="../library/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../library/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../library/css/fontawesome/css/font-awesome.min.css" rel="stylesheet">
		<script src="../library/js/materialize.js"></script>
		 <script src="../library/js/funcoes.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
        
		<style>
.modal.bottom-sheet {
  top: auto;
  bottom: -100%;
  margin: 0;
  width: 100%;
  height: 65%;
  border-radius: 0;
  will-change: bottom, opacity;
}
@media screen and (max-width: 700px) {
	 #esconder {

  display: none;
}
	
}
		</style>

       
    </head>

    <body>

      <nav class="light-green lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo right">Logo</a>
      <ul class="left hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
 

  <div class="container">
    <div class="section">
            <?php
                 // show page header
                 echo "<div class='page-header'>";
                 echo "<h3>{$page_title}</h3>";
                 echo "</div>";
            ?>

