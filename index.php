<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def50200aea9875251685eda9995dfea5d0cd671717238a49ec8ace3076b97321d9b90020196c584fb29e6334f4d3f80012a4cd8c58b96c9bc96bc68f772bdbd49b8559e727f3154eb25bc2093a9cc05bff0fce7630463f79b5dbd7e8a8f5963ab651dbda481b943fdeb4775dc3c5b448b95138856e4f318c86698ef4e583153b316d26179792f508f4fd7303508d2740b2e701f436a204c44e24088752a9733bf26095892df3dcb7937b5e4d802e9b76695340a618607ee8884af23a7c4efbb6ec3267e14d090116c40500fab61779ce912382c935dd60981fc8ce328e05ed51602961f1a5147ebceb4efe157b215c5fba13cbb418662047f679d781b059b2a81b2edb545e34922a570792ae3e0b3c9b1c3d9f68201faa1bcc1e7c8b5daf26468b43a5c6dbff0f0a6f0c55ca970e986fc690032842d141be98a72ce1822f8946afaed2bd14a4a8ff2e520ad33838741e85ce5647322328b6c68e18037210596728843f352054b8c0ad63f372db2aa6f21a42b99cc07eb0ecb5a573ca82355e355817f3b514555ae4277ef2307113d3ee19484736122797aef2b04a2ef7460c4a788eba12539b087e5db21f4c62f92cd1990891c6286141637ed583130ec77';
$redirect_uri = 'https://gecmanow.site';

$out = new IntegrationClass($subdomain, $client_id, $secret_key, $code, $redirect_uri);

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