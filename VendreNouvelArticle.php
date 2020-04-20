<!DOCTYPE html>
<html>
<head>
  <title>Vendre nouvel article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

  <style type="text/css">

 
 .btn-default {
    width: 150px;
    float: left;
    margin: 0px 170px;
}

body{

background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR7EJVYpfaWmsL3tYPzKrDF-z5sLZeR8FJzXVWyQH1KRnIB9krK&usqp=CAU);

}

.card-body{

color: white;
}

#card-body-1 {
    width: 68%;
    margin: 0px 97px;
    background-color: whitesmoke;
    color: black;
    padding: 5px 5px 0px;
}


@media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }

  @media screen and (min-width: 768px){
  .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next, .carousel-control .icon-prev {
    width: 30px;
    height: 30px;
    margin-top: -64px;
    font-size: 60px;
} }

@media screen and (min-width: 768px){
  .carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev {
    margin-left: -38px;
}
}
@media screen and (min-width: 768px){
.carousel-indicators {
    bottom: -22px;
}}


.carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

#col-carou{

text-align: center;

}
.container {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 20px;
}

#creer_compte_perso {
    border-radius: 21px;
    padding-left: 10px;
}

.dropdown, .dropup {
    position: relative;
    float: left;
}

#form_compte{
    width: 500px;
    height: auto;
    border-radius: 6px;
    margin-bottom: 50px;
    color: black;
    background-color: blanchedalmond;
    padding-left: 20px;
    padding-top: 5px;


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

#img_carou{

width: auto;
height: 230px;

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

td, th {
    padding: 3px;
}

/* Sidebar/left column */
.side {
  flex: 50%;
  padding: 20px;
}

/* Main column */
.main {
  flex: 50%;
  padding: 20px;
}

.left {
  flex: 50%;
  padding: 20px;
}


.right {
  flex: 50%;
  padding: 20px;
}

#flex {
    display: flex;
    margin: 0% 25%;
    background-color: blanchedalmond;
}
.row_flex{
    display:flex;
}
#NewArticle{

    margin-bottom: 3%;

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
              <input class="nav navbar-nav form-control" type="text" id="rechercher"  placeholder="Recherche">            
            </div>
          </form>
        <ul class="nav navbar-nav navbar-right">
            <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-usd"></span> Vendre</a></li>
            <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-user"></span> Mon Compte</a></li>
            <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Panier</a></li>
        </ul>
    </div>
</nav>

<! -- Pour le form il faut le lier a une page + mettre une protection 
sur le checkbox pour que enchere et meilleur offre ne soient pas cochés en meme temps
+ possiblement faire en sorte de cacher le mauvais pris en fonction de la checkbox mode d'achats-->
    
<div class="container" style="background-color: blanchedalmond; padding-block-end: 1%;">
    <h1 style="text-align:center;">Ajouter un nouvel article</h1>
    <form method="POST" style="border: 2px solid black;">
        <div class="row row_flex">
            <div class="left">
                Nom du nouvel article: <input type="text" name="nom" id="NewArticle"><br>
                Ajouter des photos: <input type="file" name="photo1" id="NewArticle">
                <input type="file" name="photo2" id="NewArticle">
                <input type="file" name="photo3" id="NewArticle">
                <input type="file" name="photo4" id="NewArticle">
                <input type="file" name="photo5" id="NewArticle">
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
                Ajouter une vidéo: <input type="file" name="video" id="NewArticle">
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
                              $achat_immediat_id=mysql_insert_id($sql);
                          }
                          if($achat=='Encheres')
                          {

                              $sql= "INSERT INTO encheres (prix_init) VALUES ('$prixE')";

                              $encheres_id=mysql_insert_id($sql);
                          }
                          if($achat=='Meilleure Offre')
                          {
                              $sql= "INSERT INTO negociation (negociation_id) VALUES ( DEFAULT )";
                              $negociation_id=mysql_insert_id($sql);
                          }
                              mysqli_query($db_handle, $sql);
                      }
                      
                      //echo "<script>alert('Connexion refusée');</script>";
                      
                        if (isset($_FILES['video']['tmp_name'])) {
                                $target_dir="video/";
                                $video = $target_dir. basename($_FILES["video"]["tmp_name"]);
                                $retour = copy($_FILES['video']['tmp_name'], $video);
                          }
                      else{
                          $video='DEFAULT';
                      }

                      
                          $sql = "INSERT INTO produit (nom, categorie, description, video, achat_immediat_id, encheres_id, negociation_id, vendeur_id) VALUES('$nom', '$categorie', '$description', '$video', $achat_immediat_id, $encheres_id, $negociation_id,'$vendeur_id')";
                      //if (mysqli_query($db_handle, $sql) === TRUE) {
                       // echo "New record created successfully";
                  //  } else {
                  //      echo "Error: " . $sql . "<br>". mysqli_error($db_handle);
                  //  }
                          mysqli_query($db_handle, $sql);
                      
                      $produit=mysql_insert_id();
                      
                      if (isset($_FILES['photo1']['tmp_name1'])) {
                                $target_dir="photo/";
                                $photo1 = $target_dir. basename($_FILES["photo1"]["tmp_name"]);
                                copy($_FILES['photo1']['tmp_name'], $target_dir. basename($_FILES["photo1"]["tmp_name"]));
                                $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo1', $photo1, $produit)";
                      }
                      
                      if (isset($_FILES['photo2']['tmp_name'])) {
                                $target_dir="photo/";
                                $photo2 = $target_dir. basename($_FILES["photo2"]["tmp_name"]);
                                copy($_FILES['photo2']['tmp_name'], $target_dir. basename($_FILES["photo2"]["tmp_name"]));
                                $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo2', $photo2, $produit)";
                      }
                      
                      if (isset($_FILES['photo3']['tmp_name'])) {
                                $target_dir="photo/";
                                $photo3 = $target_dir. basename($_FILES["photo3"]["tmp_name"]);
                                copy($_FILES['photo3']['tmp_name'], $target_dir. basename($_FILES["photo3"]["tmp_name"]));
                                $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo3', $photo3, $produit)";
                      }
                      
                      if (isset($_FILES['photo4']['tmp_name'])) {
                                $target_dir="photo/";
                                $photo4 = $target_dir. basename($_FILES["photo4"]["tmp_name"]);
                                copy($_FILES['photo4']['tmp_name'], $target_dir. basename($_FILES["photo4"]["tmp_name"]));
                          $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo4', $photo4, $produit)";
                          
                      }
                      
                      if (isset($_FILES['photo5']['tmp_name'])) {
                                $target_dir="photo/";
                                $photo5 = $target_dir. basename($_FILES["photo5"]["tmp_name"]);
                                copy($_FILES['photo5']['tmp_name'], $target_dir. basename($_FILES["photo5"]["tmp_name"]));
                          $sql = "INSERT INTO photo (nom, reference, produit_id) VALUES ('Photo5', $photo5, $produit)";
                      }
                      
                      
                      
                      //echo "<script>window.location.assign('homepage.php'); </script>";
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
