<?php
    require_once('identifier.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Menu</title>
  <meta charset="utf-8">
      <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
            <a class="navbar-brand bold font-2" style="color: rgb(231 113 35 / 95%); font-size:1.4em;" href="../index.php">
			Competence Center
		</a>
		
        
		</div>
		
		<ul class="nav navbar-nav">
					
			<li><a href="client.php">
                <span class="glyphicon glyphicon-user"></span>
                
                    &nbsp; Les Clients
                </a>
            </li>
			
			<li><a href="formation.php">
                  <span class="glyphicon glyphicon-education"></span>
                
                    &nbsp; Les Formations
                </a>
            </li>
            <li><a href="inscriptions.php">
                      <span class="glyphicon glyphicon-plus"></span>
                    &nbsp Les Inscriptions
                </a>
            </li>
			
			<?php if ($_SESSION['user']['role']=='ADMIN') {?>
					
				<li><a href="Utilisateurs.php">
                                    <span class="glyphicon glyphicon-user"></span>

                        &nbsp Les utilisteurs
                    </a>
                </li>
				
			<?php }?>
			
		</ul>
		
		
		<ul class="nav navbar-nav navbar-right">
					
			<li>
				<a href="editerUtilisateur.php?id=<?php echo $_SESSION['user']['iduser'] ?>">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;
					<?php echo  ' '.$_SESSION['user']['login']?>
				</a> 
			</li>
			
			<li>
				<a href="seDeconnecter.php">
                    <span class="glyphicon glyphicon-log-out"></span>
					Se déconnecter
                    
				</a>
			</li>
							
		</ul>
		
	</div>
</nav>