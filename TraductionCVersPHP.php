<?php
//Declaration des variables
$value = 20;
$step = 3;
$i = 0;
//Tant que i est plus petit que 10
while ($i < 10) {
    //Si la variable value est plus grande ou = a 30
    if ($value >= 30) {
        echo 'le nombre vaut' . $value . '<br>'; //Afficher le texte dit
    } else {    //Sinon
        echo 'nombre trop petit' . '<br>'; //Afficher le texte dit
    }
    //increment value par rapport a step
    $value += $step;
    //incremente de 1 i
    $i++;
}
?>