<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idI=isset($_POST['idI'])?$_POST['idI']:0;
    $dateF=isset($_POST['dateF'])?$_POST['dateF']:"";
    $duree=isset($_POST['duree'])?$_POST['duree']:"";
    $paiement=isset($_POST['paiement'])?$_POST['paiement']:"";


    $requete="update inscription set date=?,duree=?,paiement=? where idInscription=?";
    $params=array($dateF,$duree,$paiement,$idI);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:inscriptions.php');

?>