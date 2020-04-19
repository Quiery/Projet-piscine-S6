<!DOCTYPE html>
<html>
<head>
  <title>Meilleure offre</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <style type="text/css">

a {
    color: #ffe841;
    text-decoration: none;
}


  
 .btn-default {
    width: 150px;
    float: left;
    margin: 0px 170px;
}

body{


}

.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 20px;
}
      
      #Resultat {
          
      }

.dropdown, .dropup {
    position: relative;
    float: left;
}
.dropdown-menu {


}

.form-control{
  border-radius: 0%;
}
.form-inline .has-feedback .form-control-feedback {
    top: 8px;
}

#form_rechercher{

border-left: 2px solid black;

}


.has-success .form-control-feedback {
    color: #337ab7;
}
  .navbar {
    position: relative;
    min-height: 50px;
    margin-bottom: 20px;
    border: 2px solid black;
    background-color: #9a4000;
}

.navbar-nav>li>.dropdown-menu {
    margin-top: 2px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    padding-left: 5px;
    background-color: #9a4000;
}
.navbar-brand {
    float: left;
    height: 50px;
    padding: 0px 15px;
    font-size: 18px;
    line-height: 20px;
    border-right: 2px solid black;
}
  #rechercher{
    margin-top: 0px;
    margin-left: 0px;
    width: 534px;
    height: 50px;
    border :0px;
    padding-left: 25px;
    border-right: 2px solid black;

  }

.navbar-right {
    float: right!important;
    margin-right: -15px;
    border-left: 2px solid black;
}
.page-footer {
    background-color: #222;
    color: #ccc;
    padding: 60px 0 30px;
}
.footer-copyright {
    color: #666;
    padding: 40px 0;
}

      .little-images{
          display: flex; 
          justify-content: center;
          justify-content: space-between;
      }
      
      img.little{
          height: 50px;
          width: auto;
          max-width: 100px;
      }
      


</style>

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
              echo'<center><button class="button1">Mettre au panier</button></center><hr>';
            }
            if($data['encheres_id']!=NULL)
            {
              echo '<center><U><h3> Vente aux enchères</h3></U></center><br>';
              $id=$data['encheres_id'];
              $sql3="SELECT prix_init, prix_min, nombre_encheres,date_fin from encheres Where encheres_id=$id";
              $result3 = mysqli_query($db_handle, $sql3);
              while($data3 = mysqli_fetch_assoc($result3)){
                $nbr=$data3['nombre_encheres'];
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
                echo '<center><button class="button1">Enchérir</button></center><hr>';
              }
            }
            if($data['negociation_id']!=NULL)
            {
              echo '<center><U><h3>Négocier avec le vendeur</h3></U></center><br>';
              echo '<center><button class="button1">Négocier</button></center><hr>';
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

<div class="container">    
    <div class="row">
      <div class="col-sm-5" >
        <img  src='https://www.hexoa.fr/25272/tableau-peinture-bleuets-des-champs.jpg' style='height: 300px; width: auto; max-width: 500px; text-align: center;'><br><br><br>
          <div class="little-images">
              <img  src='https://www.hexoa.fr/25272/tableau-peinture-bleuets-des-champs.jpg' class="little">
              <img  src='https://www.hexoa.fr/25272/tableau-peinture-bleuets-des-champs.jpg' class="little">
              <img  src='https://www.hexoa.fr/25272/tableau-peinture-bleuets-des-champs.jpg' class="little">
              <img  src='https://www.hexoa.fr/25272/tableau-peinture-bleuets-des-champs.jpg' class="little">
              <img  src='https://www.hexoa.fr/25272/tableau-peinture-bleuets-des-champs.jpg' class="little">
             </div>
        </div>
        <div class="col-sm-6">
            <h2>Article_name</h2>
            <img  src='https://www.hexoa.fr/25272/tableau-peinture-bleuets-des-champs.jpg' class="little" align="right">
            <h6>de Pseudo_vendeur</h6><br>
            <form>
            <h4>Dernière proposition du vendeur :</h4>
            <br>
            <input type="submit" name="valider" value="Valider sa proposition">
            <br><br>
            <h4>Votre nouvelle proposition :<input type="text" name="prop">€</h4>
            <br>
            <input type="submit" name="new" value="Soumettre ma proposition">
            </form>

        </div>
    </div>
    <br><br>
    <div class="row"  style="display: flex; justify-content: center;">
        <div class="col-sm-8">
            <h5>Description bjhsdvdubdsjk dshvcsbwc dcsbcus nqdbhddsfhd bufbsdjhbc hbfdbsbc bdubdjvh dhqsbduhbqhubsdc hqbsduhsbuh c nchjdvcueq  fcjhebfisbc jsebfb czej cuy ahzjcvyscvdsb cjscvdvx</h5>
        </div>
    
    
    </div>
</div><br>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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
</body>
</html>


