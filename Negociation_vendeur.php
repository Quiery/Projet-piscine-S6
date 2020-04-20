<!DOCTYPE html>
<html>
<head>
  <title>Negociation vendeur</title>
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
      

      
      button.button1{
          font:Bold 18px Arial;
          color: black;
          padding:10px 10px 10px 10px;
          border:1px solid #ccc;
	       box-shadow:1px 1px 3px #999;
      }
      
</style>


            

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


