<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def502004014e67ce89b2481811b8b45e807c41eb90ad6171446eee93f596b7520025f280ff1431320faac5f342c2e195019f395cb02ff57cf39ff1020a27d10efe241bb15b12b05f097c052a0557f25f7253700bf4702bb9dc3c6ba2662e7aab0e839a762dee43e8371945a59e068d09f310cec4a44fb435d8e14b6c1ffe2c802f81792d779ab93dda0a6dd8a157c0a1af35c5da7f0d432676ca1d8b66e08587a80e94308257b4fd43b68a557d145588cf4b71e1b2bbe723449b863898f3fa789ac7c41b572658c0b070d848991f90d79000cbff93ab8eff830e02af04b9bd41cc75b91c74dbdf589ae9766626767403bbc0b25779c850da9157a047e67f50e4152ed590d52c7048dbee36a3ca59eaee83ac9ffc83eaeb304b2bc156e62ffeeaab9b67bb93849ee08304381a8a71ec529900737d4804f4fe62a3998b347f8c885cbb2b8fe13f3da6600119bb2c1c113edae3b7e301aa6fbc253933f1d244f8ffaa103737261848c677395704b4e313b25de34e179d729f0a678f627386e6ab323ef8ee6bc315e0b5d09095c31f5878be0f0a9267c0ea9da56855a75242686092653f30555373a5c4da906577e8aa0be2490ee8d31de781a3b344ca5ca1e21';
$redirect_uri = 'https://gecmanow.site';

$out = new IntegrationClass($subdomain, $client_id, $secret_key, $code, $redirect_uri);

var_dump($out->result);
/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */

$response = json_decode($out->result, true);

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