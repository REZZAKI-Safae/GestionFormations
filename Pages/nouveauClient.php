<?php
    require_once('identifier.php');
    require_once('connexiondb.php');
   
    
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
                       
             <div class="panel panel-primary margetop60">
                <div class="panel-heading">Les infos du nouveau client :</div>
                <div class="panel-body">
                    <form method="post" action="insertClient.php" class="form"  enctype="multipart/form-data">
						
                        <div class="form-group">
                             <label for="nom">Nom :</label>
                            <input type="text" name="nom" placeholder="Nom" class="form-control"/>
                        </div>
                        <div class="form-group">
                             <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control"/>
                        </div>
                         <div class="form-group">
                             <label for="naissance">Date de naissance :</label>
                            <input type="text" name="naissance" placeholder="enter date de naissance" class="form-control"/>
                        </div>
                              <div class="form-group">
                             <label for="cin">CIN:</label>
                            <input type="text" name="cin" placeholder="entrer le numéro de la carte d'identité" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="civilite">Civilité :</label>
                            <div class="radio">
                                <label><input type="radio" name="civilite" value="F" checked/> F </label><br>
                                <label><input type="radio" name="civilite" value="M"/> M </label>
                            </div>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Adresse :</label>
                            <input type="text" name="adresse" placeholder="adresse" class="form-control"/>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Adresse Email :</label>
                            <input type="text" name="email" placeholder="Email" class="form-control"/>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Numéro de téléphone :</label>
                            <input type="text" name="telephone" placeholder="Téléphone" class="form-control"/>
                        </div>
                         <div class="form-group">
                             <label for="prenom">Niveau scolaire :</label>
                            <input type="text" name="niveau" placeholder="Niveau" class="form-control"/>
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