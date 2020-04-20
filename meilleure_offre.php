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
    background-color:white;
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
          justify-content: space-around;
      }
      
      img.little{
          height: 50px;
          width: auto;
          max-width: 100px;
          cursor:pointer;
          border: 2px solid grey;
      }

      img.profil{
          height: 50px;
          width: auto;
          max-width: 100px;
      }

      img.big{
          height: 300px;
          width: auto;
          max-width: 450px;
          border: 4px solid black;
      }

      .container-button{
          display: flex; 
          justify-content: center;
          justify-content: space-around;
      }
      
      button.button1{
          font:Bold 18px Arial;
          padding:10px 10px 10px 10px;
          border:1px solid #ccc;
	       box-shadow:1px 1px 3px #999;

         
      }
      
      input.button2{
          font:Bold 18px Arial;
          padding:10px 10px 10px 10px;
          border:1px solid #ccc;
	       box-shadow:1px 1px 3px #999;


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
      $prod_id=$_GET['id'];
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
        echo "<script>window.location.assign('ConnectionAcheteur.php?site=meilleure_offre.php?id=$prod_id'); </script>"; 
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
          $sql="SELECT nom,negociation_id,description,video FROM produit Where produit_id=$prod_id";
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
            $nego=$data['negociation_id'];
            $sql3="SELECT prix_negocie,compteur,tour from offre where negociation_id=$nego AND acheteur_id=$acheteur_id";
            $result3 = mysqli_query($db_handle, $sql3);
            $nbr=mysqli_num_rows($result3);
            if($nbr!=0)
            {
              while($data3 = mysqli_fetch_assoc($result3)){
                $nbr_compt=5-$data3['compteur'];
                if($data3['tour']!=0){
                  echo'<br><br><br><br><h3>Vous avez soumis une offre en attente de validation par le vendeur.</h3>';
                }
                else
                {
                echo'<h5>Nombre de propositions restantes : '.$nbr_compt.'</h5>';
                echo'<h4>Derniere proposition du vendeur : '.$data3['prix_negocie'].' €</h4>';
                echo"<form method='POST'>
                <input type='submit' name='accepter' value='Valider la proposition'></form><br><br>";
                if($nbr_compt!=0)
                {
                echo"<form method='POST'><h4>Votre nouvelle proposition :<input type='text' name='prix_negocie'/>€</h4>";
                echo "<input type='submit' name='new1' value='Soumettre ma nouvelle proposition'></form><br>";
                }
                else
                {
                  echo'<h4>Vous ne pouvez plus faire de nouvelles propositions</h4>';
                }
                }

              }
            }
            else
            {
              echo"<form method='POST'><h4>Votre nouvelle proposition :<input type='text' name='prix_negocie2'/>€</h4>";
              echo "<input type='submit' name='new2' class='button2' value='Valider ma nouvelle proposition'/></form><br>";
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
?>    
    
    
    
    
    
    
    
    
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

<?php
$p1=isset($_POST["prix_negocie"])? $_POST["prix_negocie"] : "";
$p2=isset($_POST["prix_negocie2"])? $_POST["prix_negocie2"] : "";
if (isset($_POST["accepter"]))
{
  $sql="UPDATE produit set statut=1 where produit_id=$prod_id";
  mysqli_query($db_handle, $sql);
  $sql="DELETE FROM panier where produit_id=$prod_id";
  mysqli_query($db_handle, $sql);
  echo "<script>window.location.assign('HomePage.php'); </script>";
}
if (isset($_POST["new1"]))
{
  $sql="SELECT negociation_id from produit where produit_id=$prod_id";
  $result=mysqli_query($db_handle, $sql);
  while($data = mysqli_fetch_assoc($result)){
    $nego=$data['negociation_id'];
    $sql="UPDATE offre set prix_negocie=$p1,tour=1 where acheteur_id=$acheteur_id AND negociation_id=$nego";
    mysqli_query($db_handle, $sql);
    echo "<script>window.location.assign('meilleure_offre.php?id=$prod_id'); </script>";
  }
}
if (isset($_POST["new2"]))
{
  $sql="SELECT negociation_id from produit where produit_id=$prod_id";
  $result=mysqli_query($db_handle, $sql);
  while($data = mysqli_fetch_assoc($result)){
    $nego=$data['negociation_id'];
    echo $nego;
    $sql="INSERT INTO offre (prix_negocie,compteur,tour,acheteur_id,negociation_id) Values($p2,0,1,$acheteur_id,$nego) ";
    mysqli_query($db_handle, $sql);
    $sql="INSERT INTO panier (acheteur_id,produit_id,methode) Values($acheteur_id,$prod_id,3) ";
    mysqli_query($db_handle, $sql);
    echo "<script>window.location.assign('meilleure_offre.php?id=$prod_id'); </script>";
  }
}
?>

<?php 
mysqli_close($db_handle);
?>
</body>
</html>


