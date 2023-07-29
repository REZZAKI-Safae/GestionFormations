<?php
    session_start();
        if(isset($_SESSION['user'])){
            
            require_once('connexiondb.php');
            $idc=isset($_GET['idC'])?$_GET['idC']:0;

            $requeteInsc="select count(*) countInsc from inscription where idClient=$idc";
            $resultatInsc=$pdo->query($requeteInsc);
            $tabCountInsc=$resultatInsc->fetch();
            $nbrInscription=$tabCountInsc['countInsc'];
            
            if($nbrStag==0){
                $requete="delete from client where idClient=?";
                $params=array($idc);
                $resultat=$pdo->prepare($requete);
                $resultat->execute($params);
                header('location:client.php');
            }else{
                $msg="Suppression impossible: Vous devez supprimer toutes les inscriptions de ce client";
                header("location:alerte.php?message=$msg");
            }
            
         }else {
                header('location:login.php');
        }
    
    
    
    
?>