<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

function d($var, $die = false)
{
    echo '<pre>'; print_r($var); echo '</pre>';
    !$die ?: exit;
}