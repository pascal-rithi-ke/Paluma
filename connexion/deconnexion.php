<?php

include '../database/database.php';
include 'session.php';

setcookie('user', NULL, -1, '/', $domain, $https, true);
unset($_SESSION['id']);
unset($_SESSION['co']);
unset($_SESSION['admin']);


$page = <<<HTML
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="3; URL=." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <title>Compte</title>
</head>

<body>
    <article>
        <div>
            <p>Vous êtes maintenant déconnecté(e)</p>
        </div>
    </article>
</body>

</html>
HTML;

echo $page;