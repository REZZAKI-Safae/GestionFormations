<?php

function rechercher_par_login($login){
    global $pdo;
    $requete=$pdo->prepare("select * from utilisateur where login =?");
    $requete->execute(array($login));
    return $requete->rowCount();
}

function rechercher_par_email($email){
    global $pdo;
    $requete=$pdo->prepare("select * from utilisateur where email =?");
    $requete->execute(array($email));
    return $requete->rowCount();
}

function rechercher_user_par_email($email){
    global $pdo;

    $requete=$pdo->prepare("select * from utilisateur where email =?");

    $requete->execute(array($email));

    $user=$requete->fetch();

    if($user)
        return $user;
    else
        return null;
}
function dateEnToDateFr($dateEn)
{
    //$dateEn='2019-02-26';
    return substr($dateEn, 8, 2) . "/" . substr($dateEn, 5, 2) . "/" . substr($dateEn, 0, 4);
    // Result: '26/02/2019'
}

function dateFrToDateEn($dateFr)
{
    //$dateFR='26/02/2019';
    return substr($dateFr, 6, 4) . "-" . substr($dateFr, 3, 2) . "-" . substr($dateFr, 0, 2);
    // Result: '2019-02-26'
}
