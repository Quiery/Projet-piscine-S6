<!DOCTYPE html>
<html>
<head>
  <title>modifier compte</title>
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
        echo "<script>window.location.assign('http://localhost/Projet-piscine-S6/ConnectionAcheteur.html?site=encherir.php%27); </script>"; 
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
        $database = "ebayece";
              $db_handle = mysqli_connect('localhost','root','root');
              $db_found = mysqli_select_db($db_handle, $database);
                
              if ($db_found) 
              {
                  $sql="SELECT * FROM acheteur WHERE acheteur_id LIKE '$acheteur_id'";
                  $result = mysqli_query($db_handle, $sql);
                  while($data = mysqli_fetch_assoc($result))
                  {
                  echo "<form  method='POST'>
            <h1>Modifier mon compte acheteur</h1><br>
            <h3>Vos données personnelles</h3>
            <table>
                <tr>
                    <td>Nom:<input type='text' name='nom' value='$data[nom]'/> </td>
                </tr>
                <tr>
                    <td>Prenom: <input type='text' name='prenom' value='$data[prenom]'/></td>
                </tr>
                <tr>
                    <td>Adresse: <input type='text' name='adresse' value='$data[adresse]'/> </td>
                </tr>
                <tr>
                    <td>Ville: <input type='text' name='ville' value='$data[ville]'/> </td>
                </tr>
                <tr>
                    <td>Code Postal: <input type='text' name='code_postal' value='$data[code_postal]'/> </td>
                </tr>
                <tr>
                    <td>Pays: <input type='text' name='pays' value='$data[pays]'/> </td>
                </tr>
                <tr>
                    <td>Numéro de Téléphone: <input type='text' name='telephone' value='$data[telephone]'/> </td>
                </tr>
                <tr>
                    <td>Email: <input type='text' name='mail' value='$data[mail]'/> </td>
                </tr>
                <tr>
                    <td>Mot de passe: <input type='password' name='password' value='$data[password]'/> </td>
                </tr>
            </table>";
                      
                      $sql = "SELECT * FROM carte_bancaire WHERE numero_carte LIKE '$data[carte_id]'";
                    $result2 = mysqli_query($db_handle, $sql);
                  while($data2 = mysqli_fetch_assoc($result2))
                {
                echo "
                        <h3>Vos données bancaires</h3>
                        <table>
                            <tr>
                                <td>Type de carte de paiement: <select name='type'><option value='$data2[type]'>$data2[type]</option><option value='Visa'>Visa</option><option value='MasterCard'>MasterCard</option><option value='American Express'>American Express</option></select> </td>
                            </tr>
                            <tr>
                                <td>Numero de la carte: <input type='text' name='numero_carte' value='$data2[numero_carte]'/> </td>
                            </tr>
                            <tr>
                                <td>Nom affiché sur la carte: <input type='text' name='nom_carte' value='$data2[nom]'/> </td>
                            </tr>
                            <tr>
                                <td>Date d'expiration de la carte: <input type='text' name='date_expiration'  placeholder='YYYY-MM-DD' value='$data2[date_expiration]'/> </td>
                            </tr>
                            <tr>
                                <td>Cryptogramme: <input type='text' name='code' value='$data2[code]'/></td>
                            </tr>
                            </table>
                            <input type='submit' name='valider' value='Valider'></form><br>";
                      

                  $nom=isset($_POST['nom'])? $_POST['nom'] : "";
                  $prenom=isset($_POST['prenom'])? $_POST['prenom'] : "";
                  $adresse=isset($_POST['adresse'])? $_POST['adresse'] : "";
                  $code_postal=isset($_POST['code_postal'])? $_POST['code_postal'] : "";
                  $ville=isset($_POST['ville'])? $_POST['ville'] : "";
                  $pays=isset($_POST['pays'])? $_POST['pays'] : "";
                  $telephone=isset($_POST['telephone'])? $_POST['telephone'] : "";
                  $mail=isset($_POST['mail'])? $_POST['mail'] : "";
                  $password=isset($_POST['password'])? $_POST['password'] : "";
                  $type=isset($_POST['type'])? $_POST['type'] : "";
                  $numero_carte=isset($_POST['numero_carte'])? $_POST['numero_carte'] : "";
                  $nom_carte=isset($_POST['nom_carte'])? $_POST['nom_carte'] : "";
                  $date_expiration=isset($_POST['date_expiration'])? $_POST['date_expiration'] : "";
                  $code=isset($_POST['code'])? $_POST['code'] : "";
                  
                  
                      if(isset($_POST['valider']))
                      {
                          
                          $sql = "UPDATE acheteur SET nom='$nom', prenom='$prenom', mail='$mail', telephone='$telephone', adresse='$adresse', ville='$ville', code_postal='$code_postal', pays='$pays', password'$password', numero_carte='$numero_carte' WHERE acheteur_id LIKE $acheteur_id";
                        
                          mysqli_query($db_handle, $sql);
                          $sql = "UPDATE carte_bancaire SET numero_carte='$numero_carte', nom='$nom_carte', type='$type', date_expiration='$date_expiration', code='$code' WHERE numero_carte LIKE '$data[carte_id]'";
                         
                              mysqli_query($db_handle, $sql);
                          echo "<script>window.location.assign('homepage.php'); </script>";
                          
                      }
         mysqli_close($db_handle);
              }
              }}
       ?>
        </div>
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