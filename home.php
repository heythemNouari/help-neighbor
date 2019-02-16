<?php
session_start();
/* @author : NOUARI heythem */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <title>acceuil</title>
  <meta charset="utf-8">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
<?php include("menu.php"); ?>
  
<div class="container">
  
  <div class="gauche">
    <div class="portion">
  <center><a class="btn btn-bien" href="search.php"> rechercher un service ou un bien </a></center>
    </div>
  </div>
  <div class="droite">
   <div class="portion">
      <center><a href="proposer.php" class="btn btn-bien"> proposer un service ou un bien </a></center>
  
    </div>
</div>

</body>
</html>