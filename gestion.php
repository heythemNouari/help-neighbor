<?php 
session_start();
/* @author KOSTRZEWSKI Guillaume*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>gestion</title>
   
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="search.js"></script>
    <link rel="stylesheet" type="text/css" href="gestion.css">
</head>
<body>

<?php include("menu.php");
if(isset($_SESSION['user'])){
	?>
<DIV ALIGN="CENTER">
<h1> Gestion:  </h1>
</DIV>

<!--<div class="container" >-->
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-service">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-10">
								<a href="#" class="active" id="service-form-link">Mes Services</a>
							</div>
							<div class="col-xs-5">
								<a href="#" id="bien-form-link">Mes Biens</a>
							</div>
							
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="service-form" action="gestion.php" method="post"  style="display: block;">
									<div class="form-group">
										<?php
											$bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
											$sq=$bdd->query("SELECT * FROM service where id_membre=".$_SESSION['id']);
										
											while ($data = $sq->fetch()) {
												// on affiche les résultats
												echo ' Nom: '.$data['nom'];
												echo ' Catégorie: '.$data['categorie'];
												echo ' Tarif: '.$data['tarif'];
												echo ' Date de début: '.$data['d_debut'];
												echo ' Date de fin: '.$data['d_fin'];
												?><input type="checkbox" name="a_suppr_s" value="<?php echo $data['id'];?>"><br />
												<?php
												;
											}
											?>
											<input type="submit"  id="suppr-submit" class="form-control btn btn-suppr" value="Supprimer">
									</div>
								</form>
								<form id="bien-form" action="gestion.php" method="post"  style="display: none;">
									<div class="form-group">
										<?php
											$bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
											$sq=$bdd->query("SELECT * FROM bien where id_membre=".$_SESSION['id']);
										
											while ($data = $sq->fetch()) {
												// on affiche les résultats
												echo ' Nom: '.$data['nom'];
												echo ' Catégorie: '.$data['categorie'];
												echo ' Tarif: '.$data['tarif'];
												echo ' Date de début: '.$data['d_debut'];
												echo ' Date de fin: '.$data['d_fin'];
												?><input type="checkbox" name="a_suppr_b" value="<?php echo $data['id'];?>"><br />
												<?php
												;
											}
										?>
										<input type="submit"  id="suppr-submit" class="form-control btn btn-suppr" value="Supprimer">
									</div>									
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        
    </body>
	</html>

<?php	
if(isset($_POST['a_suppr_s'])){
	$bdd=new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
	$sup=$bdd->query("DELETE from service where id=".$_POST['a_suppr_s']);
}
if(isset($_POST['a_suppr_b'])){
	$bdd=new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
	$sup=$bdd->query("DELETE from bien where id=".$_POST['a_suppr_b']);
}

}

else {echo " vous n'etes pas connecté utiliser la barre en haut pour se connecter" ; }
?>