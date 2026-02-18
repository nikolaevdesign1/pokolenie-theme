<?
require_once $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';

$request_body = file_get_contents('php://input');
$request_post = $_POST;

//file_put_contents(__DIR__ . '/amo_hook.log', date('Y-m-d H:i:s') . ' - php - '. $request_body . "\r\n", FILE_APPEND);
file_put_contents(__DIR__ . '/amo_hook.log', date('Y-m-d H:i:s') . ' - post - '. json_encode($request_post) . "\r\n", FILE_APPEND);