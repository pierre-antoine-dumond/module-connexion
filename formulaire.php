<!-- Récupération des fichiers nécéssaires aux fonctionnement du programme -->
<?php
phpinfo();
?>
<?php
    require 'connect.php';
?>

<?php  
    $erreurTxt = 'Veuillez entrer l\'intégralité des champs <br>';
    $erreurNum = 'Veuillez entrer un age valide <br>';

    // Vérification de la configuration des variables et de l'entrée des données par l'utilisateur 
    if(isset($_POST['Envoyer'])) {
        // On récupère les éléments du tableau de la variable superglobal dans une variable standard
        $login = $_POST['Login'];
        $prenom = $_POST['Prenom'];
        $nom = $_POST['Nom'];
        $password = $_POST['Password'];
        $confirmpassword = $_POST['Confirmpassword'];
        $age = $_POST['Age'];
        $message = $_POST['Message'];
        
        // Utilisation d'une fonction de vérification des données 
        // On récupère la clé de la variable global $_POST dans le "name" de l'input
        $login = valid_donnees($_POST['Login']);
        $prenom = valid_donnees($_POST['Prenom']);
        $nom = valid_donnees($_POST['Nom']);
        $message = valid_donnees($_POST['Message']);
        $age = valid_donnees($_POST['Age']);

        // Envoie des données à la base de données MYSQL
        $sqlQuery = "INSERT INTO `utilisateurs`(`login`, `prenom`, `nom`, `password`) VALUES ('$login','$prenom','$nom','$password')";
        
        // Confirmation de l'envoi à la base de données
        if (mysqli_query($conn, $sqlQuery)) {
            header('Location: form-merci.php');
            die;
        } else {
            echo "Erreur : " . $sqlQuery . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        
        if(empty($nom) || empty($prenom) || 
            empty($login) || empty($password) || 
            empty($confirmpassword)) { 
                    echo $erreurTxt;
        } elseif($_POST['Password'] != $_POST['Confirmpassword']) {
                    echo "Veuillez taper un mot de passe identique";
                    $password = null;
                    $confirmpassword = null;
        } elseif ($_POST['Password'] == $_POST['Confirmpassword']) {
                    $password = $_POST['Password'];
        }

        if(!is_numeric($age)) {
            echo $erreurNum;
        }
    }
?>

<!-- Création du formulaire -->
<body>
    <form action="" method="POST" name="formulaire">
        <div class="c100">
            <label for="login">Login :</label>
            <input type="text" name="Login">
        </div>
        <div class="c100">
            <label for="Prenom">Prenom :</label>
            <input type="text" name="Prenom">
        </div>
        <div class="c100">
            <label for="Nom">Nom :</label>
            <input type="text" name="Nom">
        </div>
        <div class="c100">
            <label for="password">Password</label>
            <input type="Password" name="Password">
        </div>
        <div class="c100">
            <label for="confirmpassword">Confirm Password</label>
            <input type="Password" name="Confirmpassword">
        </div>
        <div class="c100">
            <label for="age">Age</label>
            <!-- <input type="number" min=12 name="Age"> -->
            <input type="text" min=12 name="Age" >
        </div>
        <div class="c100">
            <label for="message">message</label>
            <input type="text" name="Message">
        </div>
        <input type="submit" name="Envoyer" id="">
    </form>
</body>

<?php
    echo '<pre>';
    print_r($_POST);
    var_dump($_POST);
    // var_dump($_SESSION);
    echo '</pre>';
?>