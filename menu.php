<!-- @author : NOUARI heythem -->
<!DOCTYPE html>
<html lang="fr">


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">help-neibourgh</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">acceuil</a></li>
      
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
    if(!isset($_SESSION['user'])){
        ?>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> s'inscrire</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> se connecter</a></li>
    <?php } else { ?>
    <li><a href="deconnecter.php"><span class="glyphicon glyphicon-log-in"></span> se déconnecter</a></li>
    <li><a href="gestion.php"> Gestion</a></li>    
    <li><a href="supp.php"> suprrimer mon compte</a></li>
    <?php if($_SESSION['id'] == 1) {
      ?>
      <li><a href="admin.php"> administration</a></li>
    <?php }
       } ?>
    </ul>
  </div>
</nav>
  
</html>

