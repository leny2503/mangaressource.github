<?php 
if(isset($_GET['anime']) AND !empty($_GET['anime'])) {
	include_once 'auth/config.php';
$requser = $bdd->query('SELECT DISTINCT saison, nom, lien_img FROM anime WHERE nom LIKE "%'.$_GET['anime'].'%"');
 ?>
 <link rel="stylesheet" href="css/style.css">
 <link rel="shortcut icon" href="https://mangaressource.000webhostapp.com/bock.ico" type="image/x-icon">

 <style type="text/css">
.elevation-6dp {
	  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}

.card {
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
	-webkit-flex-direction: column;
	-ms-flex-direction: column;
	flex-direction: column;
	font-size: 16px;
	font-weight: 400;
	min-height: 200px;
	overflow: hidden;
	width: 320px;
	height: 252px;
	z-index: 1;
	position: relative;
	background: #fff;
	border-radius: 2px;
	box-sizing: border-box;
	margin: 0 20px 40px;
	float: left;
}

.card .title {
	-webkit-box-align: center;
	-webkit-align-items: center;
	-ms-flex-align: center;
	align-items: center;
	color: #000;
	display: -webkit-flex;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-pack: stretch;
	-webkit-justify-content: stretch;
	-ms-flex-pack: stretch;
	justify-content: stretch;
	line-height: normal;
	padding: 16px;
	-webkit-perspective-origin: 165px 56px;
	perspective-origin: 165px 56px;
	-webkit-transform-origin: 165px 56px;
	-ms-transform-origin: 165px 56px;
	transform-origin: 165px 56px;
	box-sizing: border-box;
}

.card .supporting-text {
	color: rgba(0, 0, 0, .54);
	font-size: 13px;
	line-height: 18px;
	overflow: hidden;
	padding: 16px;
	width: 90%;
}
 </style>
<!DOCTYPE html>
<html>
<head>
	<title>Résultat de : <?php echo $_GET['anime'] ?></title>
</head>
<body>
	<h1>Résultats de recherche : <?php echo $_GET['anime'] ?></h1>
	<br>
    <img src="img/la_banniere_2_leny_V3.3.png" class="img1">
	<?php if($requser->rowCount() > 0) { ?>
   <?php while($anime = $requser->fetch()) { ?>
   	<center>
   		<style type="text/css">
   			a{
   				text-decoration: none;
   			}
   		</style>

   		<div class="card elevation-6dp" style="cursor: pointer;"><a href="anime/index.php?anime=<?php echo $anime['nom'] ?>&epis=1&sais=<?php echo $anime['saison'] ?>">
	<div class="title">
		<?php echo $anime['nom'] ?>
	</div>
	<div class="supporting-text">
		Saison n° <?php echo $anime['saison']; ?>
	</div>
	<img src="img/<?php echo $anime['lien_img']; ?>">
</div></a>
   	</center>
   	

   <?php }
}else echo "<h1 style='text-shadow: 0px 0px 17px rgb(255, 0, 0);'>Aucune résultat</h1>"; ?>

</body>
</html>
<?php }else header("Location: index.php") ?>