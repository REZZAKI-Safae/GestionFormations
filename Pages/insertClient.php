<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
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
    
     $requete="insert into client(nom,prenom,CIN,civilite,email,Telephone,adresse,niveau,photo,dateNaissance) values(?,?,?,?,?,?,?,?,?,?)";
     $params=array($nom,$prenom,$cin,$civilite,$email,$telephone,$adresse,$niveau,$nomPhoto,$naissance);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    
    header('location:client.php');

?>