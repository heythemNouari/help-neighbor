
<?php 
session_start();
/* @author : NOUARI heythem */
if(!isset($_SESSION['user'])){

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Se connecter</h3>
				
			</div>
			<div class="card-body">
				<form action = "login.php"  method= "post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name ="email" type="email" class="form-control" placeholder="email" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="mdp" type="password" class="form-control" placeholder="mot de passe" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">se souvenir de moi
					</div>
					<div class="form-group">
						<input type="submit" value="connexion" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			
			
		</div>
	</div>
</div>




<?php
if(isset($_POST['email']) && isset($_POST['mdp'])){
    
    $bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
    $rep = $bdd->prepare("select * from membre where email='".$_POST['email']."' and mdp='".$_POST['mdp']."'");
    $rep->execute();
    $res=$rep->fetchAll(PDO::FETCH_ASSOC);
    if($res != false)
	{ $_SESSION['user']=$res[0]['nom'];
		$_SESSION['id']=$res[0]['id'];
        header("Location: home.php");
    }  
    else {
    ?>
     <div class="alert alert-danger">
    <strong>email ou mot de passe incorrect</strong> 
  </div>
  <?php
        
    }
}

}
else echo "vous etes déja connecté" ;


?>
</body>
</html>