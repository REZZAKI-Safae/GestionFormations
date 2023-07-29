<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $idI=isset($_GET['idI'])?$_GET['idI']:0;
            
                $requete="delete from inscription where idInscription=?";
                $params=array($idI);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:inscriptions.php');
         }else {
                header('location:login.php');
        }
    
    
    
    
?>