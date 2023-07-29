<?php 
    require_once('identifier.php');
    require_once('connexiondb.php');
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Nouvelle filière</tit>
          <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
        
        <div class="container">
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Veuillez saisir les données de la nouvelle formation</div>
                <div class="panel-body">
                    <form method="post" action="insertFormation.php" class="form" enctype="multipart/form-data">
						
                        <div class="form-group">
                             <label for="description">Nom de la formation:</label>
                            <input type="text" name="nomF" 
                                   placeholder="Nom de la formation"
                                   class="form-control"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" name="description" 
                                   placeholder="décrire la formation"
                                   class="form-control"/>
				          
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