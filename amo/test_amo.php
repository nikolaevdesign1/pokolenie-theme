<?php
$subdomain     = 'mainpokolenie'; // поддомен AmoCRM
$client_secret = 'OMGPBNULXulKMppsBmnG6ISUq3VM5Z78aV4vO0WeEnAClnDP61LteoGa5QY6x6CS'; // Секретный ключ
$client_id     = 'c4792d03-91e7-4399-b946-46d5de665812'; // ID интеграции
$code          = 'def502004a350bb59e4ef26fdb2456d25750b5704f251da28c570de86b422066c09f0708edecf1024ef2afaf21efb11f78859e0284fe4a5d6680ffb949ab2263c5fe6a5be04a55dd59d1fdb123317095878ae0fab3b42352a3eb50e6c974d53e1e026e0a78ebd9b91e6c1c3c277906a2e727f191236899a795e8734df3815ede8c1f28310b6175dcfb82fbff09ce1a25db17f7b1c967a1f4a4cea914ee23cb689a45e2dc48e4fafd2ebaaeb5a1b4e75ea7c3182c8f305228c821a65ba017a77d98c840ff8b918e1ee6f8d8e7ebc326552f296e7f1469fa079966040c031b3fc743521b34504cc837774185055e6c441e9a5961ee468f1448dcd5ed25b7ea6564099e20964c06634be8b559662b7847d9e9842a36a4d305741c807df0b0061aa9f29d32a73295deed278cc77a2b187f8ac0df35994f65e5364e85858d035593cdae8351387ed214c561f194e6313bac8f547593ac9922f61bfee13ba0322a7f7eb00f687a16ce801b4b7e03d61ddb315bf92613a0509533f09ef4b610fcb37d81c32532adc4d680e0cbc45bedbb488e83e5d255647e088e6f37cb259ea073f0e105af5570c3cc5e48fb3edc749f1bc06f10fbcf5fae530774f486bbe2c3bcf1d679b1057eeb244e61b5608369ea6a2f58fcc7a68a2b4ff9e4fc2f83076f451b0371f585335248597beebf3f133b7166'; // Код авторизации
$token_file    = $_SERVER['DOCUMENT_ROOT'].'/amo/tokens_%^RD%$E.txt';
$redirect_uri  = 'https://pokolenie.info/thanks';

$link = "https://$subdomain.amocrm.ru/oauth2/access_token";

$data = [
  'client_id'     => $client_id,
  'client_secret' => $client_secret,
  'grant_type'    => 'authorization_code',
  'code'          => $code,
  'redirect_uri'  => $redirect_uri,
];

$curl = curl_init();
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
$code = (int)$code;

$errors = [
	301 => 'Moved permanently.',
  400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
  401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
  403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
  404 => 'Not found.',
  500 => 'Internal server error.',
  502 => 'Bad gateway.',
  503 => 'Service unavailable.'
];

if ($code < 200 || $code > 204) die( "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error') );


$response = json_decode($out, true);

$arrParamsAmo = [
	"access_token"  => $response['access_token'],
	"refresh_token" => $response['refresh_token'],
	"token_type"    => $response['token_type'],
	"expires_in"    => $response['expires_in'],
	"endTokenTime"  => $response['expires_in'] + time(),
];

$arrParamsAmo = json_encode($arrParamsAmo);

$f = fopen($token_file, 'w');
fwrite($f, $arrParamsAmo);
fclose($f);

print_r($arrParamsAmo);