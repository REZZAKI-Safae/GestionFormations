<?php
    require_once('identifier.php');
    require_once("connexiondb.php");
    $size=isset($_GET['size'])?$_GET['size']:4;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $nomF=isset($_GET['nomF'])?$_GET['nomF']:"";
    $offset=($page-1)*$size;
  
    $requeteCount="select count(*) countF from formation";
    $requeteF="select * from formation order by nomFormation";

if($nomF==''){
    
        $requete="select * from formation limit $size
                offset $offset";
      $requeteCount="select count(*) countF from formation";
}else{
         $requete="select * from formation where nomFormation like '%$nomF%'
                limit $size
                offset $offset";
        
        $requeteCount="select count(*) countC from formation
                where nomFormation like '%$nomF%'";
}



    $resultatF=$pdo->query($requeteF);
    $resultatCount=$pdo->query($requeteCount);
    $resultat=$pdo->query($requete);
    $tabCount=$resultatCount->fetch();
    $nbrFormation=$tabCount['countF'];
    $reste=$nbrFormation % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFormation par $size
    if($reste===0) //$nbrF est un multiple de $size
        $nbrPage=$nbrFormation/$size;   
    else
        $nbrPage=floor($nbrFormation/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Gestion des formations</title>
        <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        <?php include("menu.php"); ?>
            <div class="container">
              <div class="panel panel-success margetop60">
           
				<div class="panel-heading">Consulter les formations</div>
				<div class="panel-body">
                    <form method="get" action="formation.php" class="form-inline">
						<div class="form-group">
						
                             <label for="idFormation">Formation:</label>
				            <select name="nomF" class="form-control" id="nomF">
                              <?php while($formation=$resultatF->fetch()) { ?>
                                <option value="<?php echo $formation['nomFormation'] ?>">
                                    <?php echo $formation['nomFormation'] ?>
                                </option>
                              <?php }?>
				            </select>
                         </div>
                        
				            
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-search"></span>
                            Chercher...
                        </button> 
					<form method="get" action="formation.php" class="form-inline">
                           	<?php if ($_SESSION['user']['role']=='ADMIN') {?>               
                         
			            
                       	
                            <a href="nouvelleFormation.php">
                            
                                <span class="glyphicon glyphicon-plus"></span>
                                
                                Nouvelle formation
                                
                            </a>          
                        <?php } ?>  
					</form>
                    </form>
			</div>
            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des formations (<?php echo $nbrFormation ?> formations)</div>
                <div class="panel-body">
                    
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id formation</th><th>Nom formation</th><th>Description</th><th>Image</th> <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	<th>Actions</th>
                                <?php }?>
                               
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php while($formation=$resultat->fetch()){ ?>
                                <tr>
                                    <td><?php echo $formation['idFormation'] ?> </td>
                                    <td><?php echo $formation['nomFormation'] ?> </td>
                                    <td><?php echo $formation['description'] ?> </td> 
                                     <td>
                                        <img src="../images/<?php echo $formation['image']?>"
                                        width="60px" height="60px" class="img-carre">
                                    </td> 
                                    <?php if ($_SESSION['user']['role']== 'ADMIN') {?>
                                	
                                
                                        <td>
                                            <a href="editerFormation.php?idF=<?php echo $formation['idFormation'] ?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            &nbsp;
                                            <a onclick="return confirm('Etes vous sur de vouloir supprimer la formation')"
                                                href="supprimerFormation.php?idF=<?php echo $formation['idFormation'] ?>">
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
        </div>
    </body>
</HTML>



					
						