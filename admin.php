<?php 
session_start();
/* author : NOUARI Heythem */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>administration</title>
    <link href="admin.css" rel="stylesheet" >
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<?php  include("menu.php") ; 
if($_SESSION['id']==1){
	?>
<div class="container">
<div class="card">
<table>

   <tr>
       <td><center>id du membre</center></td>
       <td> <center>ratio</center> </td>
       
   </tr>
   <?php
   $i=0;
   	 $bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
   	 $req = $bdd->query(" select id,ratio from membre  ");
   	 while($d=$req->fetch()){
   ?>

   <tr>
       <td><?php echo $d['id'] ?></td>
       <td><?php echo $d['ratio'] ?></td>
       
<?php } ?>
</table>
</div>
<h3> supression d'un memebre en cas de ratio tres élevé </h3>
<form action="admin.php" method="post">
si vous souaiter supprimer un membre saisissez : </br>
<div class="form-group">
<label>son id : </label><input type="number" name="id" value="id" > </br>
<input type="submit" name="submit" value="supprimer">
</div>
</form>

</div>

</body>
</html>

<?php
if(isset($_POST['id'])){
	$bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
   	$req = $bdd->query(" delete from membre where id= ".$_POST['id']);
   	?>
   	<div class="alert alert-success">
    <strong>membre supprimé ! </strong>
     </div>

<?php } 
}

else{ echo "vous n'etes pas un admin " ; }?>