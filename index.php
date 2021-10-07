<?php
require_once 'IntegrationClass.php';

use AmoCRM\IntegrationClass;

$subdomain = 'getsmanovchinit';
$client_id = '735ceb3f-60e6-4923-9a37-bd60ee7cab48';
$secret_key = 'Oqlu9Ao8GmnAbT0rpObKOihbafNooF3L4LL4Io7E29D5V117qqsK7xhHm8GvGj21';
$code = 'def50200e88163ab168dd67dd2a5a143a431512622dc2fb6f6798d944d1aacf90447d35ac7a32d4f251eea0a3be875efbddfce1f7aa846b2444413c3871849a89a4b690a237ade8c32c15c89055785fe2465042c55e3514d37f90c5a5b8c0fe665ea87474c52dea9cb041e964411a58b893f353c2c327d5406f1bad1c0c4ccbe000ad63e6241964b810123ed3ac7338be9c93e9150e5fca0b6662a4c7cd454f0ab6faf9faeeb12ae184add219427f0094fe7580208095a8def3452938a86cb15b6ead6b92b5b0d3b5e068445735b96dfd88171fa8dc803ddddc6dffc92bd20ee1e7ff575fbec351bbe83a2ea096d1b44bf005cd0413eb2df47274554badc2e66fc516da8bbb50b78f670e7b839ca7e12ecf55c2758982314d1f96503ecdcb8e924fa91bfde158461563eebfbf02ba41d89b3f1f74adb8679a983b72a47a6f80ebb7e9f1d8d9b2c1775c318a1de86ed5df737ed7779665ab34de0377d54617ab72c1d0a555c4f60dd4605d2db8a794a0416786e2aa81456489e317906c2316bda621d5f3e2741e5c156ae734a19b4d8a002f170bcf491de59ce75e30b2a11bf53fd52c89387a85c861a6087dfb504820d800e6b9769323a0133e9e59c46e07b';
$redirect_uri = 'https://gecmanow.site';

new IntegrationClass($subdomain, $client_id, $secret_key, $code, $redirect_uri);

/**
 * Данные получаем в формате JSON, поэтому, для получения читаемых данных,
 * нам придётся перевести ответ в формат, понятный PHP
 */
var_dump($out);
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