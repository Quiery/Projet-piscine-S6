<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
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
color: blanchedalmond;

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


</style>


</head>
<body>

<?php function Compte($recherche)
    {
        $reponse = $bdd->query('SELECT $recherche FROM ACHETEUR WHERE ConnectionID==AcheteurID');
        echo $reponse
    }
?>
<?php function Carte($recherche)
    {
        $reponse = $bdd->query('SELECT $recherche FROM carte_bancaire WHERE ConnectionID==AcheteurID');
        echo $reponse
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

<form id="form_compte">
    <h1>Votre Compte</h1><br>
    <h3>Vos données personnelles</h3>
    <table>
        <tr>
            <td>Nom: </td>
            <td><?php Compte('Nom'); ?></td>
        </tr>
        <tr>
            <td>Prenom: </td>
            <td><?php Compte('Prenom'); ?></td>
        </tr>
        <tr>
            <td>Adresse: </td>
            <td><?php Compte('Adresse'); ?></td>
        </tr>
        <tr>
            <td>Ville: </td>
            <td><?php Compte('Ville'); ?></td>
        </tr>
        <tr>
            <td>Code Postal: </td>
            <td><?php Compte('Code Postal'); ?></td>
        </tr>
        <tr>
            <td>Pays: </td>
            <td><?php Compte('Pays'); ?></td>
        </tr>
        <tr>
            <td>Numéro de Téléphone: </td>
            <td><?php Compte('Numéro de Téléphone'); ?></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><?php Compte('Email'); ?></td>
        </tr>
    </table>


    <div class="container">  
        <a href="#demo" data-toggle="collapse"><h3>Vos données bancaires</h3></a>
        <div id="demo" class="collapse">
            <table>
            <tr>
                <td>Type de carte de paiment: </td>
                <td><?php Carte('Type_carte'); ?></td>
            </tr>
            <tr>
                <td>Numero de la carte: </td>
                <td><?php Carte('Numero de carte'); ?></td>
            </tr>
            <tr>
                <td>Nom affiché sur la carte: </td>
                <td><?php Carte('Nom de la carte'); ?></td>
            </tr>
            <tr>
                <td>Date d'expiration de la carte: </td>
                <td><?php Carte('Date d\'expiration'); ?></td>
            </tr>
            <tr>
                <td>Cryptogramme: </td>
                <td><?php Carte('Code de Securite'); ?></td>
            </tr>       
        
            </table>
        </div>
      </div>

    <br><input id="creer_compte_perso" type="checkbox"> J'ai lu et j'accepte les conditions générales de ventes: </input><br><br>
    <a href="#"><input type="submit" name="Valider" style="color: black;" value="Valider"></submit></a><br><br><br>
</form>




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