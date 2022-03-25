<?php
require 'config.php';

$message = "";
// se connecter au serveur Mysql

$mysqli = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD); //@pour ne rien afficher si erreur

// selectionner une base de donnée
if($mysqli){
    if(mysqli_select_db($mysqli, DATABASE)){
        //préparer une requète
        $query = 'SELECT * FROM `books`';
        $result = mysqli_query($mysqli, $query);
        if($result){
            //extraire les résultats
            while (($book = mysqli_fetch_assoc($result)) != null){
                $books[] = $book;
            }
            //libérer la mémoire
            mysqli_free_result($result);
        }
    } else {
        $message = "Base de donnée inconnue";
    }
} else {
    $message = "Erreur de connexion";
}

//fermer la connection
mysqli_close($mysqli);
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Biblioweb : Dbaccess</title>
</head>
</html>
<header>

</header>
<body>
<div><?= $message ?></div>
<section id ="liste">
    <?php foreach($books as $book){ ?>
    <article>
        <h2><?= $book['title'] ?></h2>
        <figure>
            <img src="<?= $book['cover_url'] ?>" alt="<?= $book['title'] ?>" width="100">
            <figcaption><?= $book['title'] ?></figcaption>
        </figure>
        <p><?= $book['description'] ?></p>
    </article>
    <?php } ?>
</section>
</body>