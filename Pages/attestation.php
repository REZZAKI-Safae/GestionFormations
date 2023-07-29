<?php
require('../Pages/role.php');
require_once("../Pages/connexiondb.php");
require_once("../les_fonctions/fonctions.php");
require_once '../pages/phpqrcode/phpqrcode/qrlib.php';

//$pdo = new PDO("mysql:host=localhost;dbname=ecoledb", "root", "");

if (isset($_GET['idI']))
    $idI = $_GET['idI'];
else
    $idI = 0;
$requete = $pdo->query("select * from inscription join client join formation where client.idClient=inscription.idClient and formation.idFormation=inscription.idFormation and idInscription=$idI");
$client = $requete->fetch();

$nom_prenom = strtoupper($client['nom'] . "  " . $client['prenom']);

$date_naiss = dateEnToDateFr($client['dateNaissance']);

$cin = strtoupper($client['CIN']);

$date_insc = dateEnToDateFr($client['date']);

$num_insc = strtoupper($client['idInscription']);

$formation = strtoupper($client['nomFormation']);
$date = date('d/m/20y');


    
?>
<!DOCTYPE html>
<html lang="fr">
 <head>
    <meta charset="utf-8"/>
      <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
     <title>Gestion des formations</title>
          
 <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .all{
            background-image: url('../images/Version-Web.jpg');
            width : 1015px; height : 710px;
            margin-top: 0em;
            margin-bottom: 0.5em;
            margin-left: 4em;
        }
        
        .frame{
            margin-bottom: 5%;
            margin-left: 2%;
             width : 150px; height : 100px;
            
        }
        
        .id{
         font-size: 1.1em;
        }
        .title{
            margin-left: 40%;
            text-decoration: underline;
            margin-bottom: 4%;
        }
        .Qr{
            margin-left: 83.5%;
            border: 3px  solid #000;
            width:6em;
            height: 6em;
            
        }
@media print{
    .print{
        display: none;
    }
}
.print{
    margin-left: 10px;
    color: rgb(0, 0, 0);
    background-color: rgb(255, 255, 255);
    font-size: 30px;
    border: 1px solid #fc978d;
    border-radius: 20px;
}
        .nom{
            font-size: 1.9em;
            font-family: "Fira Sans", Rockwell, sans-serif;
             font-weight: bold;
            color: #B22222;    
            margin-top: 4.7em;
            text-decoration: underline;
        }
        .cin{
            font-size:1.2em;
             font-weight: bold;
        }
        .cin h3{
            text-decoration: underline;
        }
        .date{
             font-size:1.3em;
             font-weight: bold;
            margin-left: 10em;
            margin-top: 2.9em;
        }
        .num{
            font-size: 1.5em;
            font-family: "Fira Sans", Rockwell, sans-serif;
            font-weight: bold;
            color: #000;    
            margin-left: 2em;
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    
    <div class='all'>
        <button onclick="window.print()" class="print"><i class="fa fa-print" aria-hidden="true"></i></button>
    
    <div class="id">
        <p class="num"> N° <?php echo $num_insc ?>
         <center>  <p class="nom"> <?php echo $nom_prenom ?> </p></center>
        </div>
        <div class="cin">
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;DE CIN N° <?php echo $cin ?> A MENE A BIEN LE PROGRAMME DE FORMATION PROFESSIONNELLE EN <br>
            <center><h3> <?php echo $formation ?></h3></center></p>
        </div>
        <div class='date'><?php echo $date_insc ?> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <?php echo $date ?>
        </div>
    <div class="Qr">
        <?php
            $path='../pages/phpqrcode/images/';
            $file=$path.uniqid().".png";
            $data='http://localhost/CompetenceCenter/pages/attestation.php?idI=$idI';
            //$text .="Cette attestation est donnée à L'éléve  $nom_prenom Né (e) le  $date_naiss  titulaire de la carte CIN N°: $cin inscrit (e) le : $date_insc sous le N° : $num_insc à la formation de  $formation ";
            QRcode::png($data,$file,'L',2.5,3);
            echo "<center><img src='".$file."'></center>";
        ?>
    </div>
    </div>
    </body>
   

</html>