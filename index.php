<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def50200fa60b88385a89af4e1b2591abce9150c88dcc9202a2d626d42172a365c2752793ac10071b25d7add7b5e13d409bc09554d1267a7ebe3b40fbbd417042512447e4d0a2bb8d276e5c41b9a971f909823963d5830a3ab432b643a92d2003b0ba6a1fa276cbd865829e0b012f8e63784593a71721ba2ac0cd9214f054b1721c121ebbfa05c66c03b40f89250a754dbd61bf5c94245c29536e040bb0c4d55a7b1807d467624fd5cd17a8a7820e9b611c63ed50ef6a3f5a49e912a223c62258342688d74d5ad38bb522f0ca9151ce3f319025de97151056ebfee330d9ad9b1b02adcbd91ef7c2219af7415981ec137d67ae0460fce1b6a2efb49138d02837bbca72ac98a249a30ea3248a543d220624565d91bb8c070cf1584bd385c272f621d0dc5a8cace73f82af68cc7d1aabb1805349776dc6cbf7d3c85ac3c732234200430629be95d6326c6ecc3d750fd8c9f81a034fecca522258e3522c1214a2c992dc7f9dff6172f79878fdce5f1987ac092dd57bfe5c0199ece33d2b47811d5153693eb5a966de5c6e93e7cfd0d0162a3fa29130be7f956433b7aeafb0ac18ccf0d12db1f8e11525b9dbd75d3a5972cb6e1ada35c9ee40aec716a6b71364610';
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