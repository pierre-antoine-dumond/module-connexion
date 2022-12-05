<?php
    if (!isset($_POST['Login']) || !isset($_POST['Prenom']) || !isset($_POST['Nom']) || 
        !isset($_POST['Password']) || !isset($_POST['Confirmpasswd']))
    {
        echo('L\'intégralité des champs doivent être remplis');
        return;
    }	
    
    @$login = $_POST['Login'];
    @$prenom = $_POST['Prenom'];
    @$nom = $_POST['Nom'];
    @$passwd = $_POST['Password'];
    // $confirmpasswd = $_POST['Confirmpasswd'];
    // $hashed_password = crypt($passwd);

    $login = valid_donnees($_POST['Login']);
    $prenom = valid_donnees($_POST['Prenom']);
    $nom = valid_donnees($_POST['Nom']);

    if (!empty($prenom)
        && strlen($prenom) <= 20
        && !empty($nom) 
        && strlen($nom) <= 20
        && !empty($login) 
        && strlen($login) <= 20) {
            try {
                // include 'connect.php';
                $sqlQuery = 'INSERT INTO utilisateurs(login, prenom, nom, password) VALUES(:login, :prenom, :nom, :password)'; 
            }
            catch(Exception $e) {
                echo 'Erreur : '.$e->getMessage();
            }
    } else {
        include 'connect.php';
        header("Location:form-merci.html");
    }
?>