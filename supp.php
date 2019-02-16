<?php

session_start();
/* @author : NOUARI heythem */
$bdd = new PDO('mysql:host=prodpeda-venus;dbname=hnouari;charset=utf8', 'hnouari', '18081997');
    $sql = $bdd->query("DELETE from bien where id_membre=".$_SESSION['id']);
    $sql = $bdd->query("DELETE from service where id_membre=".$_SESSION['id']); 
    $sql = $bdd->query("DELETE from membre where id=".$_SESSION['id']);
    session_destroy();
    header("Location: home.php");


?>