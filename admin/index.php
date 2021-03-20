<?php 
    session_start();
    include_once '../auth/config.php';
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
   $requser = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
   $requser->execute(array($_SESSION['user']));
   $pers = $requser->fetch();
?>
<title>Session admin</title>
<link rel="shortcut icon" href="https://mangaressource.000webhostapp.com/bock.ico" type="image/x-icon">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
          <a class="nav-link" href="../auth/" tabindex="-1" aria-disabled="true">Accueil</a>
        </li>
        <li class="nav-item" style="right: 10px;position:absolute;">
          <a class="nav-link" href="../auth/deconnexion.php" tabindex="-1" aria-disabled="true">Déconnexion</a>
        </li>
        </ul></div>
        </div></nav>

<div class="demos">
             <?php $filename = '../maintenance.txt';

if (file_exists($filename)) { ?>
              <div class="demo-down">
                <span class="server-status" type="down"></span>
                <span>Site en maintenance.</span>
              </div>
            <?php }else{ ?>
              <div class="demo-up">
                <span class="server-status" type="up"></span>
                <span>Le site n'est pas en maintenance.</span>
              </div>
            <?php } ?>
                          <?php
$filename = '../maintenance.txt';

if (!file_exists($filename)) {
    echo "<div class='demo-down'><span class='server-status' type='down'></span><span><a style='color: #E74C3C;' href='maint.php?cd=1'>Mettre la maintenance</a></span></div>";
} else {
    echo "<div class='demo-down'><span class='server-status' type='up'></span><span><a style='color: #2ECC71;' href='maint.php?cd=0'>Enlever la maintenance</a></span></div>";
}
?>
            </div>
            <style type="text/css">
.demos {
  display: block;
}
.demos div span:nth-child(2) {
  margin-left: 30px;
  line-height: 35px;
}
.demo-up {
  display: block;
  height: 35px;
  position: relative;
  color: #2ECC71;
}
.demo-slow {
  display: block;
  height: 35px;
  position: relative;
  color: #f6c23e;
}
.demo-down {
  display: block;
  height: 35px;
  position: relative;
  color: #E74C3C;
}

/** Server status css **/
.server-status {
  left: 10px;
  top: 50%;
  margin-left: 0px;
  margin-top: -5px;
  position: absolute;
  vertical-align: middle;
  width: 10px;
  height: 10px;
  border-radius: 50%;
}
.server-status::before,
.server-status::after {
  left: 0;
  top: 50%;
  margin-left: -1px;
  margin-top: -6px;
  position: absolute;
  vertical-align: middle;
  width: 12px;
  height: 12px;
  border-radius: 50%;
}
.server-status[type="up"],
.server-status[type="up"]::before,
.server-status[type="up"]::after {
  background: #2ECC71;
}
.server-status[type="down"],
.server-status[type="down"]::before,
.server-status[type="down"]::after {
  background: #E74C3C;
}
.server-status[type="slow"],
.server-status[type="slow"]::before,
.server-status[type="slow"]::after {
  background: #f6c23e;
}

.server-status::before {
  content: "";
  animation: bounce 1.5s infinite;
}
.server-status::after {
  content: "";
  animation: bounce 1.5s -0.4s infinite;
}

@keyframes bounce {
  0% {
    transform: scale(1);
    -webkit-transform: scale(1);
    opacity: 1;
  }
  100% {
    transform: scale(2);
    -webkit-transform: scale(2);
    opacity: 0;
  }
}

