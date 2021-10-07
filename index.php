<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def50200fb85ceed40055ea5a3372e4a4f8db00f1c5239ce847075b22a0bf0b76cd561a796d4c007f2ef3885f7891112806b84c3af15e7804e87efbafa030c23b9fe34541ef6de85bb3999c30daada793fc1f4c539b318c46f95e6a923f79b8bb41b9260b2d36aa73bed1956ec1955330c79cda832f45fdb48dbbac24780a3c64d9d711d31901ad70e6b5b76234466c6323c9bda1bfc81487b253df74528a3b8d7d02e8fbeb4297b351830bf814d1c0e3e4d513b73ccbfdda314ce826806f160ec7d91763745ff70cf439bb06683d6cbb477f761a14b57bf9e8ba09c4304de3c1f8c05bc9c1820cda3ec79c93b530149a9fd8ac96a8bb48d806a50e769f840b168cb3287f6657851ab07069bbc652ebbea6eb7f49003dab584e029e88c60a11f4152e14edb8e28fb126c5b5f4210d4b30e85b9f417d7b7e9778ae416195cf6f6711c862442f8e9ab2f81e43dd7f74d155ffb6666dc7988e237e994184a9060fe3ad66c275d782a6453d9f19f90ab2acb87a98e5f08f696a13e8b400e0176bbba7c07269cba1a83e6668f39418b86f6a388a543975b826c24b5fe30a96f6e12efa77863ab5dd745ea123744b6319db6de43dca4193d50fc6a3c536957a4c4c1';
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