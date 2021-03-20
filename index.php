<?php
    session_start();
    include_once 'auth/config.php';
    if($_SESSION['type'] != 'admin'){
$path_maintenance = 'maintenance.txt'; // chemin vers le fichier maintenance.txt
if(file_exists($path_maintenance)){
 header('Location: maintenance.php');
 exit();
}
}
?>
<!DOCTYPE html>
<!-- saved from url=(0041)https://mangaressource.000webhostapp.com/ -->
<link href="https://kit-pro.fontawesome.com/releases/v5.15.2/css/pro.min.css" rel="stylesheet">
<html lang="fr" dir="ltr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="author" content="bockartstudio">
                 <meta name="description" content="site de streaming anime manga">
    <title>Manga Ressource</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://mangaressource.000webhostapp.com/bock.ico" type="image/x-icon">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css">
    
  
  <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true" style="visibility: hidden;">Menu</a>
        </li>
        <li class="nav-item" style="right: 10px;position:absolute;">
          <a class="nav-link" href="auth/index.php" tabindex="-1" aria-disabled="true">Connexion</a>
        </li>
        <li class="nav-item" style="right: 110px;position:absolute;">
        <a class="nav-link" href="auth/inscription.php" tabindex="-1" aria-disabled="true">Inscription</a>
        </li>
        <li class="nav-item" style="right: 210px;position:absolute;">
            <a class="nav-link" href="https://fr.tipeee.com/mangaressource" tabindex="-1" aria-disabled="true">dons</a>
        </li>
        <li class="nav-item" style="right: 650px;position:absolute;">
            <a class="nav-link" href="https://www.clipeee.com/creator/mangaressource" tabindex="-1" aria-disabled="true">pubs pour me rémunérer totalement gratuitement cliquer ici</a>
        </li>
        </ul></div>
        </nav></div>
    <h1>Manga ressource</h1>
    <br>
    <img src="img/icon recherche.png" class="img4">
    <img src="img/la_banniere_2_leny_V3.3.png" class="img1">
    <div class="wrapper">
        <form action="recherche.php">
      <div class="search-input">

        <a href="https://mangaressource.000webhostapp.com/" target="_blank" hidden=""></a>
        <input type="text" name="anime" placeholder="Recherche animé..." list="cars" autocomplete="off">
                   <div class="form-group">
<datalist id="cars">
  <?php
include_once 'auth/config.php';
$membres = $bdd->query('SELECT DISTINCT saison, nom FROM anime');
?><?php while($d = $membres->fetch()) { ?>
        <option value="<?= $d['nom'] ?>" >(Saison n°<?= $d['saison'] ?>)</option>
  <?php } ?>
</datalist>
     
  </div>
        <div class="autocom-box">
        </div>
        <button type="submit" name="" class="icon" style="border: none;"><i class="fas fa-search" style="color: white;font-size: 28px;"></i></button>
      </div>
    </div></form>
    

  <br><br><br><br><br><br><br><br><br>

</body></html>