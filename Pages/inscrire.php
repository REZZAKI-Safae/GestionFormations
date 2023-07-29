                        
                        <?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idC=isset($_GET['idC'])?$_GET['idC']:0;
    $requeteC="select * from client where idClient=$idC";
    $resultatC=$pdo->query($requeteC);
    $client=$resultatC->fetch();
    $nom=$client['nom'];
    $prenom=$client['prenom'];
    $requeteF="select * from formation";
    $resultatF=$pdo->query($requeteF);
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Nouveau client</title>
          <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                <div class="panel panel-info margetop60">
             <div class="panel panel-primary ">
                <div class="panel-heading">Saisir les infos de la formation désirée :</div>
                <div class="panel-body">
                    <form method="post" action="insertInscription.php" class="form"  enctype="multipart/form-data">
                       <div class="form-group">
                           <label for="idC"><b style="color: rgb(231 113 35 / 95%); font-size:1.1em;">id du client&nbsp;:</b> <b><?php echo $idC ?></b></label>
                            <input type="hidden" name="idC" class="form-control" value="<?php echo $idC ?>"/>
                       </div>
                    <div class="form-group"><b style="color: rgb(231 113 35 / 95%); font-size:1.1em;">Nom du client :&nbsp;</b><?php echo $nom ?>&nbsp;
                            <b style="color: rgb(231 113 35 / 95%); font-size:1.1em;">Prénom du client :&nbsp;</b><?php echo $prenom ?>
                </div>
                        
                             <div class="form-group">
                            <label for="idFormation">Formation:</label>
				            <select name="idFiliere" class="form-control" id="idFiliere">
                              <?php while($formation=$resultatF->fetch()) { ?>
                                <option value="<?php echo $formation['idFormation'] ?>"> 
                                    <?php echo $formation['nomFormation'] ?>
                                </option>
                              <?php }?>
				            </select>
                        </div>
                        <div class="form-group">
                             <label for="dateF">Date de début de formation :</label>
                            <input type="text" name="dateF" placeholder="Date de début" class="form-control"/>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Durée:</label>
                            <input type="text" name="duree" placeholder="enter la durée" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="paiement">Paiement:</label>
                            <div class="radio">
                                <label><input type="radio" name="paiement" value="N" checked/> N </label><br>
                                <label><input type="radio" name="paiement" value="P"/> P </label>
                            </div>
                        </div>

				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
					</form>
                 </div>
            </div>   
        </div>    
        </div>
    </body>
</HTML>