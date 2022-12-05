<!-- trim —> Supprime les espaces (ou d'autres caractères) en début et fin de chaîne -->
<!-- stripslashes -> stripslashes — Supprime les antislashs d'une chaîne -->
<!-- htmlspecialchars -> htmlspecialchars — Convertit les caractères spéciaux en entités HTML -->
<?php
    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
    }
?>
<?php
    function isconnect(): bool {
        return !empty($_SESSION['connect']); 
    }
?>