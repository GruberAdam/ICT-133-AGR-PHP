<?php
/*  Autor : Adam Gruber
    Date : Insert date
    Version : 1.0 
    Project : Insert Project Name
*/

$_GET["action"] = "login";
// tampon de flux stocké en mémoire
ob_start(); // Ouvre la memoire tampon
$titre = "Rent A Snow - Acceuil"
?>
    <form action="index.php?action=login" method="post">
        <label for="user_name">Nom d'utilisateur</label>
        <input type="text" name="user_name" id="user_name" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit">
    </form>

<?php
$content = ob_get_clean();
require "gabarit.php";
?>