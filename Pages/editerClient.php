<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idC=isset($_GET['idC'])?$_GET['idC']:0;
    $requeteC="select * from client where idClient=$idC";
    $resultatC=$pdo->query($requeteC);
    $client=$resultatC->fetch();
    $nom=$client['nom'];
    $prenom=$client['prenom'];
    $naissance=$client['dateNaissance'];
    $cin=$client['CIN'];
    $civilite=strtoupper($client['civilite']);
    $adresse=$client['adresse'];
    $email=$client['email'];
    $telephone=$client['Telephone'];
    $niveau=$client['niveau'];
    $nomPhoto=$client['photo'];

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'un client </title>
          <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">s
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition du client :</div>
                <div class="panel-body">
                    <form method="post" action="updateClient.php" class="form"  enctype="multipart/form-data">
						<div class="form-group">
                             <label for="idC">id du client: <?php echo $idC ?></label>
                            <input type="hidden" name="idC" class="form-control" value="<?php echo $idC ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control" value="<?php echo $nom ?>"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"
                                   value="<?php echo $prenom ?>"/>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Date de naissance :</label>
                            <input type="text" name="naissance" placeholder="enter date de naissance" class="form-control"
                                   value="<?php echo $naissance ?>"/>
                        </div>
                              <div class="form-group">
                             <label for="prenom">CIN:</label>
                            <input type="text" name="cin" placeholder="entrer le numéro de la carte d'identité" class="form-control"
                                   value="<?php echo $cin ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="civilite">Civilité :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F"
                                    <?php if($civilite==="F")echo "checked" ?> checked/> F </label><br>
                                <label><input type="radio" name="civilite" value="M"
                                    <?php if($civilite==="M")echo "checked" ?>/> M </label>
                            </div>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Adresse :</label>
                            <input type="text" name="adresse" placeholder="adresse" class="form-control"
                                   value="<?php echo $adresse ?>"/>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Adresse Email :</label>
                            <input type="text" name="email" placeholder="Email" class="form-control"
                                   value="<?php echo $email?>"/>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Numéro de téléphone :</label>
                            <input type="text" name="telephone" placeholder="Téléphone" class="form-control"
                                   value="<?php echo $telephone ?>"/>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Niveau scolaire :</label>
                            <input type="text" name="niveau" placeholder="Niveau" class="form-control"
                                   value="<?php echo $niveau ?>"/>
                        </div>
                     
                        <div class="form-group">
                             <label for="photo">Photo :</label>
                            <input type="file" name="photo" />
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
</HTML>