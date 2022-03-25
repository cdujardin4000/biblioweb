<?php
// se connecter au serveur Mysql

$mysqli = @mysqli_connect('localhost', 'root', ''); //@pour ne rien afficher si erreur

// selectionner une base de donnée
if($mysqli){
    if(mysqli_select_db($mysqli, 'biblioweb')){
        //préparer une requète
        $result = $query = 'SELECT * FROM `books`';
        //extraire les résultats
        $line = mysqli_fetch_assoc($result);
        //libérer la mémoire

    } else {
        $message = "Base de donnée inconnue";
    }
} else {
    $message = "Erreur de connexion";
}






//fermer la connection