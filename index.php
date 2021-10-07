<?php

$subdomain = 'getsmanovchinit'; //Поддомен нужного аккаунта
$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

/** Соберем данные для запроса */
$data = [
    'client_id' => '735ceb3f-60e6-4923-9a37-bd60ee7cab48', // id нашей интеграции
    'client_secret' => 'pTrrKmA2LG3mRqUlvhmLMVI0ugCFlArYZLoBoCu0t5sCY4lfPcolR5JZqQesavsf', // секретный ключ нашей интеграции
    'grant_type' => 'authorization_code',
    'code' => 'def5020074390e646d7b7528dc7832a9aaa0a86b0779abffbaa7b883197893154dedf6650a744146ca229ba95c8600fbeff701f708ec0dae01de3c1462093150027deb3f8d0360cfc21a731a584604691793d452e400b5bcbb8393f21a54340d438935eef792f62c5ef0a6f018006aadc75d06fcbd21cc03445a87e1daddf356273d6bd5b2e4f7d3b1b94d68411eb301347e68b0b73ce892c3f7011a1dad58d043067a50bef25dd04d66b65e4d0671ee15bd88d5cdef2b7c31dc0ab95154b85da31a9a45ec0f68f57ecb6172f58032c73eee1e6b5083f3e0083d2e0cb3f0bf382f499ce6e5922909b6c75a083552b7f3893df97d3509251fc5a59fb8a7f6c383c65900d52e459ee647af676c76f31dedbd328b7ba44ff2ecf881e345d66b337966a320257db2ca1d0a499ad5b53885db8c850ff9ae07245bdb10d95943894b0a5cd7117b76e86ef0c5c603cd718922d51bdfe57f4d4e27546bd325f39755c9a728af1e52ea5d00848d9eee7bf7cffa7ee23566cdc33bb47f057a26bfede693366854c9f1c3df624c0e98c02175d810c6e98ad3d1598df1b393a75d40777f735059fa130956422efdcbd4c26fa461a3c14926846647bd0a91e187bbbccb6c98', // код авторизации нашей интеграции
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