@-webkit-keyframes bounce {
  0% {
    transform: scale(1);
    -webkit-transform: scale(1);
    opacity: 1;
  }
  100% {
    transform: scale(2);
    -webkit-transform: scale(2);
    opacity: 0;
  }
}
</style>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="mangaressource"/>

        </head>
        <body>
        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
           <form method="POST">

                <h3>ajouter un animer</h3>

                      

                <div class="form-group">

                    <input type="nom" name="nom" class="form-control" placeholder="nom" required="required" autocomplete="off">

                </div>

                <br>

                <div class="form-group">

                    <input type="saison" name="saison" class="form-control" placeholder="saison" required="required" autocomplete="off">

                </div>

                <br>

                <div class="form-group">

                    <input type="episode" name="episode" class="form-control" placeholder="episode" required="required" autocomplete="off">

                </div>

                <br>

                <div class="form-group">

                    <textarea type="lien" name="lien" class="form-control" placeholder="lien du lecteur" autocomplete="off"></textarea>

                </div>

                <br>

                <div class="form-group">

                    <input type="lien_img" name="lien_img" class="form-control" placeholder="lien_img" required="required" autocomplete="off">

                </div>

                <br>

                <div class="form-group">

                    <textarea type="descr" name="descr" class="form-control" placeholder="descr" autocomplete="off"></textarea>

                </div>

                <br>

                <div class="form-group">

                    <input type="code_color" name="code_color" class="form-control" placeholder="code_color" autocomplete="off">

                </div>

                <br>
                <button type="submit" class="btn btn-primary btn-block">executer</button>
                <br>
                <h3>ajouter un animer</h3>
                      
                <div class="form-group">
                    <input type="nom" name="nom2" class="form-control" placeholder="nom" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="saison" name="saison2" class="form-control" placeholder="saison" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="episode" name="episode2" class="form-control" placeholder="episode" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <textarea type="lien" name="lien2" class="form-control" placeholder="lien du lecteur" autocomplete="off"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="lien_img" name="lien_img2" class="form-control" placeholder="lien_img" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <textarea type="descr" name="descr2" class="form-control" placeholder="descr" autocomplete="off"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="code_color" name="code_color2" class="form-control" placeholder="code_color" autocomplete="off">
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block">executer</button>
                <br>
                <h3>ajouter un animer</h3>
                      
                <div class="form-group">
                    <input type="nom" name="nom3" class="form-control" placeholder="nom" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="saison" name="saison3" class="form-control" placeholder="saison" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="episode" name="episode3" class="form-control" placeholder="episode" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <textarea type="lien" name="lien3" class="form-control" placeholder="lien du lecteur" autocomplete="off"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="lien_img" name="lien_img3" class="form-control" placeholder="lien_img" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <textarea type="descr" name="descr3" class="form-control" placeholder="descr" autocomplete="off"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="code_color" name="code_color3" class="form-control" placeholder="code_color" autocomplete="off">
                </div>
                <br>
            
            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">executer</button>
                </div> 
                <h3>ajouter un animer</h3>
                      
                <div class="form-group">
                    <input type="nom" name="nom4" class="form-control" placeholder="nom" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="saison" name="saison4" class="form-control" placeholder="saison" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="episode" name="episode4" class="form-control" placeholder="episode" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <textarea type="lien" name="lien4" class="form-control" placeholder="lien du lecteur" autocomplete="off"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="lien_img" name="lien_img4" class="form-control" placeholder="lien_img" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <textarea type="descr" name="descr4" class="form-control" placeholder="descr" autocomplete="off"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="code_color" name="code_color4" class="form-control" placeholder="code_color" autocomplete="off">
                </div>
                <br>
            
            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">executer</button>
                </div>  
                <h3>ajouter un animer</h3>
                      
                <div class="form-group">
                    <input type="nom" name="nom5" class="form-control" placeholder="nom" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="saison" name="saison5" class="form-control" placeholder="saison" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <input type="episode" name="episode5" class="form-control" placeholder="episode" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <textarea type="lien" name="lien5" class="form-control" placeholder="lien du lecteur" autocomplete="off"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="lien_img" name="lien_img5" class="form-control" placeholder="lien_img" autocomplete="off">
                </div>
                <br>
                <div class="form-group">
                    <textarea type="descr" name="descr5" class="form-control" placeholder="descr" autocomplete="off"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <input type="code_color" name="code_color5" class="form-control" placeholder="code_color" autocomplete="off">
                </div>
                <br>
            
            <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">executer</button>
                </div>    
                 </form>
        <style>

            body{

                background-color: #4b4b4d;

            }

            .login-form {

                width: 340px;

                

            }

            .login-form form {

                margin-bottom: 15px;

                background: #f7f7f7;

                background-color:#4b4b4d;

            }

            .login-form h2 {

                margin: 0 0 15px;

            }

            .form-control, .btn {

                min-height: 38px;

                border-radius: 2px;

            }

            .btn {        

                font-size: 15px;

                font-weight: bold;

            }

            h1{

                font-size: 1.5em;

                position: absolute;

                right: 875px;

                margin: 0;

                padding: 0;

                text-decoration: none;

            }

            .h3{

                font-size: 2em;

                position:static;

                margin: 0;

                padding: 0;

                text-decoration: none;

            }

            .form-group{

                position:center;

            }

            

        </style>

        </body>

</html>

