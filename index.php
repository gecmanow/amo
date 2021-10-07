<?php

$subdomain = 'getsmanovchinit'; //Поддомен нужного аккаунта
$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

/** Соберем данные для запроса */
$data = [
    'client_id' => '735ceb3f-60e6-4923-9a37-bd60ee7cab48', // id нашей интеграции
    'client_secret' => 'pTrrKmA2LG3mRqUlvhmLMVI0ugCFlArYZLoBoCu0t5sCY4lfPcolR5JZqQesavsf', // секретный ключ нашей интеграции
    'grant_type' => 'authorization_code',
    'code' => 'def50200fc72dd833cbd4a6752679ed105d8ccc1ccfffd1d35453bb7b72c1885a5e35f96da9e2ad3b9f292372adfc76c694d2db577e244c2fab1b88ace315e62abbaaea04046d6851a4cfe97d15ca26419e8537b2c4873384d673b17d80f9015e4bf96dba353e471b9bfd1aebbc8e69e31da5a679a6fce35f09ccea6343921fd25ea00e3025ee2b8c169522ab0a0388c47ac6e6364d3d90468ba33bbd82f18b845b5bcc7632250e4b4188b8413bf1e6d7dd5c2a34c3398eb78267ee08d0c2b91ef4a84149b14df14a433e5ab878396d2998dc4060722f7b14508c2f016d49ec1b504552fef89a2a121b11b05ef9605151c2f7f6606e845b15ac710051c6cadfc7f50d38c9b9977c48f1614b4618971a9d2e4e3ec9b1aae2eb399ecaa4af253507c159391c237fa604fba6a150621873235f3d16c4cf0473a3e207fef6a45f265a7c118a0aab1c0d9ecb17f17bc66cf2c5d936a63bbd9191c7cc6b7b436879ad2781b66a97151220a3600d9890f60b08ae22a0bfdf4c2b28ea1b6d7f2886874ec664a6b42f6cc5c65ba4af41a315de7cec71581d3af9e36fb39aff3c07c0af0f473fbf1df905fb404af91fc4a7af0ce89fa242f019aaf5f7d17f9a1b55a3266', // код авторизации нашей интеграции
    'redirect_uri' => 'https://gecmanow.site',// домен сайта нашей интеграции
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