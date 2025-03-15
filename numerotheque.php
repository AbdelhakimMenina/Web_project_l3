<?php   
session_start();
if(!isset($_SESSION['user_id'])) header('location:form/Form2.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="pragma" content="no-cache" />
    <title>Numérothèque – Chronothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="css.css">
    <script src="jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="clavier/keyboard.css"> 
    <!-- <link rel="stylesheet" type="text/css" href="bubbles.css">  -->
    <script type="text/javascript" src="clavier/keyboard.js"></script>
    <script type="text/javascript" src="./brython.js"></script>
    <script type="text/javascript" src="./brython_stdlib.js"></script>
    <script type="text/javascript" language="javascript" src="langues/ToutesLangues.json"></script>
    <script type="text/javascript" language="javascript" src="numerotheque.js"></script>
    <script type="text/javascript" language="javascript" src="saisie.js"></script>
    <script type="text/javascript" language="javascript" src="exploiter-regles.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <?php include("./actions.php"); ?>

   <SCRIPT LANGUAGE="JavaScript">
      function PopupCentrer(page,largeur,hauteur,options) {
         var top=(screen.height-hauteur)/2;
         var left=(screen.width-largeur)/2;
         window.open(page,"","top="+top+",left="+left+",width="+largeur+",height="+hauteur+","+options);
      }
   </SCRIPT>

<style type="text/css">

    #modalContent2:target{
            display: block;
        }
    .popup_block{
            background: #fff;
            padding: 20px;
            //border: 20px solid #ddd;
            border:6px solid #336600;
            border-radius:10px;
            position: relative;
            margin: 10% auto;
            width: 40%;
            box-shadow: 0px 0px 20px #000;
        }
    #msg{

       font-size: 28px;
       font-weight: bold;
       font-family: italic;
       color:#8B4513;
    }

</style>

