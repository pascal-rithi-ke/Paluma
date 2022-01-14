<?php

include '../database/database.php';
include 'functions.php';
include 'session.php';

if (isset($_SESSION['co'])) {
    header('location: compte.php');
}

$remember = '0';

if (isset($_POST['send'])) {

    extract($_POST);

    if (!empty($username) && !empty($password)) {

        $q = $db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $q->execute([$username]);
        $user = $q->fetch();

        if ($user) {

            if ($password == $user['mdp']) {

                $_SESSION['id'] = $user[0];
                $_SESSION['co'] = $user[3];
                $_SESSION['admin'] = $user[5];

                if ($remember == '1') {

                    $token = token(255);
                    $q = $db->prepare('UPDATE user SET token = :token WHERE id = :id');
                    $q->execute([
                        'token' => $token,
                        'id' => $user['id']
                    ]);
                    setcookie('user', $user['id'] . '==' . $token . sha1($user['id']), time() + 5184000, '/', $domain, $https, true); # Le cookie expire au bout de 2 mois

                }

                header('location: compte.php');

            } else {

                $status_msg = 'Nom d\'utilisateur ou mot de passe incorrect.';

            }

        } else {

            $status_msg = 'Nom d\'utilisateur ou mot de passe incorrect.';

        }

    } else {

        $status_msg = 'Veuillez compléter tous les champs.';

    }

}

if (isset($status_msg)) {
    $sending = '<p>' . $status_msg . '</p>' . "\n";
} else {
    $sending = '';
}

$page = <<<HTML
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <title>Connexion</title>
</head>

<body>
    <article>
        <h1>Connexion</h1>
        <div>
            <form method="post">
                <label>Nom d'utilisateur :</label>
                <input type="text" name="username" id="username" autofocus required />
                <label>Mot de passe :</label>
                <input type="password" name="password" id="password" required />
                <label class="checkbox_lbl">
                    <input type="checkbox" name="remember" id="remember" class="checkbox" value="1" />
                    <span class="checkbox_txt">Rester connecté</span>
                </label>
                <div id="btn">
                    <input type="submit" name="send" id="send" value="Connexion" />
                    {$sending}
                </div>
            </form>
        </div>
    </article>
</body>

</html>
HTML;

echo $page;
