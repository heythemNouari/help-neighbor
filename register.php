<?php 
session_start();
/* @author : NOUARI heythem , KOSTRZEWSKI Guillaume*/
if(!isset($_SESSION['user'])){

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>inscription</title>
    <link href="register.css" rel="stylesheet" >
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<?php include("menu.php"); ?>



<div id="fullscreen_bg" class="fullscreen_bg">
<div id="regContainer" class="container">
      <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              
              <div class="col-xs-6">
                <a href="#" id="register-form-link">inscription</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                
                <form id="register-form" action="register.php" method="post"  >
                <div class="form-group">
                    <label for="name">nom</label>
                    <input type="text" name="nom"  tabindex="1" class="form-control" placeholder="nom" value="" required>
                  </div>
                  <div class="form-group">
                    <label for="prenom">prenom</label>
                    <input type="text" name="prenom"  tabindex="1" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="email" name="email"  tabindex="1" class="form-control"  value="" required>
                  </div>
                  <div class="form-group">
                    <label for="password">mot de passe</label>
                    <input type="password" name="password"  tabindex="2" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirmer mot de passe </label>
                    <input type="password" name="password2"  tabindex="2" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label for="num de tel">numero de telephone </label>
                    <input type="number" name="tel"  tabindex="2" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label for="ville"> ville</label>
                    <input type="text" name="ville"  tabindex="2" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label for="adresse">adresse</label>
                    <input type="text" name="adresse"  tabindex="2" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="valider"  tabindex="4" class="form-control btn btn-register" value="s'inscrire">
                      </div>
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
if( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['tel']) && isset($_POST['ville']))
{   
   $bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
    /** verification de l'existence du mail */
    $b= $bdd->query(" SELECT email from membre where email ='".$_POST['email']."'");
    $bb= $b->fetch();
    if(!($bb == false))
    {
      ?>
      <div class="alert alert-warning">
        <strong> ce mail existe deja </strong> 
         </div>
  <?php
    }
    if( strcmp($_POST['password'],$_POST['password2'])== 0 && ($bb == false))
    {
    
        $sql = "INSERT INTO membre (nom,prenom, email, mdp, ville ,adresse, numero_telephone) VALUES (?,?,?,?,?,?,?)";
    $stmt= $bdd->prepare($sql);
    $stmt->execute([$_POST['nom'], $_POST['prenom'],$_POST['email'], $_POST['password'], $_POST['ville'] , $_POST['adresse'], $_POST['tel']]);

    
    ?>
     <div class="alert alert-success">
    <strong>membre enregistré ! bienvenue parmis nous</strong>
     
    
  </div>
  <?php
  
  }
    else{
        ?>
         <div class="alert alert-warning">
        <strong>mot de passe non egale</strong> 
         </div>
  <?php
    }
}

}
else 
{echo "vous etes déja connecté" ;}


?>
</body>
 </html>