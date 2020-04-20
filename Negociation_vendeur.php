<!DOCTYPE html>
<html>
<head>
  <title>Negociation vendeur</title>
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
            <a class="dropdown-item" href="categorie.php?categorie=Ferraille ou Tresor">Ferraille ou Trésor</a><br>
            <a class="dropdown-item" href="categorie.php?categorie=Bon pour le Musee">Bon pour le Musée</a><br>
            <a class="dropdown-item" href="categorie.php?categorie=Accessoire VIP">Accessoire VIP</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Achats <span class="caret"></span>
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="achats.php?achats=Encheres">Enchères</a><br>
            <a class="dropdown-item" href="achats.php?achats=Achats Immediats">Achats Immédiats</a><br>
            <a class="dropdown-item" href="achats.php?achats=Meilleure Offre">Meilleure Offre</a>
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

    
    
    
    

    
    

<div class="container">   
    
    <?php   
              $negociation_id=isset($_GET['negociation_id'])?$_GET['negociation_id'] : "";
              $database = "ebayece";
    

              $db_handle = mysqli_connect('localhost','root','');
              $db_found = mysqli_select_db($db_handle, $database);
              if ($db_found) 
              {
                  
                  $sql = "SELECT nom,produit_id FROM produit WHERE negociation_id=$negociation_id";
                  $result2=mysqli_query($db_handle, $sql);
                  while($data2 = mysqli_fetch_assoc($result2))
                  {
                    echo "<h3> $data2[nom] </h3><br>";
                    $produit_id=$data2['produit_id'];
                  }
                  $d=0;
                  $sql = "SELECT prix_negocie,acheteur_id,offre_id FROM offre WHERE tour=1 AND negociation_id=$negociation_id";
                  $result = mysqli_query($db_handle, $sql);
                  while($data = mysqli_fetch_assoc($result))
                  {
                    $acheteur_id=$data['acheteur_id'];
                    $sql = "SELECT nom FROM acheteur WHERE acheteur_id=$acheteur_id";
                    $result3=mysqli_query($db_handle, $sql);
                    while($data3 = mysqli_fetch_assoc($result3))
                    {
                      echo "<h4>Dernière proposition de $data3[nom] :";
                    }
                    
                    echo" $data[prix_negocie] €</h4>
                    <form method='POST'>
                    <input type='submit' name='accepter$d' value='Valider la proposition'></form><br><br>";
                    echo "<form method='POST'><h4>Votre nouvelle proposition :<input type='text' name='prix$d'/>€</h4>";
                    echo "<input type='submit' name='new$d'value='Soumettre ma proposition'></form><br>";
                    
                  $p='prix'.$d;
                  $accept='accepter'.$d;
                  $n='new'.$d;
                  $prix=isset($_POST[$p])? $_POST[$p] : "";
                  if(isset($_POST[$accept]))
                  {
                    $sql = "UPDATE produit SET statue=1 WHERE negociation_id=$negociation_id";
                    mysqli_query($db_handle, $sql);
                    $sql="DELETE FROM panier where produit_id=$produit_id";
                    mysqli_query($db_handle, $sql);
                    echo "<script>window.location.assign('Vendre.php'); </script>";
                  }
                  if(isset($_POST[$n]))
                  {
                    $ach_id=$data['acheteur_id'];
                    $sql = "UPDATE offre set prix_negocie=$prix,tour=0,compteur=compteur+1 where acheteur_id=$ach_id AND negociation_id=$negociation_id";
                    mysqli_query($db_handle, $sql);
                    echo "<script>window.location.assign('Negociation_vendeur.php?negociation_id=$negociation_id'); </script>";
                  }
                  $d=$d+1;
                  echo'<hr>';
                  }
            }
            mysqli_close($db_handle);
            ?>
    
    
 
</div><br>
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


