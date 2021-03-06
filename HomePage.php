<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div class="item active">
      <div class="col-lg-4" >
        <div class="card mb-2" id="col-carou">
          <a href="achats.php?achats=Achats Immediats"><img class="card-img-top"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRTA-bKuvjnvKDbDWU5-mj4n03-LtCEWUFNI3yupAIT13R5_bOt&usqp=CAU"
            id="img_carou"
            alt="Card image cap">
        </div>
        <div class="card-body" id="card-body-1"> 
          <h5 class="card-title">Achat Immédiat --> Prix: 21,7 millions €</h5>
          <p class="card-text">Montre Suisse Grandmaster Chime 6300A-010</p>
        </div>
        </a>
      </div>

        <div class="col-lg-4" >
          <div class="card mb-2" id="col-carou">
          <a href="achats.php?achats=Enchères"><img class="card-img-top"
              src="https://www.expertisez.com/images/Gaston_Anglade.jpg"
              id="img_carou"
              alt="Card image cap">
          </div>
          <div class="card-body" id="card-body-1"> 
            <h5 class="card-title">Enchère   -->   Prix: 300€</h5>
            <p class="card-text">Tableau de Gaston Anglade</p>
          </div> 
        </div>

      <div class="col-lg-4">
        <div class="card mb-2" id="col-carou">
        <a href="achats.php?achats=Meilleure Offre"><img class="card-img-top"
            src="https://magazine.interencheres.com/wp-content/uploads/2018/11/Sans-titre-1-6-750x562.jpg"
            id="img_carou"
            alt="Card image cap">
        </div>
        <div class="card-body" id="card-body-1"> 
          <h5 class="card-title">Meilleur Offre   -->   Prix: 100k€</h5>
          <p class="card-text">Vase de Jacques Guerlain<p>
        </div> 
      </div>

  </div>

<div class="item">
  <div class="col-lg-4" >
    <div class="card mb-2" id="col-carou">
    <a href="achats.php?achats=Achats Immediats"><img class="card-img-top"
        src="https://www.primardeco.com/uploads/media/product/0001/14/thumb_13807_product_small.jpeg"
        id="img_carou"
        alt="Card image cap">
    </div>
    <div class="card-body" id="card-body-1"> 
      <h5 class="card-title">Achat Immédiat  -->    Prix: 3000€ </h5>
      <p class="card-text">Tapisserie d'Aubusson XVIIE 'CÉRÈS SUR SON CHAR TIRÉ PAR DEUX LIONS'</p>
    </div> 
  </div>

    <div class="col-lg-4" >
      <div class="card mb-2" id="col-carou">
      <a href="achats.php?achats=Enchères"><img class="card-img-top"
          src="https://chenalotte.org/wp-content/uploads/2019/11/Zingg_2-672x372.jpg"
          id="img_carou"
          alt="Card image cap">
      </div>
      <div class="card-body" id="card-body-1"> 
        <h5 class="card-title">Enchère   -->   Prix: 2000€ </h5>
        <p class="card-text">Paysage du Haut-Doubs, la Chenalotte en hiver de Jules-Émile Zingg</p>
      </div> 
    </div>

  <div class="col-lg-4">
    <div class="card mb-2" id="col-carou">
    <a href="achats.php?achats=Meilleure Offre"><img class="card-img-top"
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSiwFvNsY2u0UwmK3AVZlzjnNAleK928Cu2z57RZKEE29XGowH9&usqp=CAU"
        id="img_carou"
        alt="Card image cap">
    </div>
    <div class="card-body" id="card-body-1"> 
      <h5 class="card-title">Meilleur Offre   -->   Prix:2800€ </h5>
      <p class="card-text">Bague sertie d'un saphir de ceylan 28 carats</p>
    </div> 
  </div>

</div>
</div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
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
