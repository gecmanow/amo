<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def502006ec25266962b7d62dd713f4a38da6c9066cdfb1930af490075e6f3434a09f2e9981cc2ae7c6419bc79f215ed8da385c324245934bb0795b36aba45d1194dd7a149c59e440dd40b58be5800eddb7f9bfc072f24159520aef04fa1d30e9af7841d4ab9edc693fdf62accb2c8913ad2f1c7df8b29dff061abccf8188ca7eebb0eb45b85fd49b36fb5f28e54030f2537ee2cdfd2e1ac93d49add451ec01c6c1e2f1a450a0cace3faff70bd3b1c497e194a78650c676f2d749b4b18836efe095dc4616259cd86233c48697977447b4c5700cd4a5f162cffa49a8dd5d57ad781e1f01dd27ea7ec44aadfe8578adbe7d118ebc404aba2f656688d0934db405b774f8d350f70d217af86f01c45b3666e361dc1bd40c2fc3a1d017b27a67efcb9aaf420ed81530f9573d3a35c2cc628a57e8ddcd89a80b6f05335811ad0bfe71395b911177ea25f155ceee5d189eccd7b7c834dd6119e532f879badc2c6741f41a12c12a71eaddb4793e72f7c310936dcec7f74936c3c0f6c12da00810a480b8c66b1a775ae3fb63e0cd7a80236d040b3d1ef5dccdd12cf86633ce52269c3ef0859d4ba8074ef0fa0ed87293a46c57bdf27507e0cd1146ad1c1451b7ee87963';
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