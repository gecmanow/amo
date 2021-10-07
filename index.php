<?php

$subdomain = 'getsmanovchinit'; //Поддомен нужного аккаунта
$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; //Формируем URL для запроса

/** Соберем данные для запроса */
$data = [
    'client_id' => '735ceb3f-60e6-4923-9a37-bd60ee7cab48', // id нашей интеграции
    'client_secret' => 'pTrrKmA2LG3mRqUlvhmLMVI0ugCFlArYZLoBoCu0t5sCY4lfPcolR5JZqQesavsf', // секретный ключ нашей интеграции
    'grant_type' => 'authorization_code',
    'code' => 'def50200477f610768426f8240fcd8f5f791d1c8f567fef1ab94bf53a1b4e5649a5d8ad09f0daeb571a983e3a6fc4f91b4e113e155770db8ce5630edf07529d8343cf8126efebf7c644cac03ad06d80d307b89328ed6214cac94fa7a054cdf79d2ae7ab2204e2ed5493753ca07c2741b114b998add19134ae22175efdfdfe5e5139d8edcb03d73e7ef896960f11766b63522cb4414db43a4baa82c428400a003b211e0d2d67d75c48b64fd75cd2d01635f1539dcd4a0b944c7214877b2f607fbaa38b47f1ef9efc23afbc1b5f738a71c106b492f88c6ca8498cc7b38d6cf334d1875cc7f263e49cf8e24aeeabee0f0c04608028318eda9500281cb151f5b119dc1830b3042882f9f8c6b352cb71d6ee697dc98859f66067c49e0b4c23a51f01764902ce4b106611a13b7775df60961371117c0aa8c39717cfaeaac022a7eb4a1abb33452460f78bd576039c189d478c0eae6316b175703e58c4966408ed017b3396ee55978190462a9079beea056652e941204a197ea3179a573f4d8c0f9347074b105e0c33a5f8ee254aa8ef355f372df5e08d5dea099fc94c7bcdc40e448ba86055f4573040f54b3fffb74716e32d27fcf0bb8e1f4c0e5fd421e2f615d23', // код авторизации нашей интеграции
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