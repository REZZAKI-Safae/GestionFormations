<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idC=isset($_POST['idC'])?$_POST['idC']:0;
    $nom=isset($_POST['nom'])?$_POST['nom']:"";
    $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
    $naissance=isset($_POST['naissance'])?$_POST['naissance']:"";
    $cin=isset($_POST['cin'])?$_POST['cin']:"";
    $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
    $adresse=isset($_POST['adresse'])?$_POST['adresse']:"";
    $email=isset($_POST['email'])?$_POST['email']:"";
    $telephone=isset($_POST['telephone'])?$_POST['telephone']:"";
    $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";

    $nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $imageTemp=$_FILES['photo']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    echo $nomPhoto ."<br>";
    echo $imageTemp;
    if(!empty($nomPhoto)){
       $requete="update client set nom=?,prenom=?,CIN=?,civilite=?,email=?,Telephone=?,adresse=?,niveau=?, photo=?,dateNaissance=? where idClient=?";
         $params=array($nom,$prenom,$cin,$civilite,$email,$telephone,$adresse,$niveau,$nomPhoto,$naissance,$idC);
    }else{
        $requete="update client set nom=?,prenom=?,CIN=?,civilite=?,email=?,Telephone=?,adresse=?,niveau=?,dateNaissance=?where idClient=?";
        $params=array($nom,$prenom,$cin,$civilite,$email,$telephone,$adresse,$niveau,$naissance,$idC);
    }

    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:client.php');

?>