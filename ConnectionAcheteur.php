<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Piscine.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<?php $site=$_GET['site']; ?>

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


<form id="form_connect" method="post">
    <h1>Connectez-vous pour acheter</h1><br>
    <input id="connexion" type="text" placeholder="Login ou Email" name="log"><br>
    <input id="connexion" type="password" placeholder="Mot de Passe" name="passw"><br>
    <input type="submit" name="button" value="Valider"></submit><br><br><br>
    <?php echo"<a href='Acheteur_sign-in?site=$site'>Creer un compte"?>
</form>

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
$site=$_GET['site'];
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
$ip=getIp();
    $login=isset($_POST["log"])? $_POST["log"] : "";
    $pass=isset($_POST["passw"])? $_POST["passw"] : "";

    $database = "ebayece";

    $db_handle = mysqli_connect('localhost','root','');
    $db_found = mysqli_select_db($db_handle, $database);
    if (isset($_POST["button"]))
    {
      if ($db_found) 
      {
        $connexion = false;
        $sql = "SELECT mail,password FROM acheteur";
        $result = mysqli_query($db_handle, $sql);
        while($data = mysqli_fetch_assoc($result))
        {
          if(($data['mail']==$login)&&($data['password']==$pass))
          {
            $connexion = true;
            break;
          }
        }
        if ($connexion) 
        { 
          $sql="SELECT acheteur_id FROM acheteur Where mail like '$login' AND password like '$pass'";
          $result = mysqli_query($db_handle, $sql);
          while($data = mysqli_fetch_assoc($result))
          {
            $sql="SELECT ip from connexion_courante where ip like'$ip'";
            $result= mysqli_query($db_handle, $sql);
            $nbr=mysqli_num_rows($result);
            if($nbr==0)
            {
              $sql ="INSERT INTO connexion_courante (ip,acheteur_id) Values ('$ip',$data[acheteur_id])";
              mysqli_query($db_handle, $sql);
            }
            else
            {
              $sql="UPDATE connexion_courante set acheteur_id=$data[acheteur_id] WHERE ip like'$ip'";
              mysqli_query($db_handle, $sql);
            }
          }
          echo "<script>window.location.assign('$site'); </script>"; 
        } 
        else 
        { 
          echo "<script>alert('Connexion refusée');</script>"; 
        } 
      }
      mysqli_close($db_handle);
    }
?>



</body>
</html>
