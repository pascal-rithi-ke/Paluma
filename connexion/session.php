<?php

global $db;

$domain = 'localhost';
$https = true;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_COOKIE['user']) && !isset($_SESSION['co'])) {

    $user_cookie = explode('==', $_COOKIE['user']);
    $user_id = $user_cookie[0];

    $q = $db->prepare('SELECT * FROM user WHERE id = ?');
    $q->execute([$user_id]);
    $user = $q->fetch();

    if ($user) {

        $value = $user_id . '==' . $user['token'] . sha1($user_id);
        if ($_COOKIE['user'] == $value) {
            $_SESSION['id'] = $user[0];
            $_SESSION['co'] = $user[3];
            $_SESSION['admin'] = $user[5];
            setcookie('user', $value, time() + 5184000, '/', $domain, $https, true);
        } else {
            setcookie('user', NULL, -1, '/', $domain, $https, true);
        }

    } else {
        setcookie('user', NULL, -1, '/', $domain, $https, true);
    }

}
