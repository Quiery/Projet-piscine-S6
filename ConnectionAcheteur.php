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


<form id="form_connect" method="post">
    <h1>Connectez-vous pour acheter</h1><br>
    <input id="connexion" type="text" placeholder="Login ou Email" name="log"><br>
    <input id="connexion" type="password" placeholder="Mot de Passe" name="passw"><br>
    <input type="submit" name="button" value="Valider"></submit><br><br><br>
    <button>Creer un compte</button>
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
