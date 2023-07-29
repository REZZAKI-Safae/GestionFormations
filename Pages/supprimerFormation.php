<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $idf=isset($_GET['idF'])?$_GET['idF']:0;

            $requeteInsc="select count(*) countInsc from inscription where idFormation=$idf";
            $resultatInsc=$pdo->query($requeteInsc);
            $tabCountInsc=$resultatInsc->fetch();
            $nbrInscription=$tabCountInsc['countInsc'];
            
            if($nbrInsc==0){
                $requete="delete from formation where idFormation=?";
                $params=array($idf);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:formation.php');
            }else{
                $msg="Suppression impossible: Vous devez supprimer toutes les inscriptions faites dans cette formation";
                header("location:alerte.php?message=$msg");
            }
            
         }else {
                header('location:login.php');
        }
    
    
    
    
?>