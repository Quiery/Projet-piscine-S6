<!DOCTYPE html>
<html>
<head>
  <title>Consulter l'article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Piscine.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  
<script>
$(document).ready(function(){
  $("img.little").click(function(){
    $("img.big").attr('src',this.src);
    }); 
  });
</script>
            

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

    
    
    
    

    
    

<?php
  $prod_id=$_GET['id'];
  $database = "ebayece";

  $db_handle = mysqli_connect('localhost','root','');
  $db_found = mysqli_select_db($db_handle, $database);
  if ($db_found) 
  {
    echo '<div class="container">' ;   
      echo '<div class="row">';
        echo '<div class="col-sm-5">';
            $sql="SELECT reference,nom FROM photo Where nom like 'Photo1' AND produit_id=$prod_id ";
            $result = mysqli_query($db_handle, $sql);
            while($data = mysqli_fetch_assoc($result)){
                $image=$data['reference'];
                echo "<br><center><img src='$image' class='big'></center>"."<br>"."<br>"."<br>";
              }
            echo '<div class="little-images">';
            $sql="SELECT reference,nom FROM photo Where produit_id=$prod_id ";
            $result = mysqli_query($db_handle, $sql);
            while($data = mysqli_fetch_assoc($result)){
                $image=$data['reference'];
                echo "<img src='$image' class='little'>";
              }
            echo '</div>';
        echo'</div>';
        echo '<div class="col-sm-6">';
          $sql="SELECT nom,achat_immediat_id,encheres_id,negociation_id,description,video FROM produit Where produit_id=$prod_id";
          $result = mysqli_query($db_handle, $sql);
          while($data = mysqli_fetch_assoc($result)){
            echo '<h2>'.$data['nom'].'</h2>';
            
            $sql2="SELECT pp,pseudo FROM vendeur INNER JOIN produit ON vendeur.vendeur_id=produit.vendeur_id Where produit.produit_id=$prod_id";
            $result2 = mysqli_query($db_handle, $sql2);
            while($data2 = mysqli_fetch_assoc($result2)){
                $image=$data2['pp'];
                echo "<img src='$image' class='profil' align='right'>";
                echo '<h6>de '.$data2['pseudo'].'</h6><br>';
                echo '<hr>';
            }
            if($data['achat_immediat_id']!=NULL)
            {
              echo '<center><U><h3> Achat immédiat</h3></U></center><br>';
              $id=$data['achat_immediat_id'];
              $sql3="SELECT prix from achat_immediat Where achat_immediat_id=$id";
              $result3 = mysqli_query($db_handle, $sql3);
              while($data3 = mysqli_fetch_assoc($result3)){
                echo '<h4> Prix en achat immédiat : '.$data3['prix'].' €</h4><br>';
              }
              echo"<center><a href='traitement.php?id=$prod_id'><button class='button1'>Mettre au panier</button></a></center><hr>";
            }
            if($data['encheres_id']!=NULL)
            {
              echo '<center><U><h3> Vente aux enchères</h3></U></center><br>';
              $id=$data['encheres_id'];
              $sql3="SELECT prix_init, prix_min, nombre_encheres,date_fin from encheres Where encheres_id=$id";
              $result3 = mysqli_query($db_handle, $sql3);
              while($data3 = mysqli_fetch_assoc($result3)){
                $nbr=$data3['nombre_encheres'];
                date_default_timezone_set('Europe/Paris');
                $date = date('y-m-d h:i:s');
                if(strtotime($date) > strtotime($data3['date_fin']))
                {
                  if($nbr==0)
                  {
                    if(($data['achat_immediat_id']==NULL)&&($data['negociation_id']==NULL))
                    {
                      $sql="UPDATE produit set statut=1 where produit_id=$prod_id";
                      mysqli_query($db_handle, $sql);
                    }
                    else
                    {
                      $sql="UPDATE produit set encheres_id=NULL where produit_id=$prod_id";
                      mysqli_query($db_handle, $sql);
                      $sql="DELETE FROM encheres where produit_id=$prod_id";
                      mysqli_query($db_handle, $sql);
                    } 
                  }
                  else
                  {
                    $sql="UPDATE produit set statut=1 where produit_id=$prod_id";
                    mysqli_query($db_handle, $sql);
                  }
                  echo "<script>window.location.assign('HomePage.php'); </script>";
                }
                else{
                  if($nbr<2)
                  {
                    echo '<h4> Prix de l\'enchère la plus élevée : '.$data3['prix_init'].' €</h4>';
                  }
                  else
                  {
                    $prix=$data3['prix_min']+1;
                    echo '<h4> Prix de l\'enchère la plus élevée : '.$prix.' €</h4>';
                  }
                  echo 'Prix de la mise en vente : '.$data3['prix_init'].' €<br>';
                  echo 'L\'enchère se terminera le : '.$data3['date_fin'].'<br><br>';
                  echo "<center><a href='encherir.php?id=$prod_id'><button class='button1'>Enchérir</button></a></center><hr>";
                }
              }
            }
            if($data['negociation_id']!=NULL)
            {
              echo '<center><U><h3>Négocier avec le vendeur</h3></U></center><br>';
              echo "<center><a href='meilleure_offre.php?id=$prod_id'><button class='button1'>Négocier</button></a></center><hr>";
            }
      echo'</div></div>';
      echo'<br><br>';
      echo'<div class="row">';
        echo '<div class="col-sm-5">';
        if($data['video']!=NULL){
        $video=$data['video'];
         echo"<center><video controls height=230px;> 
         <source src='$video' type='video/mp4'> </video></center>";
        }
        echo '</div>';
          echo '<div class="col-sm-6">';
          echo'<h4> Description : </h4>';
          echo '<h7>'.$data['description'].'</h7>';
          echo '</div>';
          }
        echo '</div>';
    echo '</div><br>';
  }
  mysqli_close($db_handle);
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


</body>
</html>


