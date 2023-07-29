<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    
    $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";
    $description=isset($_POST['description'])?strtoupper($_POST['description']):"";

    $nomPhoto=isset($_FILES['image']['name'])?$_FILES['image']['name']:"";
    $imageTemp=$_FILES['image']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    $requete="insert into formation(nomFormation,description,image) values(?,?,?)";
    $params=array($nomf,$description,$nomPhoto);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
    header('location:formation.php');
    
?>