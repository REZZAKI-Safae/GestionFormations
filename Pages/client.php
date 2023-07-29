

<?php
    require_once('identifier.php');
    
    require_once("connexiondb.php");
  
    $cinsearch=isset($_GET['cinsearch'])?$_GET['cinsearch']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:5;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    
if($cinsearch==''){
    
        $requete="select * from client order by idClient
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countC from client";
}else{
         $requete="select * from client where CIN like '%$cinsearch%'
                order by idClient
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countC from client
                where CIN like '%$cinsearch%'";
}
    

    $resultat=$pdo->query($requete);
    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrClient=$tabCount['countC'];
    $reste=$nbrClient % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrClient par $size
    if($reste===0) //$nbrC est un multiple de $size
        $nbrPage=$nbrClient/$size;   
    else
        $nbrPage=floor($nbrClient/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion des formations</title>
          <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
            <div class="container">
            <div class="panel panel-warning  margetop60">
            
				<div class="panel-heading">Rechercher des clients</div>
             
				<div class="panel-body">
					<form method="get" action="client.php" class="form-inline">
						<div class="form-group">
						
                            <input type="text" name="cinsearch" 
                                   placeholder="CIN"
                                   class="form-control"
                                   value="<?php echo $cinsearch ?>"/>
                         </div>
                        
				            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
                        <?php if($resultat->rowCount() == 0) { ?>{ 
                            Aucun résultat pour ce CIN } &nbsp;
                        <?php } ?>

					<form method="get" action="formation.php" class="form-inline">
                        &nbsp;
			            
                        <?php if ($_SESSION['user']['role']=='ADMIN') {?>
                       	
                            <a href="nouveauClient.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                                Nouveau client
                                
                            </a>   
                                        
                           <?php } ?> 
					</form>
				</form>
                </div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des clients (<?php echo $nbrClient ?> clients)</div>
                <div class="panel-body">
                    
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id client</th><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>CIN</th><th>Adresse</th><th>Email</th><th>Téléphone</th><th>Niveau Scolaire</th><th>Photo</th> <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th> Actions</th>
                                <?php }?>
                               
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($client=$resultat->fetch()){ ?>
                                <tr>
                                    <td><?php echo $client['idClient'] ?> </td>
                                    <td><?php echo $client['nom'] ?> </td>
                                    <td><?php echo $client['prenom'] ?> </td> 
                                    <td><?php echo $client['dateNaissance'] ?> </td>
                                    <td><?php echo $client['CIN'] ?> </td>
                                    <td><?php echo $client['adresse'] ?> </td> 
                                    <td><?php echo $client['email'] ?> </td>
                                    <td><?php echo $client['Telephone'] ?> </td>
                                    <td><?php echo $client['niveau'] ?> </td> 
                                     
                                     <td>
                                        <img src="../images/<?php echo $client['photo']?>"
                                        width=" 70px" height="70px" class="img-circle">
                                    </td> 
                                    <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	
                                        <td>
                                        <a href="inscrire.php?idC=<?php echo $client['idClient']?>">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>    &nbsp;       
                                          <a href="Details.php?idC=<?php echo $client['idClient']?>">
                                            <span class="glyphicon glyphicon-education"></span>
                                        </a>  <br>
                                            <a href="editerClient.php?idC=<?php echo $client['idClient'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer le client')"
                                                href="supprimerClient.php?idC=<?php echo $client['idClient'] ?>">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                <?php }?>
                                </tr>
                            <?php } ?>
                                
                       </tbody>
                    </table>
                    <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="client.php?page=<?php echo $i;?>&cinsearch=<?php echo $cinsearch ?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
                
                </div>
            </div>
        </div>
        </div>
    </body>
</HTML>