<!DOCTYPE html>
<html>
<head>
  <title>Acheteur sign-in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Piscine.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
#flex {
    display: flex;
    margin: 0% 20%;
    background-color: blanchedalmond;
}
    </style>

</head>
<body>


<div><a href="homepage"><img src="NGA.png"></a></div>
    
    <div class="row" id="flex">
    <div class="main">
        <form  method='POST'>
            <h1>Créer un compte acheteur</h1><br>
            <h3>Vos données personnelles</h3>
            <table>
                <tr>
                    <td>Nom:<input type='text' name='nom'/> </td>
                </tr>
                <tr>
                    <td>Prenom: <input type='text' name='prenom'/></td>
                </tr>
                <tr>
                    <td>Adresse: <input type='text' name='adresse'/> </td>
                </tr>
                <tr>
                    <td>Ville: <input type='text' name='ville'/> </td>
                </tr>
                <tr>
                    <td>Code Postal: <input type='text' name='code_postal'/> </td>
                </tr>
                <tr>
                    <td>Pays: <input type='text' name='pays'/> </td>
                </tr>
                <tr>
                    <td>Numéro de Téléphone: <input type='text' name='telephone'/> </td>
                </tr>
                <tr>
                    <td>Email: <input type='text' name='mail'/> </td>
                </tr>
                <tr>
                    <td>Mot de passe: <input type='password' name='password'/> </td>
                </tr>
            </table>
                        <h3>Vos données bancaires</h3>
                        <table>
                            <tr>
                                <td>Type de carte de paiement: <select name='type'><option value='Visa'>Visa</option><option value='MasterCard'>MasterCard</option><option value='American Express'>American Express</option></select> </td>
                            </tr>
                            <tr>
                                <td>Numero de la carte: <input type='text' name='numero_carte'/> </td>
                            </tr>
                            <tr>
                                <td>Nom affiché sur la carte: <input type='text' name='nom_carte'/> </td>
                            </tr>
                            <tr>
                                <td>Date d'expiration de la carte: <input type='text' name='date_expiration'  placeholder='YYYY-MM-DD'/> </td>
                            </tr>
                            <tr>
                                <td>Cryptogramme: <input type='text' name='code'/></td>
                            </tr>
                            </table>
                            <input type='submit' name='valider' value='Valider'></form><br>;
                      
<?php
        $database = "ebayece";
              $db_handle = mysqli_connect('localhost','root','root');
              $db_found = mysqli_select_db($db_handle, $database);
                
              if ($db_found) 
              {
                  
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
                          $sql = "INSERT INTO acheteur (nom, prenom, mail, telephone, adresse, ville, code_postal, pays, password, carte_id) VALUES('$nom', '$prenom', '$mail', '$telephone', '$adresse', '$ville', '$code_postal', '$pays', '$password', '$numero_carte')";
                        
                          mysqli_query($db_handle, $sql);
                          $sql = "INSERT INTO carte_bancaire (numero_carte, nom, type, date_expiration, code) VALUES ('$numero_carte', '$nom_carte', '$type', '$date_expiration', '$code')";
                          if (mysqli_query($db_handle, $sql) === TRUE) {
                        echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>". mysqli_error($db_handle);
                        }
                              mysqli_query($db_handle, $sql);
                          //echo "<script>window.location.assign('homepage.php'); </script>";
                          
                      }
         mysqli_close($db_handle);
              }
                      
       ?>
        </div>
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
    <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d auteur: webDynamique.ece.fr</div>
</footer>


</body>
</html>
