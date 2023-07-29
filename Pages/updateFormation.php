<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $idf=isset($_POST['idF'])?$_POST['idF']:0;

    $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";

    $description=isset($_POST['description'])?$_POST['description']:"";

     $nomPhoto=isset($_FILES['image']['name'])?$_FILES['image']['name']:"";
    $imageTemp=$_FILES['image']['tmp_name'];
    move_uploaded_file($imageTemp,"../images/".$nomPhoto);

    echo $nomPhoto ."<br>";
    echo $imageTemp;
    if(!empty($nomPhoto)){
        $requete="update formation set nomFormation=?, description=?,image=? where idFormation=?";

          $params=array($nomf,$description,$nomPhoto,$idf);
    }else{
         $requete="update formation set nomFormation=?, description=? where idFormation=?";
         $params=array($nomf,$description,$idf);
    }

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:formation.php');
?>



