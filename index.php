<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def50200082646fd6a944d66ffa334bb7eed1de2619ca637e69bc30de373157effde53dc29f997326085dc7163f44e94c921d3f45961c6a2359679fc41b1ad02855353963180bcfcc3c6997b58d839813513e51fd0b7f9c90e22f5b8b2262330baabe7ca62e3026f16c66fc75ea1f36df8675bc1efffc5043b21b56ff3a8268a3bb4440bc6e80e64eb4dc8c9182840ca8266d54e7e0002a44dc1ad9c6b9aea57af82990ac1c069a651bc24e4e23782302778274797281636a0c8c60e4079f737e17e38354ed9bc69c5fd5c082d902ae67d13fce2354ee249a53dfc38a76d281356fe02ae20e8e2a1e900a48095d8cbaf92e9b584e2a1b5944cc72cf805354b917d8ce86056c8d71dba05c7c1edbd0fa487cb7f8a17c822ef66a4557bb72db6501e799e1373f5ec6084fa1bf6c562d61325d276c96690e8c44ab3e8385ceef266538e03050fbf5dd1e91216a89b8a31d6e3ada894c5904db98bbea37e8bf2a827102b9bf9e0c5e1856524a21679fc128dca36342dbb9b1595781bb40dd4c9eba42fc6180162569546d629a36efe925d9840114cec6707a49a78ced7773b2708f14e34d503fa8bb77c13618ccca60133350d143ade401c4f262df92c04ebb698';
$redirect_uri = 'https://gecmanow.site';

$out = new IntegrationClass($subdomain, $client_id, $secret_key, $code, $redirect_uri);

var_dump($out->result);
/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */

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