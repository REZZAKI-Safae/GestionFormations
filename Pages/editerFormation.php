<?php
   require_once('identifier.php');
    require_once('connexiondb.php');
    $idf=isset($_GET['idF'])?$_GET['idF']:0;
    $requete="select * from formation where idFormation=$idf";
    $resultat=$pdo->query($requete);
    $formation=$resultat->fetch();
    $nomf=$formation['nomFormation'];
    $description =strtolower($formation['description']);
    $nomPhoto=$formation['image'];
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
                <div class="panel-heading">Edition de la formation :</div>
                <div class="panel-body">
                    <form method="post" action="updateFormation.php" class="form" enctype="multipart/form-data">
						<div class="form-group">
                             <label for="niveau">Id de la formation: <?php echo $idf ?></label>
                            <input type="hidden" name="idF" 
                                   class="form-control"
                                    value="<?php echo $idf ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label for="description">Nom de la formation:</label>
                            <input type="text" name="nomF" 
                                   placeholder="Nom de la filière"
                                   class="form-control"
                                   value="<?php echo $nomf ?>"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" name="description" 
                                   placeholder="Décrire la formation"
                                   class="form-control"
                                   value="<?php echo $description ?>"/>
				           
                        </div>
                          <div class="form-group">
                             <label for="image">Image :</label>
                            <input type="file" name="image" />
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