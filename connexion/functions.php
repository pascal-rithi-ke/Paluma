<?php

/**
 * Génère un token aléatoire
 *
 * @param $length int taille
 * @return string token
 */
function token($length) {
    $charlist = 'abcdefghijkmmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-';
    return substr(str_shuffle(str_repeat($charlist, $length)), 0, $length);
}