<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Тестовое задание'); ?>
<? $APPLICATION->IncludeComponent(
    "test:feedback",
    "",
    [
        "EMAIL_TO" => "tipikin.work@yandex.ru",
        "EVENT_ID" => 7,
        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
        "REQUIRED_FIELDS" => [
            0 => "applicationTitle",
            1 => "feedbackCategory",
            2 => "feedbackView"
        ],
        "MODAL_HEADER" => "Новая заявка",
        'APPLICATION_TITLE' => 'Заголовок заявки',
        'APPLICATION_TITLE_PLACEHOLDER' => 'Введите заголовок',
        'CATEGORY_TITLE' => 'Категории',
        'CATEGORY_VALUE' => [
            0 => 'Масла, автохимия, фильтры, автоаксессуары, обогреватели, запчасти, сопутствующие товары',
            1 => 'Шины, диски'
        ],
        'APPLICATION_VIEW' => 'Вид заявки',
        'APPLICATION_VIEW_VALUE' => [
            0 => 'Запрос цены и сроки поставки',
            1 => 'Пополнение складов',
            2 => 'Спецзаказ'
        ],
        'SUPPLY_STOCK' => 'Склад поставки',
        'SUPPLY_STOCK_EMPTY' => 'Выбирите склад поставки',
        'SUPPLY_STOCK_VALUE' => [
            1 => 'Склад поставки 1',
            2 => 'Склад поставки 2'
        ],
        'FILE_TITLE' => 'Файл',
        'COMMENT_TITLE' => 'Комментарий',
        'COMMENT_TITLE_PLACEHOLDER' => 'Введите комментарий',
        'ITEMS_TITLE' => 'Состав заявки',
        'ITEMS_HEADER' => [
            0 => 'Бренд',
            1 => 'Наименование',
            2 => 'Количество',
            3 => 'Фасовка',
            4 => 'Клиент'
        ],
        'ITEM_BRAND_OPTION_EMPTY' => 'Выберите бренд',
        'ITEM_BRAND_VALUE' => [
            0 => 'Apple',
            1 => 'Samsung'
        ],
    ]
); ?>

<? require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>