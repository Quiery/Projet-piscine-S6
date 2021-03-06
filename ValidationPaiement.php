<!DOCTYPE html>
<html>
<head>

  <title>Validation paiement</title>
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
        echo "<script>window.location.assign('http://localhost/Projet-piscine-S6/ConnectionAcheteur.html?site=encherir.php'); </script>"; 
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


<div class="row" id="flex">
    <div class="main">
        <?php
        $prix=$_GET['prix'];
        $database = "ebayece";

              $db_handle = mysqli_connect('localhost','root','');
              $db_found = mysqli_select_db($db_handle, $database);
              if ($db_found) 
              {
                  $sql = "SELECT * FROM acheteur WHERE acheteur_id=$acheteur_id";
                    $result = mysqli_query($db_handle, $sql);
                  while($data = mysqli_fetch_assoc($result))
                {
                  echo "<form id='form_compte'>
            <h1>Validation paiement</h1><br>
            <h3>Vos données personnelles</h3>
            <table>
                <tr>
                    <td>Nom:$data[nom] </td>
                </tr>
                <tr>
                    <td>Prenom: $data[prenom]</td>
                </tr>
                <tr>
                    <td>Adresse: $data[adresse] </td>
                </tr>
                <tr>
                    <td>Ville: $data[ville] </td>
                </tr>
                <tr>
                    <td>Code Postal: $data[code_postal] </td>
                </tr>
                <tr>
                    <td>Pays: $data[pays] </td>
                </tr>
                <tr>
                    <td>Numéro de Téléphone: $data[telephone] </td>
                </tr>
                <tr>
                    <td>Email: $data[mail] </td>
                </tr>
            </table>";
                
            
                $sql = "SELECT * FROM carte_bancaire WHERE numero_carte LIKE '$data[carte_id]'";
                    $result2 = mysqli_query($db_handle, $sql);
                  while($data2 = mysqli_fetch_assoc($result2))
                {
                    $carte=$data2['numero_carte'];
                      echo "
                        <h3>Vos données bancaires</h3>
                        <table>
                            <tr>
                                <td>Type de carte de paiement: $data2[type] </td>
                            </tr>
                            <tr>
                                <td>Numero de la carte: $data2[numero_carte] </td>
                            </tr>
                            <tr>
                                <td>Nom affiché sur la carte: $data2[nom] </td>
                            </tr>
                            <tr>
                                <td>Date d'expiration de la carte: $data2[date_expiration] </td>
                            </tr>
                            <tr>
                                <td>Cryptogramme: $data2[code]</td>
                            </tr>       
                        </table>";
                      
                } 
              
                echo "
            
            <br><input id='creer_compte_perso' type='checkbox' required> J'ai lu et j'accepte les conditions générales de ventes </input><br><br><br><br><br>
        </form>
    </div>
    <div class='side'>
        <h1>Montant Total: <br>
            $prix €
            
        </h1>
        <form method='POST'><input type='submit' name='new' value='Valider les informations et payer'>";
            }
        }
        ?>
        </div>

</div>

<?php
if (isset($_POST["new"]))
{
    $sql="SELECT numero_carte,nom,type,date_expiration,code from carte_bancaire 
    WHere numero_carte IN ( SELECT numero_carte FROM compte_bancaire)
    AND nom IN ( SELECT nom FROM compte_bancaire)
    AND type IN ( SELECT type FROM compte_bancaire)
    AND date_expiration IN ( SELECT date_expiration FROM compte_bancaire)
    AND code IN ( SELECT code FROM compte_bancaire)
    AND numero_carte LIKE '$carte'";
    $result = mysqli_query($db_handle, $sql);
    $nbr=mysqli_num_rows($result);
    if($nbr==0)
    {
        echo "<script>alert('Paiement refusée');</script>"; 
    }
    else
    {

        $sql="SELECT plafond from compte_bancaire where numero_carte like '$carte'";
        $result = mysqli_query($db_handle, $sql);
        while($data = mysqli_fetch_assoc($result))
        {
            if($data['plafond']<$prix)
            {
                echo "<script>alert('Paiement refusée');</script>"; 
            }
            else
            {
                $sql2="SELECT produit_id from panier where acheteur_id=$acheteur_id and methode=1";
                $result2 = mysqli_query($db_handle, $sql2);
                while($data2 = mysqli_fetch_assoc($result2))
                {
                  echo "<script>alert('Paiement acceptée');</script>"; 
                    $sql3="UPDATE produit set statut=1 where produit_id=$data2[produit_id]";
                    mysqli_query($db_handle, $sql3);
                    $sql3="DELETE from panier where produit_id=$data2[produit_id]";
                    mysqli_query($db_handle, $sql3);
                }
                echo "<script>window.location.assign('HomePage.php'); </script>";
            }
        }
    }
}
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
