<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Piscine.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  


</head>
<body>

<nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#"><img src="NGA.png" class="img-responsive" style="width: 70px; height: 50px;"></a>
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="nav navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Catégories <span class="caret"></span>
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Ferraille ou Trésor</a><br>
            <a class="dropdown-item" href="#">Bon pour le Musée</a><br>
            <a class="dropdown-item" href="#">Accessoire VIP</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Achats <span class="caret"></span>
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Enchères</a><br>
            <a class="dropdown-item" href="#">Achats Immédiats</a><br>
            <a class="dropdown-item" href="#">Meilleur Offre</a>
          </div>
        </li>
    </ul>
        <form id="form_rechercher" class="form-inline nav navbar-nav" role="form">
            <div class="form-group has-success has-feedback">
              <label class="control-label" for="rechercher"></label>
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
              <input class="nav navbar-nav form-control" type="text" class="" id="rechercher"  placeholder="Recherche">            
            </div>
          </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-usd"></span> Vendre</a></li>
            <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-user"></span> Mon Compte</a></li>
            <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
        </ul>
    </div>
</nav>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$bdd = new mysqli($servername, $username, $password);

// Check connection
if ($bdd->connect_error) {
    die("Connection failed: " . $bdd->connect_error);
}
?>

<div class="row" id="flex">
    <div class="main">
        <form id="form_compte">
            <h1>Votre Compte</h1><br>
            <h3>Vos données personnelles</h3>
            <table>
                <tr>
                    <td>Nom: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Nom'); ?>"></td>
                </tr>
                <tr>
                    <td>Prenom: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Prenom'); ?>"></td>
                </tr>
                <tr>
                    <td>Adresse: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Adresse'); ?>"></td>
                </tr>
                <tr>
                    <td>Ville: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Ville'); ?>"></td>
                </tr>
                <tr>
                    <td>Code Postal: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Code Postal'); ?>"></td>
                </tr>
                <tr>
                    <td>Pays: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Pays'); ?>"></td>
                </tr>
                <tr>
                    <td>Numéro de Téléphone: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Numéro de Téléphone'); ?>"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Email'); ?>"></td>
                </tr>
            </table>
            <h3>Vos données bancaires</h3>
            <table>
                <tr>
                    <td>Type de carte de paiment: </td>
                    <td><?php Carte('Type_carte'); ?></td>
                </tr>
                <tr>
                    <td>Numero de la carte: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Numero de carte'); ?>"></td>
                </tr>
                <tr>
                    <td>Nom affiché sur la carte: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Nom affiché sur la carte'); ?>"></td>
                </tr>
                <tr>
                    <td>Date d'expiration de la carte: </td>
                    <td><input type="text" name="nom" value="
                    <?php Compte('Date d\'expiration'); ?>"></td>
                </tr>
                <tr>
                    <td>Cryptogramme: </td>
                    <td><input type="text" name="nom" value="<?php Compte('Numero de securite'); ?>"></td>
                </tr>       
                    
            </table>
            

            <br><input id="creer_compte_perso" type="checkbox"> J'ai lu et j'accepte les conditions générales de ventes: </input><br><br>
            <a href="#"><input type="submit" name="Valider" style="color: black;" value="Valider"></submit></a><br><br><br>
        </form>
    </div>
    <div class="side">
        <h1>Montant Total : 
            <?php
                 if (empty($_GET["prix"])) {
                    $nameErr = "Name is required";
                  } else {
                    $prix = ($_GET["prix"]);
                    echo $prix;
                  }
            ?>
        </h1>
        <button type="button" href="#" value="Valider">Valider</button>
    </div>

</div>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
                <p>
                Vous pouvez nous retrouver tous les jours au local NGA en dessous de la cour E1.
                Vous pourrez profiter de nos PC et consoles NewGen qui vous ferront passez le temps lors de vos longues pauses quotidiennes. 
                </p>
                <p>
                N'hesitez pas à vous inscrire au bureau pour la somme de 10€.
                Cette inscription vous donnera accès au local, ainsi qu'à des remises lors des évnements. 
                Mais surtout cette somme nous permettera d'acquérir plus d'équipements et de vous préparer des évènements de plus grandes qualités.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <p>
                37, quai de Grenelle, 75015 Paris, France <br>
                nga@ece.fr <br>
                <a href="https://www.facebook.com/groups/NGA404/ ">https://www.facebook.com/groups/NGA404/ </a><br>
                </p>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
</footer>

<?php function Compte($recherche)
    {
        $sql = "SELECT $recherche FROM ACHETEUR WHERE ConnectionID==AcheteurID";
        $reponse=mysqli_query($db_handle, $sql);
        echo $reponse;
    }
?>
<?php function Carte($recherche)
    {
        $reponse = $bdd->query('SELECT $recherche FROM carte_bancaire WHERE ConnectionID==AcheteurID');
        echo $reponse;
    }
?>


</body>
</html>
