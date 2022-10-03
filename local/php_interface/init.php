<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// Подключение констант
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/constants.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/constants.php');
}

// Подключение обработчиков событий
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/handlers.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/handlers.php');
}

// Подключение глобальных функций (чаще всего используется для переноса кода сторонних разработчиков
// при получении проекта на доработку)
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/functions.php')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/functions.php');
}
