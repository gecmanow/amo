<?php

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def502000316f8bbfeef88a82f0e599430078c8acf5da1db44ec336d0d71e7310b526bffc62517e38c16c2716bd882a6c756391003e56125de8b3e2f0049742a351ad6af9d41a7dc55201a381c93ee7df81d95cf4f7b0112b5c8fcc9a81947e0d35cef5c2aec4c69d2601ee91c03a479d5c9fd251838ed441bb75eb464e24694a27c43e4cb7dfc1f7a8e1a136401d7946b63a36a80660c81e62853f8d319bb3c2585763e03c2fed3e8a3aa6e950338549b815b4d64f36db6d5e83a6d96d9b1efc5e47d2ea024f656d497d2ab2a39f5d72e11ec4ad6d196f28410c60d165b340327737ef3dc9f1cd2ab937cdb4d34c6494079339984e9da3ebe102137d7a83e01623d3c33229e6a31e8a1f8f0e3b4d483177eb7b16ec57f715419e25d30db03ac6497c1c25068986d44481b14187a78f6f66030d2c92806e9a57db863454198360b278ab8ce907e9e5aeb7b4702a09a2d9869e2e862cf84f600e8b7953898fa57914a32c3200a44a6d2a920bceec262e555e5f5e95070b7a59fcc78e0e26eb9d378600ebca9ec55053de7cb0e4b08b2a4578142aec7664cad80ee1518bcfb2005f0585eddb5ddb339c8597b209c7941b4fa722b2556a7b8160f5b57f0517fd2';
$redirect_uri = 'https://gecmanow.site';

new IntegrationClass($subdomain, $client_id, $secret_key, $code, $redirect_uri);

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