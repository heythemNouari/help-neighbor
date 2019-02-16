<?php 
session_start();
/* @author Guillaume KOSTRZEWSKI*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dépôt</title>
   
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="search.js"></script>
    <link rel="stylesheet" type="text/css" href="search.css">
</head>
<body>

<?php include("menu.php");
if(isset($_SESSION['user']))
{
	?>
<DIV ALIGN="CENTER">
<h1> Vous déposez: </h1>
</DIV>

<div class="container" >
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-service">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="service-form-link">Un service</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="bien-form-link">Un bien</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="service-form" action="proposer.php" method="post"  style="display: block;">
									<div class="form-group">
                                        <label> Selectionner la catégorie du service proposé: </label>
										<select name="categorie_s">
                                        <option value="aide menagere">aide ménagere</option>
                                        <option value="plombrie">plombrie</option>
                                        <option value="cours particuliers">cours particuliers</option>
                                        </select>
									</div>
									<div class="form-group">
                                        <label> Nom du service: </label>
										<input type="text" name="nom_s"  tabindex="2" class="form-control" placeholder="Nom">
									</div>
									<div class="form-group">
                                        <label> Courte description du service proposé: </label>
										<input type="text" name="des_s"  tabindex="2" class="form-control" placeholder="Description">
									</div>
									<div class="form-group">
                                        <label> Tarif horraire du service proposé: </label>
										<input type="int" name="tarif_s"  tabindex="2" class="form-control" placeholder="10€/heures">
									</div>
									<div class="form-group ">
										<h3>Disponiblités:</h3>
                                        <label> du : </label>
										<input type="date" tabindex="3" class="" name="d_debut_s">
										<label> jusqu'au : </label>
                                        <input type="date" tabindex="3" class="" name="d_fin_s">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="service-submit" id="service-submit" tabindex="4" class="form-control btn btn-service" value="Déposer">
											</div>
										</div>
									</div>
								</form>

								<form id="bien-form" action="proposer.php" method="post" style="display: none;">
									<div class="form-group">
                                        <label> Sélectionner la catégorie du bien: </label>
										<select name="categorie_b">
                                        <option value="Vehicule"> véhicule</option>
                                        <option value="Electromenager">électroménager</option>
                                        <option value="Outillage">meubles</option>
                                        </select>
									</div>
									<div class="form-group">
                                        <label> Titre de l'annonce: </label>
										<input type="text" name="nom_b"  tabindex="2" class="form-control" placeholder="Nom">
									</div>
									<div class="form-group">
                                        <label> Courte description du bien proposé: </label>
										<input type="text" name="des_b"  tabindex="2" class="form-control" placeholder="Exemple: Description générale, mode de fonctionnement, état,...">
									</div>
									<div class="form-group">
										<label for="icone">* Image du bien (JPG, PNG ou GIF) :</label><br />
										<input type="file" name="img" /><br />
									</div>
									<div class="form-group">
                                        <label> Tarif journalier: </label>
										<input type="int" name="tarif_b"  tabindex="2" class="form-control" placeholder="Exemple: 10€/jours">
									</div>
									<div class="form-group ">
										<h3>Disponiblités:</h3>
                                        <label> du : </label>
										<input type="date" tabindex="3" class="" name="d_debut_b">
										<label> jusqu'au : </label>
                                        <input type="date" tabindex="3" class="" name="d_fin_b">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="bien-submit" id="bien-submit" tabindex="4" class="form-control btn btn-bien" value="Déposer ">
											</div>
										</div>
										<div>
												<label><i>(*) facultatif</i></label>
											</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
        

<?php
/*     Service   */


if(isset ($_POST['nom_s']) && isset($_POST['categorie_s']) && isset($_POST['des_s']) && isset($_POST['tarif_s']) && isset($_POST['d_debut_s']) && isset($_POST['d_fin_s'])){


    $bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
    $sql = "INSERT INTO service (nom, categorie, des, tarif, d_debut, d_fin, id_membre) VALUES (?,?,?,?,?,?,?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$_POST['nom_s'], $_POST['categorie_s'], $_POST['des_s'], $_POST['tarif_s'], $_POST['d_debut_s'], $_POST['d_fin_s'],$_SESSION['id']]);
}



/*     Bien   */
elseif(isset ($_POST['nom_b']) && isset($_POST['categorie_b']) && isset($_POST['des_b']) && isset($_POST['tarif_b']) && isset($_POST['d_debut_b']) && isset($_POST['d_fin_b'])){

	
	$bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
    $sql = "INSERT INTO bien (nom, categorie, des, tarif, d_debut, d_fin) VALUES (?,?,?,?,?,?)";
	$stmt= $bdd->prepare($sql);
	$stmt->execute([$_POST['nom_b'], $_POST['categorie_b'], $_POST['des_b'], $_POST['tarif_b'], $_POST['d_debut_b'], $_POST['d_fin_b']]);
}








}
else { echo " vous n'etes pas connecté "; }
?>

</body>
</html>