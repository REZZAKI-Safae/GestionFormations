²<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
    $idI=isset($_GET['idI'])?$_GET['idI']:0;
    $requeteI="select * from inscription where idInscription=$idI";
    $resultatI=$pdo->query($requeteI);
    $inscription=$resultatI->fetch();
    $dateF=$inscription['date'];
    $duree=$inscription['duree'];
    $paiement=$inscription['paiement'];

?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Edition d'une filière</title>
          <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de l'inscription :</div>
                <div class="panel-body">
                    <form method="post" action="updateInscription.php" class="form">
						<div class="form-group">
                             <label for="id">Id de l'inscription: <?php echo $idI ?></label>
                            <input type="hidden" name="idI" 
                                   class="form-control"
                                    value="<?php echo $idI ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="date">Date de la formation:</label>
                            <input type="text" name="dateF" 
                                   placeholder="date de début de formation"
                                   class="form-control"
                                   value="<?php echo $dateF ?>"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="duree">La durée de la formation:</label>
                            <input type="text" name="duree" 
                                   placeholder="Donner la durée la formation"
                                   class="form-control"
                                   value="<?php echo $duree ?>"/>
				           
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
    </body>
</HTML>