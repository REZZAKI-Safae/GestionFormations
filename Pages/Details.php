<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    $idC=isset($_GET['idC'])?$_GET['idC']:0;
    $requete="select * from inscription join client join formation where client.idClient=inscription.idClient and formation.idFormation=inscription.idFormation and inscription.idClient=$idC limit $size
                offset $offset";
    $requeteCount="select count(*) countF from inscription";
    $resultatI=$pdo->query($requete);
    $resultatCount=$pdo->query($requeteCount);
    $tabCount=$resultatCount->fetch();
    $nbrInsc=$tabCount['countF'];
    $reste=$nbrInsc % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFormation par $size
    if($reste===0) //$nbrF est un multiple de $size
        $nbrPage=$nbrInsc/$size;   
    else
        $nbrPage=floor($nbrInsc/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des formations</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
          <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
            <div class="container">
             <div class="panel panel-info margetop60">
           
				<div class="panel-heading"><b>Id du client :&nbsp;</b><?php echo $idC ?></div>
			
                </div>
    
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des inscriptions (<?php echo $nbrInsc ?> inscriptions)</div>
                <div class="panel-body">
                    <div class="form-group">
                             <label for="idC">id du client: <?php echo $idC ?></label>
                            <input type="hidden" name="idC" class="form-control" value="<?php echo $idC ?>"/>
                        </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id Inscription </th><th>Nom de la formation</th><th>Nom</th><th>Prénom</th><th>CIN</th><th>Email</th><th>Téléphone</th><th>date d'inscription</th><th>Durée de formation</th><th>Paiement</th> <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th> Actions</th>
                                <?php }?>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($inscription=$resultatI->fetch()){ ?>
                                <tr>
                                    <td><?php echo $inscription['idInscription'] ?> </td>
                                    <td><?php echo $inscription['nomFormation']?></td>
                                    <td><?php echo $inscription['nom'] ?> </td>
                                    <td><?php echo $inscription['prenom'] ?> </td> 
                                    <td><?php echo $inscription['CIN'] ?> </td> 
                                    <td><?php echo $inscription['email'] ?> </td>
                                    <td><?php echo $inscription['Telephone'] ?> </td>
                                    <td><?php echo $inscription['date'] ?> </td>
                                    <td><?php echo $inscription['duree'] ?> </td>
                                    <td><?php echo $inscription['paiement']?></td>
                                    <td>
                                         <a href="../pages/attestation.php?idI=<?php echo $inscription['idInscription'] ?>">
                                                <span class="glyphicon glyphicon-print" style="color: rgb(255,99,71)"></span>
                                            </a>
                                        <br><br>
                                        
                                            <a href="editerInscription.php?idI=<?php echo $inscription['idInscription'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>

                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer cette inscription')"
                                                href="supprimerInscription.php?idI=<?php echo $inscription['idInscription'] ?>">
                                                    <span class="glyphicon glyphicon-trash" ></span>
                                            </a>
                                        </td>
                                </tr>
                            <?php } ?>
                                
                       </tbody>
                    </table>                                                                  
                    <div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
                              <a href="formation.php?page=<?php echo $i;?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </body>
</HTML>