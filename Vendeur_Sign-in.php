<!DOCTYPE html>
<html>
<head>
  <title>Creation compte vendeur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Piscine.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="HomePage.php"><img src="https://le-marche-eclectique.com/wp-content/uploads/2017/03/tribunal-maillet.png" 
    class="img-responsive" style="width: 70px; height: 50px;"></a>
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="nav navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Catégories <span class="caret"></span>
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="categorie.php?categorie=Feraille ou Trèsor">Ferraille ou Trésor</a><br>
            <a class="dropdown-item" href="categorie.php?categorie=Bon pour le Musé">Bon pour le Musée</a><br>
            <a class="dropdown-item" href="categorie.php?categorie=Accessoire VIP">Accessoire VIP</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Achats <span class="caret"></span>
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="achats.php?achats=Enchères">Enchères</a><br>
            <a class="dropdown-item" href="achats.php?achats=Achats Immediats">Achats Immédiats</a><br>
            <a class="dropdown-item" href="achats.php?achats=Meilleur Offre">Meilleur Offre</a>
          </div>
        </li>
    </ul>
        <form action="Recherche.php" method="GET" id="form_rechercher" class="form-inline nav navbar-nav" role="form">
            <div class="form-group has-success has-feedback">
              <label class="control-label" for="rechercher"></label>
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
              <input class="nav navbar-nav form-control" type="text" name="recherche" id="rechercher"  placeholder="Recherche">            
            </div>
          </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="nav-link" href="vendre.php"><span class="glyphicon glyphicon-usd"></span> Vendre</a></li>
            <li><a class="nav-link" href="VotreCompte.php"><span class="glyphicon glyphicon-user"></span> Mon Compte</a></li>
            <li><a class="nav-link" href="Panier.php"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
        </ul>
    </div>
</nav>
    
    <div class="row" id="flex_sign_in">
    <div class="main">

        <form  method='POST' enctype="multipart/form-data">
            <h1>Créer un compte vendeur</h1><br>
            <table>
                <tr>
                    <td>Nom:<input type='text' name='nom'/><br> </td>
                </tr>
                <tr>
                    <td>Prenom: <input type='text' name='prenom'/></td>
                </tr>
                <tr>
                    <td>Pseudo: <input type='text' name='pseudo'/></td>
                </tr>
                <tr>
                    <td>Email: <input type='text' name='mail'/></td>
                </tr>
                <tr>
                    <td>Photo de profil: <input type="file" name="pp"></td>
                </tr>
                <tr>
                    <td>Image de fond préféré: <input type="file" name="mur" ></td>
                </tr>
                </table>
            <input type='submit' name='valider' value='Valider'></form><br>
        
                <?php
            $database = "ebayece";
              $db_handle = mysqli_connect('localhost','root','root');
              $db_found = mysqli_select_db($db_handle, $database);
                
              if ($db_found) 
              {

                  $nom=isset($_POST['nom'])? $_POST['nom'] : "";
                  $prenom=isset($_POST['prenom'])? $_POST['prenom'] : "";
                  $pseudo=isset($_POST['pseudo'])? $_POST['pseudo'] : "";
                  $mail=isset($_POST['mail'])? $_POST['mail'] : "";
                  if(isset($_POST['valider']))
                      {
                      if (isset($_FILES['pp']['tmp_name'])) {
                                $target_dir="pp/";
                                $pp = $target_dir. basename($_FILES["pp"]["tmp_name"]);
                                copy($_FILES['pp']['tmp_name'], $target_dir. basename($_FILES["pp"]["tmp_name"]));
                      }
                          if (isset($_FILES['mur']['tmp_name'])) {
                                $target_dir="background/";
                                $mur = $target_dir. basename($_FILES["mur"]["tmp_name"]);
                                $retour = copy($_FILES['mur']['tmp_name'], $mur);
                          }

                          $sql = "INSERT INTO vendeur (nom, prenom, pseudo, mail, pp, mur) VALUES('$nom', '$prenom', '$pseudo', '$mail', '$pp', '$mur')";
                        
                          mysqli_query($db_handle, $sql);
                      
                      //echo "<script>window.location.assign('homepage.php'); </script>";
                  }
                   mysqli_close($db_handle);
              }
        ?>
        
        </div>
    </div>


<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
                <p>
                Bienvenue dans un mileu de l'exploration d'un monde tout nouveau. Vous pourrez y trouver tout ce que vous désirez de la feraille à de vrais Trésors. Notre site vous propose plusieurs méthodes d'achats pour vous convenir au mieux.
                Vous avez aussi la possibilité d'y vendre vos vieux objets ou au ceux que vous n'utilisez plus.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h6 class="text-uppercase font-weight-bold">Contact</h6>
                <p>
                37, quai de Grenelle, 75015 Paris, France <br>
                webDynamique@ece.fr <br>
                <a href="https://www.ece.fr/ecole-ingenieur/">https://www.ece.fr/ecole-ingenieur/</a><br>
                </p>
            </div>
        </div>
    </div>
    <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique@ece.fr</div>
</footer>


</body>
</html>