</head>
<body onload="demarrage()">
 <form action="numerotheque.php" method="post" id="FormulaireGlobal">

    <div class="layer hide">
        <div class="list">
                <i class="fas fa-times close-form"></i>  
                <table class="table">
                    <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Langue</th>
                        <!-- <th>Nom de Fichier</th> -->
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="display-data1">
                            <!-- <tr>
                                    <td>1</td>
                                    <td class="lang">Exp: Arabe</td>
                                
                                    <td>
                                        <button type="button" class="btn btn-primary voir">Voir</button>
                                        <button type="button" class="btn btn-primary modifier">Modifier</button>
                                        <button type="button" class="btn btn-primary telecharger-pdf">Telecharger PDF</button>
                                    </td>
                                   
                                </tr> -->
                                <!-- <tr>
                                        <td>2</td>
                                        <td>Anglais</td>
                                        <td>anglais.xml</td>
                                        <td>
                                            <button type="button" class="btn btn-primary">Voir</button>
                                            <button type="button" class="btn btn-primary">Modifier</button>
                                            <button type="button" class="btn btn-primary">Utiliser</button>
                                            <button type="button" class="btn btn-primary">Envoyer E-mail</button>
                                            <button type="button" class="btn btn-primary">Telecharger PDF</button>
                                        </td>
                                       
                                    </tr> -->
                                                                    
                    </tbody>
                </table>
       
        </div>
    </div>
    <div id="display-data" class="layer1 hide">
        <div class="list1">
                <i class="fas fa-times close-form"></i>
                <i class="fas fa-download" style="font-size: 30px;position: absolute;top: 10px;left: 30px;"></i>
                <i class="fas fa-edit" style="font-size: 30px;position: absolute;top: 10px;left: 80px;"></i>
                <button id="save-btn" class="btn btn-primary hide" style="position: absolute;top: 10px;left: calc(43%);">Enregistrer</button>
                 <div id="print-this">
                    <div class="display-data">
                            <!-- <div class="odd"> <span>Langue</span> </div>
                            <div class="even"> <span>Nom</span> : Arabe <span>Abbrevation</span> : ISO-789<span>Famille</span> : Arabien<span>Epoque</span> : Danger </div>
                            <div class="even"> <span>Provenance Geographique</span> : Afrique <span>La Sociolinguistique </span> : vernaculaire, véhiculaire</div>
                            <div class="even"><span>Ecriture</span> : Oui<span>Type</span> : Syllabique <span>Sens</span> : Droite-Gauche</div>
                            <div class="odd"> <span>Auteur</span> </div>
                            <div class="even"> <span>Nom</span> : Don <span>Prenom</span> : John<span>E-mail</span> : email@email.com<span>Institution</span> : Test </div>
                            <div class="odd"> <span>Informateur</span> </div>
                            <div class="even"> <span>Nom</span> : Don <span>Prenom</span> : John<span>E-mail</span> : email@email.com<span>Age</span> : 28 </div>
                            <div class="even"> <span>Langue Maternelle</span> : usuelle <span>Niveau D'education</span> : Universitaire</div>
                            <div class="even"><span>E-mail</span> : email@email.com<span>Age</span> : 28 <span>Sexe</span> : Homme <span>Source</span> : ... </div> -->
                            
                    </div>
                 </div>
        </div>
    </div>
    

    <header>
        <div class="holder">
            <!-- <div class="brand" style="background-image:url('logo/LOGO1.jpg');background-repeat: no-repeat;background-size: 140%; width: 114px; height: 81px; position: absolute; top: 6px; left: 6px; "></div>
            <div class="brand" style="background-image:url('logo/LOGO2.jpg');background-repeat: no-repeat;background-size: contain; width: 114px; height: 68px; position: absolute; top: 6px; left: 120px; "></div>
            <div class="brand" style="background-image:url('logo/LOGO3.jpg');background-repeat: no-repeat;width: 114px;height: 68px;position: absolute;top: 6px;left: 214px;background-size: contain;"></div> -->
            <div class="brand" style=" position:  absolute; top: 3px; left: 10px; ">Numérothèque – Chronothèque</div>
            <div class="float-right">
            <!--   <button type="button" class="btn btn-success save"><i id="i-save" class="far fa-save"></i>Enregistrer</button>
                <button type="button" class="btn btn-primary consulter">Consulter</button>
                <button type="button" class="btn btn-primary modifier"  id="modif-btn" >Modifier</button>
 -->          <div class="container">
                    <input type="submit" name="action"  Value="Enregistrer" class="btn btn-success "/>
                    <!-- Example single danger button -->
                    <div class="btn-group" style="margin-top: 10px;margin-right: 24px" >
                      <button type="button" class="btn btn-lg btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                       System Tools
                      </button>
                      <ul class="dropdown-menu">
                        <li> 
                            <input style="border: none; background-color: none; background: none;" type="submit" name="action"  Value="Save" class="dropdown-item">
                        </li>
                        <li>
                            <a class="dropdown-item" href="Form/managmen.php">User Management</a>
                        </li>
                        <!--<li><a class="dropdown-item" href="Form/Form3.php">Contact Us</a></li>-->
                        <li> <hr class="dropdown-divider"> </li>
                        <li>
                            <a class="dropdown-item" href="Form/logout.php"> Log Out</a>
                        </li>
                      </ul>
                    </div>  
                     <?php
                            $firstname=$_SESSION['first_name'];
                            $name=$_SESSION['name'];
                            echo '<span id="msg"> Bienvenue ' .$firstname.'  </span>';
                     ?> 
                </div>  
           </div>
        </div>
    </header>
    <!--les rubriques -->
    
    <aside>
        <ul>
            <!-- <li><i class="fas fa-flag"></i>Choisir la Langue</li> -->
            <li data-id="lang" class="activeli"><i class="fas fa-language"></i>Définir la langue et sa description</li>
            <li data-id="user"> <i class="far fa-address-card"></i>Auteurs et sources </li>
            <li data-id="typo"> <i class="fab fa-openid"></i>Typologie </li>
            <li data-id="numeration"><i class="fas fa-dice"></i>Système de numération</li>
     <!--   <li data-id="exploiter"><i class="fas fa-expregles"></i>Exploiter les règles</li>
     -->    <li data-id="calendrier"><i class="far fa-calendar-alt"></i>Système calendaire</li>
            <li ></li>
         </ul>
    </aside>

    <div class="alert alert-success hide text-center"> Données sauvegardées. </div>
    <div class="alert alert-danger hide text-center"> Vérifier les Champs. </div>
    <main>
        <!-- debut langue -->
      <div class="forms" id="lang">
        <?php include("onglet-langue.php");?>
      </div><!-- fin lang -->
        <!-- debut user -->
        <div class="forms" id="user">
        <?php include("onglet-utilisateurs.php");?>
        </div>
        <!-- fin user -->
       <!-- debut typo -->
        <div class="forms" id="typo">
        <?php include("onglet-typologie.php");?>
        </div>
        <!-- fin typo -->
        <!-- debut numeration -->
        <div class="forms" id="numeration">
        <?php include("onglet-regles.php");?>
        </div> <!-- fin création règles -->
        <div class="forms" id="exploiter">
        <h2>Exploiter les règles</h2>
        <?php //include("onglet-exploiter-regles.php");?>
        </div> <!-- fin numeration -->
        <!-- debut calendrier -->
        <div class="forms" id="calendrier">
        <?php include("onglet-calendrier.php");?>
        </div>
        <!-- fin horo -->
    </main>
    </form>    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <script src="regroupe.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript"> $(document).ready(function() { $('.affiche-clavier').keyboard({ language: 'us, arabic, vietnamese, japanese-latin, hindi' }); }); </script>
</body>
</html>