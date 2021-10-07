<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def502003b48f148837a4504d9727d8c24cf1e6e3e51824d26698d26e8a4fbfd531173fd0e5ff77abf1853214422ad2767038fd3b2e9b88a658011c32c3886774694d0e54d37376cd94af2fe01b1cafc9a72915ee0f9ed500c9bd72ee0c8c8059a268d75b202ae91a3617bbaac97a754df674e269846d3597ef2e8489c63fa771fc331b5fee82bb713be619a9f77344aa71d3c5abddbcaa117868a69e86dfd7e61cdc5f7035b8b4daea53e483b0da6f8fbe541e003fdd5a5957ef3ecd0dbafdfc3973db25641cfe2645beaf91c518f2207b06611cf5234630d09e0fd66f5f2c8f01cd95eee22801f2427e89f72641b0f9d180d123d2214df975801dcd875319f512d81c658fca1bb8f46d7bd62ce3381e39bf40cbcc869f867af1cdadf5c0716daa034494c8c04e74f7359707118aed032633c3c17c839323f466863b517bb2b4081c38e50ffdc0708b9f555de050e0ccc602c4d407e2a62f176b1d011dd067c4e55bbcde396bc3b5ca7b617db34c166f9d8babe6ae5eb4544f207620702151f083dd2661939cc6c98f7708c1ecf0540e805b9db0c7d521cd5f99bd65ba3000c9511a2ddf0ee9128e317f8d819a1134e5792d7371f3da535fca84200afe140';
$redirect_uri = 'https://gecmanow.site';

$out = new IntegrationClass($subdomain, $client_id, $secret_key, $code, $redirect_uri);

var_dump($out);
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