<?php
    require 'connect.php';
?>
<?php
    session_start();

    if (isset($_POST['Envoyer'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
?>