<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def50200246f93905c68a659cde53302994b5cdd73ae0c19a3c31dfa2e285c4e6569eb1da7fab1b2dddbda441b18ff7016a50eb9d45919892a49dad4ed9fd435479f849c100924b7d93e0ecd109bdc0ce3314f379da0182363917f246bc98c17097eedcc420c1275d3e3a260685f3d47a70e78d340ec7e0825ada01b0c6b24e7c6fd393bf1278007aa82d8abda7f06f761f200d2b6d6589ecd0a320b3e418425949e885275a5b31a82f0510b6a988fced5fdc1299a9486d7f82f82b9bba1d62bc88873d52c5c0e449f593beed4fecf1bad6026cfb7a0df04e94033c77b8500aaffd6ed67fd72c37d191dfcc443d8364aecdfa8ac384040b3aa47cf273fe8922bb6d9d1a8a925df933a099edc30de90fc961c0898b070ba5de7ab03a85ec4c2bb3a33cec8f1c14209ae747dc23af24c70761b65c08cb98ad60dca9a440c2c29b4ffeb71fba5bfeb320ce5d2f136f93678cf20345965bffe8e16fb427d7e017f0225db82ec64dca5ef4c70342a2de02c90ff249abc07766e0e5ce2df07c5e7a8cc00b0cadb35a0b0e944ff9515f4b4a7e6f9f7394641085904d29b2d89f4a3c01502f5ac0826958c549d8f39cd581a2e75bba79ed1b3f31dc27eff29e66640c1';
$redirect_uri = 'https://gecmanow.site';

new IntegrationClass($subdomain, $client_id, $secret_key, $code, $redirect_uri);

/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */
var_dump($out);
$response = json_decode($out, true);

$access_token = $response['access_token']; //Access токен
$refresh_token = $response['refresh_token']; //Refresh токен
$token_type = $response['token_type']; //Тип токена
$expires_in = $response['expires_in']; //Через сколько действие токена истекает

// выведем наши токены. Скопируйте их для дальнейшего использования
// access_token будет использоваться для каждого запроса как идентификатор интеграции
var_dump($response);
var_dump($access_token);
var_dump($refresh_token );

$arrContactParams = [
    // поля для сделки
    "PRODUCT" => [
        "nameForm"	=> "Название формы",

        "nameProduct" 	=> "Название товара",
        "price"		=> "Цена",
        "descProduct"	=> "Описание заказа",

        "namePerson"	=> "Имя пользователя",
        "phonePerson"	=> "Телефон",
        "emailPerson"	=> "Email пользователя",
        "messagePerson"	=> "Сообщение от пользователя",
    ],
    // поля для контакта
    "CONTACT" => [
        "namePerson"	=> "Имя пользователя",
        "phonePerson"	=> "Телефон",
        "emailPerson"	=> "Email пользователя",
        "messagePerson"	=> "Сообщение от пользователя",
    ]
];