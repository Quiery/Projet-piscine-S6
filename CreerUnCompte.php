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

</style>


</head>
<body>


<div><a href="#"><img src="NGA.png"></a></div>
<form id="form_compte">
    <h1>Créer un compte acheteur</h1><br>
    <h3>Vos données personnelles</h3>
    <table>
        <tr>
            <td>Nom: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>
        <tr>
            <td>Prenom: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>
        <tr>
            <td>Adresse: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>
        <tr>
            <td>Ville: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>
        <tr>
            <td>Code Postal: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>
        <tr>
            <td>Pays: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>
        <tr>
            <td>Numéro de Téléphone: </td>
            <td><input id="creer_compte_perso" type="tel"></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input id="creer_compte_perso" type="email"></td>
        </tr>
    </table>

    <h3>Vos données bancaires</h3>

    <table>  
        <tr>
            <td>Type de carte de paiment:</td>
            <td><input id="creer_compte_perso" type="radio" name="card" Value="Visa"> Visa<br>
            <input id="creer_compte_perso" type="radio" name="card" Value="MasterCard"> MasterCard<br>
            <input id="creer_compte_perso" type="radio" name="card" Value="AmericanExpress"> AmericanExpress<br>
            
        </tr>
      
        <tr>
            <td>Numero de la carte: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>
        <tr>
            <td>Nom affiché sur la carte: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>
        <tr>
            <td>Date d'expiration de la carte: </td>
            <td><input id="creer_compte_perso" type="date"></td>
        </tr>
        <tr>
            <td>Cryptogramme: </td>
            <td><input id="creer_compte_perso" type="text"></td>
        </tr>


    </table>
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
