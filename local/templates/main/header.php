<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
$curPage = $APPLICATION->GetCurPage(true);
$assets = \Bitrix\Main\Page\Asset::getInstance();
?><!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/assets/favicon/favicon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <meta name="theme-color" content="#ffffff">

        <title><?$APPLICATION->ShowTitle()?></title>

        <?
        /**
         * CSS
         */
        $assets->addCss(SITE_TEMPLATE_PATH . '/assets/dist/css/bootstrap.min.css');
        $assets->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
        /**
         * JS
         */
        \CJSCore::Init(array('jquery'));
        $assets->addJs(SITE_TEMPLATE_PATH . '/assets/dist/js/jquery-3.6.1.min.js');
        $assets->addJs(SITE_TEMPLATE_PATH . '/assets/dist/js/bootstrap.bundle.min.js');
        $assets->addJs(SITE_TEMPLATE_PATH . '/js/main.js');

        /**
         * BITRIX ->ShowHead()
         */
        $APPLICATION->ShowMeta("robots", false);
        $APPLICATION->ShowMeta("keywords", false);
        $APPLICATION->ShowMeta("description", false);
        $APPLICATION->ShowLink("canonical", null);
        $APPLICATION->ShowCSS(true);
        $APPLICATION->ShowHeadStrings();
        $APPLICATION->ShowHeadScripts();
        ?>

    </head>
<body class="d-flex text-bg-light">

    <div class="container d-flex w-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <!-- header -->
        </header>
        <main class="px-3 text-center">