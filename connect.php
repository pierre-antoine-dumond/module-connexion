<?php 
    session_start();
    $_SESSION['connect'] = 1;
    var_dump(isconnect());
    exit();

    // session_start();
    // $_SESSION['role'] = 'administrateur';

    $user='root';
    $pass = 'root';
    $db = 'moduleconexion';
    $dbconn = new mysqli('localhost', $user, $pass, $db);

    // $user='root';
    // $pass = 'dbmoduleconnexion';
    // $db = 'pa-mod-conn';
    // $dbconn = new mysqli('localhost', $user, $pass, $db);

    $conn = mysqli_connect('localhost', $user, $pass, $db);

    if (!$conn) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
    echo "Connexion réussie";
?>