<?php 



    if(!empty($_POST['nom']) AND !empty($_POST['saison']) AND !empty($_POST['episode']) AND !empty($_POST['lien']) AND !empty($_POST['lien_img']) AND !empty($_POST['descr']) AND !empty($_POST['code_color']))

    {

        $nom = htmlspecialchars($_POST['nom']);

        $saison = htmlspecialchars($_POST['saison']);

        $episode = htmlspecialchars($_POST['episode']);

        $lien = htmlspecialchars($_POST['lien']);

        $lien_img = htmlspecialchars($_POST['lien_img']);

        $descr = htmlspecialchars($_POST['descr']);

        $code_color = htmlspecialchars($_POST['code_color']);

 



                                $insert = $bdd->prepare("INSERT INTO anime(nom, saison, episode, lien, lien_img, descr, code_color) VALUES(?, ?, ?, ?, ?, ?, ?)");

                                $insert->execute(array($nom, $saison, $episode, $lien, $lien_img, $descr, $code_color));

    }

    if(!empty($_POST['nom2']) AND !empty($_POST['saison2']) AND !empty($_POST['episode2']) AND !empty($_POST['lien2']) AND !empty($_POST['lien_img2']) AND !empty($_POST['descr2']) AND !empty($_POST['code_color2']))

    {

        $nom2 = htmlspecialchars($_POST['nom2']);

        $saison2 = htmlspecialchars($_POST['saison2']);

        $episode2 = htmlspecialchars($_POST['episode2']);

        $lien2 = htmlspecialchars($_POST['lien2']);

        $lien_img2 = htmlspecialchars($_POST['lien_img2']);

        $descr2 = htmlspecialchars($_POST['descr2']);

        $code_color2 = htmlspecialchars($_POST['code_color2']);

 



                                $insert = $bdd->prepare("INSERT INTO anime(nom, saison, episode, lien, lien_img, descr, code_color) VALUES(?, ?, ?, ?, ?, ?, ?)");

                                $insert->execute(array($nom2, $saison2, $episode2, $lien2, $lien_img2, $descr2, $code_color2));

    }

    if(!empty($_POST['nom3']) AND !empty($_POST['saison3']) AND !empty($_POST['episode3']) AND !empty($_POST['lien3']) AND !empty($_POST['lien_img3']) AND !empty($_POST['descr3']) AND !empty($_POST['code_color3']))

    {

        $nom3 = htmlspecialchars($_POST['nom3']);

        $saison3 = htmlspecialchars($_POST['saison3']);

        $episode3 = htmlspecialchars($_POST['episode3']);

        $lien3 = htmlspecialchars($_POST['lien3']);

        $lien_img3 = htmlspecialchars($_POST['lien_img3']);

        $descr3 = htmlspecialchars($_POST['descr3']);

        $code_color3 = htmlspecialchars($_POST['code_color3']);

 



                                $insert = $bdd->prepare("INSERT INTO anime(nom, saison, episode, lien, lien_img, descr, code_color) VALUES(?, ?, ?, ?, ?, ?, ?)");

                                $insert->execute(array($nom3, $saison3, $episode3, $lien3, $lien_img3, $descr3, $code_color3));

    }

    if(!empty($_POST['nom4']) AND !empty($_POST['saison4']) AND !empty($_POST['episode4']) AND !empty($_POST['lien4']) AND !empty($_POST['lien_img4']) AND !empty($_POST['descr4']) AND !empty($_POST['code_color4']))

    {

        $nom4 = htmlspecialchars($_POST['nom4']);

        $saison4 = htmlspecialchars($_POST['saison4']);

        $episode4 = htmlspecialchars($_POST['episode4']);

        $lien4 = htmlspecialchars($_POST['lien4']);

        $lien_img4 = htmlspecialchars($_POST['lien_img4']);

        $descr4 = htmlspecialchars($_POST['descr4']);

        $code_color4 = htmlspecialchars($_POST['code_color4']);

 



                                $insert = $bdd->prepare("INSERT INTO anime(nom, saison, episode, lien, lien_img, descr, code_color) VALUES(?, ?, ?, ?, ?, ?, ?)");

                                $insert->execute(array($nom4, $saison4, $episode4, $lien4, $lien_img4, $descr4, $code_color4));

    }

    if(!empty($_POST['nom5']) AND !empty($_POST['saison5']) AND !empty($_POST['episode5']) AND !empty($_POST['lien5']) AND !empty($_POST['lien_img5']) AND !empty($_POST['descr5']) AND !empty($_POST['code_color5']))

    {

        $nom5 = htmlspecialchars($_POST['nom5']);

        $saison5 = htmlspecialchars($_POST['saison5']);

        $episode5 = htmlspecialchars($_POST['episode5']);

        $lien5 = htmlspecialchars($_POST['lien5']);
        $lien_img5 = htmlspecialchars($_POST['lien_img5']);

        $descr5 = htmlspecialchars($_POST['descr5']);

        $code_color5 = htmlspecialchars($_POST['code_color5']);

 



                                $insert = $bdd->prepare("INSERT INTO anime(nom, saison, episode, lien, lien_img, descr, code_color) VALUES(?, ?, ?, ?, ?, ?, ?)");

                                $insert->execute(array($nom5, $saison5, $episode5, $lien5, $lien_img5, $descr5, $code_color5));

    }

    ?>