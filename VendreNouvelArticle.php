<!DOCTYPE html>
<html>
<head>
  <title>Vendre nouvel article</title>
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
    
<div class="container" style="background-color: blanchedalmond; padding-block-end: 1%;">
    <h1 style="text-align:center;">Ajouter un nouvel article</h1>
    <form method="POST" enctype="multipart/form-data" style="border: 2px solid black;">
        <div class="row row_flex">
            <div class="left">
                Nom du nouvel article: <input type="text" name="nom" ><br>
                Ajouter des photos: <input type="file" name="photo1" >
                <input type="file" name="photo2" >
                <input type="file" name="photo3" >
                <input type="file" name="photo4" >
                <input type="file" name="photo5" >
                <table>  
                    <tr>
                        <td>Méthode de vente: </td>
                        <td><input type="checkbox" name='achat[]' Value="Achat Immediat"/> Achat Immédiat<br>
                        <input  type="checkbox" name= 'achat[]' Value="Encheres"/> Enchères<br>
                        <input type="checkbox" name='achat[]' Value="Meilleure Offre"/> Meilleur Offre<br>
                        
                    </tr>
                </table>          
            </div>
            <div class="right">
                <select name="categorie" >
                        <option value="Ferraille ou Tresor">Ferraille ou Trésor</option>
                        <option value="Bon pour le musee">Bon pour le Musée</option>
                        <option value="Accessoire VIP">Accessoire VIP</option>
                </select><br>
                Ajouter une vidéo: <input type="file" name="video">
                <table>  
                    <tr>
                        <td>Prix fixé (Si achat immédiat): </td>
                        <td><input type="text" name="prixA"></td>
                        
                    </tr>
                    <tr>
                        <td>Prix minimum (Si enchère): </td>
                        <td><input type="text" name="prixE"></td>
                        
                    </tr>
                </table>  
            </div>        
        </div>
        <textarea rows="4" cols="50" name="description" placeholder="Description de l'article"></textarea><br>
        <input type='submit' name='valider' value='Valider'></form><br>
     <?php
    $vendeur_id=5;
        $database = "ebayece";
              $db_handle = mysqli_connect('localhost','root','root');
              $db_found = mysqli_select_db($db_handle, $database);
                
              if ($db_found) 
              {

                  $nom=isset($_POST['nom'])? $_POST['nom'] : "";
                  $categorie=isset($_POST['categorie'])? $_POST['categorie'] : "";
                  $achat_immediat_id='DEFAULT';
                  $encheres_id='DEFAULT';
                  $negociation_id='DEFAULT';
                  $prixA=isset($_POST['prixA'])? $_POST['prixA'] : "";
                  $prixE=isset($_POST['prixE'])? $_POST['prixE'] : "";
                  $description=isset($_POST['description'])? $_POST['description'] : "";
                  
                  
                  
                  if(isset($_POST['valider']))
                      {
                          
                          foreach($_POST['achat'] as $achat){
                          if($achat=='Achat Immediat')
                          {
                              $sql= "INSERT INTO achat_immediat (prix) VALUES ('$prixA')";
                              mysqli_query($db_handle, $sql);
                              $achat_immediat_id=mysqli_insert_id($db_handle);
                          }
                          if($achat=='Encheres')
                          {

                              $sql= "INSERT INTO encheres (prix_init) VALUES ('$prixE')";
                                mysqli_query($db_handle, $sql);
                              $encheres_id=mysqli_insert_id($db_handle);
                          }
                          if($achat=='Meilleure Offre')
                          {
                              $sql= "INSERT INTO negociation (negociation_id) VALUES ( DEFAULT )";
                              mysqli_query($db_handle, $sql);
                              $negociation_id=mysqli_insert_id($db_handle);
                          }
                      }
                      
                      //echo "<script>alert('Connexion refusée');</script>";
                      
                        if (isset($_FILES['video']['tmp_name'])) {
                                $target_dir="video/";
                                $video = $target_dir. basename($_FILES["video"]["tmp_name"]);
                                copy($_FILES['video']['tmp_name'], $video);
                            $sql = "INSERT INTO produit (nom, categorie, description, video, achat_immediat_id, encheres_id, negociation_id, vendeur_id) VALUES('$nom', '$categorie', '$description', '$video', $achat_immediat_id, $encheres_id, $negociation_id,'$vendeur_id')";
                          }
                      else{
                          $sql = "INSERT INTO produit (nom, categorie, description, video, achat_immediat_id, encheres_id, negociation_id, vendeur_id) VALUES('$nom', '$categorie', '$description', DEFAULT, $achat_immediat_id, $encheres_id, $negociation_id,'$vendeur_id')";
                      }
                          mysqli_query($db_handle, $sql);
                      
                      $produit=mysqli_insert_id($db_handle);
                      
                      
                    
                      
                      if (isset($_FILES['photo1']['tmp_name'])) {
                                $target_dir="photo/";
                          if( basename($_FILES["photo1"]["tmp_name"] !=''))
                             {
                                $photo1 = $target_dir. basename($_FILES["photo1"]["tmp_name"]);
                                copy($_FILES['photo1']['tmp_name'], $photo1);
                                $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo1', '$photo1', $produit)";
                          mysqli_query($db_handle, $sql);
                             }
                      }
                      
                      if (isset($_FILES['photo2']['tmp_name'])) {
                                $target_dir="photo/";
                          if( basename($_FILES["photo2"]["tmp_name"] !=''))
                             {
                                $photo2 = $target_dir. basename($_FILES["photo2"]["tmp_name"]);
                                copy($_FILES['photo2']['tmp_name'], $target_dir. basename($_FILES["photo2"]["tmp_name"]));
                                $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo2', '$photo2', $produit)";
                          mysqli_query($db_handle, $sql);
                             }
                      }
                      
                      if (isset($_FILES['photo3']['tmp_name'])) {
                                $target_dir="photo/";
                          if( basename($_FILES["photo3"]["tmp_name"] !=''))
                             {
                                $photo3 = $target_dir. basename($_FILES["photo3"]["tmp_name"]);
                                copy($_FILES['photo3']['tmp_name'], $target_dir. basename($_FILES["photo3"]["tmp_name"]));
                                $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo3', '$photo3', $produit)";
                          mysqli_query($db_handle, $sql);
                             }
                      }
                             
                      if (isset($_FILES['photo4']['tmp_name'])) {
                                $target_dir="photo/";
                          if( basename($_FILES["photo4"]["tmp_name"] != ''))
                             {
                                $photo4 = $target_dir. basename($_FILES["photo4"]["tmp_name"]);
                                copy($_FILES['photo4']['tmp_name'], $target_dir. basename($_FILES["photo4"]["tmp_name"]));
                          $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo4', '$photo4', $produit)";
                          mysqli_query($db_handle, $sql);
                             }
                          
                      }
                      
                      if (isset($_FILES['photo5']['tmp_name'])) {
                                $target_dir="photo/";
                          if( basename($_FILES["photo5"]["tmp_name"] !=''))
                             {
                                $photo5 = $target_dir. basename($_FILES["photo5"]["tmp_name"]);
                                copy($_FILES['photo5']['tmp_name'], $target_dir. basename($_FILES["photo5"]["tmp_name"]));
                          $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo5', '$photo5', $produit)";
                          mysqli_query($db_handle, $sql);
                             }
                      }
                      
                      
                      
                      echo "<script>window.location.assign('vendre.php'); </script>";
                  }
                   mysqli_close($db_handle);
              }
        ?>
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