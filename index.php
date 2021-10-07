<?php

$subdomain = 'test'; //Поддомен нужного аккаунта
$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

/** Соберем данные для запроса */
$data = [
    'client_id' => '735ceb3f-60e6-4923-9a37-bd60ee7cab48', // id нашей интеграции
    'client_secret' => 'pTrrKmA2LG3mRqUlvhmLMVI0ugCFlArYZLoBoCu0t5sCY4lfPcolR5JZqQesavsf', // секретный ключ нашей интеграции
    'grant_type' => 'authorization_code',
    'code' => 'def50200cef3f0b16e39cb2d7504e3f2ffda5ecfb2e7349dbc13d33065992169dc68c4b7491d11b6adae3bc9cfc5f4bb75127431a6a9d09e42e934e39ab22681a499f16df0884e295564f306e20cd803502cea999bbd5dca60e637dbfdb1ecd8ed9025dd721bd32d7d93d7b1a0bbd5cec7a41d2d48c97ec9540bfa5ae976bd40289999a9122b1748e175dc364a7bdc07052a5c5b6654004707189a182159285ba42c9f4325aa94bd747dc962598a6227d9726efe49ab2fbf316b2df78a212975fc093f9d4a1a2ffcf8be9bdfb6e0a55c51f250d30af7e8a6fc3bf3767870b14a0167babb5bf0068e6470254b0d4a5b25c714ef3d0b63201cb16d651092be960f86ed94d86283db06cd8964a4d24e6ae29224f22a265130c2b195d0750895477fd6ca7dd8851ab09736c45494dd6c4568eca299e84ec684c1a1d18291e198628c5106f9da98a7f7ad1ae8b5d0b2dd3cb324ca7c9073118ef5aea45d394a076f826b48be973b5f57e5fd94ef711c1a2669897c68368a89eafd74026ed4712439b69eebd64adca72aaa098053cc012d07d5a57f255ede2382c772d66b83535f41afde726cb5d41f62a4299e728da4d55f26df1279ff8971ff4605ca776a66d0a9', // код авторизации нашей интеграции
    'redirect_uri' => 'https://getsmanovchinit.amocrm.ru',// домен сайта нашей интеграции
];

/**
 * Нам необходимо инициировать запрос к серверу.
 * Воспользуемся библиотекой cURL (поставляется в составе PHP).
 * Вы также можете использовать и кроссплатформенную программу cURL, если вы не программируете на PHP.
 */

$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
/** Устанавливаем необходимые опции для сеанса cURL  */
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
/** Теперь мы можем обработать ответ, полученный от сервера. Это пример. Вы можете обработать данные своим способом. */
$code = (int)$code;

// коды возможных ошибок
$errors = [
    400 => 'Bad request',
    401 => 'Unauthorized',
    403 => 'Forbidden',
    404 => 'Not found',
    500 => 'Internal server error',
    502 => 'Bad gateway',
    503 => 'Service unavailable',
];

try
{
    /** Если код ответа не успешный - возвращаем сообщение об ошибке  */
    if ($code < 200 || $code > 204) {
        throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
    }
}
catch(\Exception $e)
{
    die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
}

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