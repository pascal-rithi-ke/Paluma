<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'paluma');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

/**
 * Connexion à la base de données
 */
try {
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER,  DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbCo = true;
} catch (PDOException $e) {
    $dbCo = false;
    echo "<!-- Problème de connexion à la base de données --> \n";
}