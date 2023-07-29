<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idC=isset($_POST['idC'])?$_POST['idC']:0;
    $dateF=isset($_POST['dateF'])?$_POST['dateF']:"";
    $duree=isset($_POST['duree'])?$_POST['duree']:"";
    $paiement=isset($_POST['paiement'])?$_POST['paiement']:"";
    $idFormation=isset($_POST['idFiliere'])?$_POST['idFiliere']:1;
    $requete="insert into inscription(idClient,idFormation,date,duree,paiement) values(?,?,?,?,?)";
    $params=array($idC,$idFormation,$dateF,$duree,$paiement);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:inscriptions.php');

?>