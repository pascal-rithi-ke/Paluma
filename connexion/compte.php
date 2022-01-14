<?php

include 'session.php';

if (!isset($_SESSION['co'])) {
    header('location: .');
}

$page = <<<HTML
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <title>Compte</title>
</head>

<body>
    <article>
        <h1>Compte</h1>
        <div>
            <p>Bonjour {$_SESSION['co']} !</p>
            <p>admin : {$_SESSION['admin']}</p>
            <p><a href="deconnexion.php">Se déconnecter</a></p>
        </div>
    </article>
</body>

</html>
HTML;

echo $page;
