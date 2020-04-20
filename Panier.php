<!DOCTYPE html>
<html>
<head>
  <title>Panier</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Piscine.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>            

</head>
<body>
<?php
      function getIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
          $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
          $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
      }
      $database = "ebayece";

      $db_handle = mysqli_connect('localhost','root','');
      $db_found = mysqli_select_db($db_handle, $database);
      if ($db_found) 
      {
      $ip=getIp();
      $sql="SELECT ip,acheteur_id from connexion_courante WHERE ip LIKE'$ip' AND acheteur_id IS NOT NULL";
      $result = mysqli_query($db_handle, $sql);
      $nbr=mysqli_num_rows($result);
      if($nbr==0)
      {
        echo "<script>window.location.assign('http://localhost/Projet-piscine-S6/ConnectionAcheteur.html?site=Panier.html'); </script>"; 
      }
      else
      {
        while($data = mysqli_fetch_assoc($result))
        {
          $acheteur_id=$data['acheteur_id'];
        }
      }
      
    }


?>

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

    
    
    
    

    
    
<?php
$pro_id=isset($_GET['produit_id'])?$_GET['produit_id'] : "";
$metho=isset($_GET['methode'])?$_GET['methode'] : "";
if(($pro_id != "")&&($metho != ""))
  {
    $sql = "DELETE FROM panier WHERE produit_id = $pro_id AND acheteur_id=$acheteur_id AND methode=$metho";
    mysqli_query($db_handle, $sql);
    }
echo'<div class="container">';    
    echo'<U><center><h1>Votre panier</h1></center></U>';
    
    echo'<div class="total_box">';
    $sql="SELECT SUM(a.prix) from achat_immediat as a INNER JOIN 
    (SELECT b.produit_id, b.achat_immediat_id from produit as b INNER JOIN 
    (SELECT produit_id from panier where methode=1 AND acheteur_id=$acheteur_id) as c
     ON b.produit_id=c.produit_id where statut=0)as d 
     ON a.achat_immediat_id=d.achat_immediat_id";
     $result = mysqli_query($db_handle, $sql);
     while($data = mysqli_fetch_assoc($result))
        {
          echo'<h4>Total Achat Immédiat : ';
          echo $data['SUM(a.prix)'].' €</h4>';
        }
        echo'<button class="button1">Passer la commande</button>';
    
    echo'</div>';
    echo'<br><br><br><br>';
    echo'<h2><U> Mes achats immédiats</U></h2><br>';
    $sql="SELECT a.produit_id,a.achat_immediat_id,a.nom,a.description from produit as a INNER JOIN panier as b ON a.produit_id=b.produit_id Where b.acheteur_id=$acheteur_id and methode=1 and statut=0";
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))
    {
      echo'<div class="row" style="display: flex; align-items: center;" >';
      echo'<div class="col-sm-3">';
      $prod_id=$data['produit_id'];
      $sql2="SELECT reference FROM photo Where nom like 'Photo1' AND produit_id=$prod_id";
      $result2 = mysqli_query($db_handle, $sql2);
      while($data2 = mysqli_fetch_assoc($result2))
      {
        $image=$data2['reference'];
        echo "<a href='http://localhost/Projet-piscine-S6/article.php?id=$data[produit_id]'><img  src='$image' style='height: 150px;width: auto; max-width: 300px;'></a></div>";     
      }
      echo'<div class="col-sm-5"><h5>'.$data['nom'].'<br></h5>';
      echo'<h6>'.$data['description'].'</h6></div>';
      $achat_id=$data['achat_immediat_id'];
      $sql3="SELECT prix FROM achat_immediat Where achat_immediat_id=$achat_id";
      $result3=mysqli_query($db_handle, $sql3);
      while($data3 = mysqli_fetch_assoc($result3))
      {
        echo'<div class="col-sm-2"><h4>'.$data3['prix'].' €</h4><br></div>';
      }
      echo " <div class='col-sm-3'><a href='Panier.php?produit_id=$data[produit_id]&methode=1'><button class='buttonred' >Supprimer</button></a></div></div><hr>";
    }
    echo'<br><h2><U> Mes enchères</U></h2><br>';
    $sql="SELECT a.produit_id,a.encheres_id,a.nom,a.description,b.methode from produit as a INNER JOIN panier as b ON a.produit_id=b.produit_id Where b.acheteur_id=$acheteur_id and methode=2 and statut=0";
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))
    {
      echo'<div class="row" style="display: flex; align-items: center;" >';
      echo'<div class="col-sm-3">';
      $prod_id=$data['produit_id'];
      $sql2="SELECT reference FROM photo Where nom like 'Photo1' AND produit_id=$prod_id";
      $result2 = mysqli_query($db_handle, $sql2);
      while($data2 = mysqli_fetch_assoc($result2))
      {
        $image=$data2['reference'];
        echo "<a href='http://localhost/Projet-piscine-S6/article.php?id=$data[produit_id]'><img  src='$image' style='height: 150px;width: auto; max-width: 300px;'></a></div>";     
      }
      echo'<div class="col-sm-5"><h5>'.$data['nom'].'<br></h5>';
      echo'<h6>'.$data['description'].'</h6></div>';
      $achat_id=$data['encheres_id'];
      $sql3="SELECT prix_init FROM encheres Where encheres_id=$achat_id";
      $result3=mysqli_query($db_handle, $sql3);
      while($data3 = mysqli_fetch_assoc($result3))
      {
        echo'<div class="col-sm-2"><h4>Prix initial:'.$data3['prix_init'].' €</h4><br></div>';
      }
      echo " <div class='col-sm-3'><a href='Panier.php?produit_id=$data[produit_id]&methode=2'><button class='buttonred' >Supprimer</button></a></div></div><hr>";
    }
    echo'<br><h2><U> Mes négociations</U></h2><br>';
    $sql="SELECT a.produit_id,a.nom,a.description,b.methode from produit as a INNER JOIN panier as b ON a.produit_id=b.produit_id Where b.acheteur_id=$acheteur_id and methode=3 and statut=0";
    $result = mysqli_query($db_handle, $sql);
    while($data = mysqli_fetch_assoc($result))
    {
      echo'<div class="row" style="display: flex; align-items: center;" >';
      echo'<div class="col-sm-3">';
      $prod_id=$data['produit_id'];
      $sql2="SELECT reference FROM photo Where nom like 'Photo1' AND produit_id=$prod_id";
      $result2 = mysqli_query($db_handle, $sql2);
      while($data2 = mysqli_fetch_assoc($result2))
      {
        $image=$data2['reference'];
        echo "<a href='http://localhost/Projet-piscine-S6/article.php?id=$data[produit_id]'><img  src='$image' style='height: 150px;width: auto; max-width: 300px;'></a></div>";     
      }
      echo'<div class="col-sm-5"><h5>'.$data['nom'].'<br></h5>';
      echo'<h6>'.$data['description'].'</h6></div>';
      echo'<div class="col-sm-2"></div>';
      echo " <div class='col-sm-3'><a href='Panier.php?produit_id=$data[produit_id]&methode=3'><button class='buttonred' >Supprimer</button></a></div></div><hr>";
    }
    echo'<br>';
    echo'</div>';
?>
    
    
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

<?php
mysqli_close($db_handle);
?>
</body>
</html>


