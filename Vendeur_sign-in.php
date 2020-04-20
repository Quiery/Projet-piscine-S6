<!DOCTYPE html>
<html>
<head>
  <title>Creation compte vendeur</title>
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


<div><a href="HomePage.html"><img src="NGA.png"></a></div>
    
    <div class="row" id="flex">
    <div class="main">

        <form  method='POST' enctype="multipart/form-data">
            <h1>Créer un compte vendeur</h1><br>
            <table>
                <tr>
                    <td>Nom:<input type='text' name='nom'/><br> </td>
                </tr>
                <tr>
                    <td>Prenom: <input type='text' name='prenom'/></td>
                </tr>
                <tr>
                    <td>Pseudo: <input type='text' name='pseudo'/></td>
                </tr>
                <tr>
                    <td>Email: <input type='text' name='mail'/></td>
                </tr>
                <tr>
                    <td>Photo de profil: <input type="file" name="pp"></td>
                </tr>
                <tr>
                    <td>Image de fond préféré: <input type="file" name="mur" ></td>
                </tr>
                </table>
            <input type='submit' name='valider' value='Valider'></form><br>
        
                <?php
        $database = "ebayece";
              $db_handle = mysqli_connect('localhost','root','root');
              $db_found = mysqli_select_db($db_handle, $database);
                
              if ($db_found) 
              {

                  $nom=isset($_POST['nom'])? $_POST['nom'] : "";
                  $prenom=isset($_POST['prenom'])? $_POST['prenom'] : "";
                  $pseudo=isset($_POST['pseudo'])? $_POST['pseudo'] : "";
                  $mail=isset($_POST['mail'])? $_POST['mail'] : "";
                  if(isset($_POST['valider']))
                      {
                      if (isset($_FILES['pp']['tmp_name'])) {
                                $target_dir="pp/";
                                $pp = $target_dir. basename($_FILES["pp"]["tmp_name"]);
                                copy($_FILES['pp']['tmp_name'], $target_dir. basename($_FILES["pp"]["tmp_name"]));
                      }
                          if (isset($_FILES['mur']['tmp_name'])) {
                                $target_dir="background/";
                                $mur = $target_dir. basename($_FILES["mur"]["tmp_name"]);
                                $retour = copy($_FILES['mur']['tmp_name'], $mur);
                          }

                          $sql = "INSERT INTO vendeur (nom, prenom, pseudo, mail, pp, mur) VALUES('$nom', '$prenom', '$pseudo', '$mail', '$pp', '$mur')";
                        
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
    <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
</footer>


</body>
</html>
