<?
require_once $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';

$request_body = file_get_contents('php://input');
$request_post = $_POST;

//file_put_contents(__DIR__ . '/amo_hook.log', date('Y-m-d H:i:s') . ' - php - '. $request_body . "\r\n", FILE_APPEND);
file_put_contents(__DIR__ . '/amo_hook_good.log', date('Y-m-d H:i:s') . ' - post - '. json_encode($request_post) . "\r\n", FILE_APPEND);

if($request_post['leads']['status'][0]['id']){
    $users = get_users(
        [
            //'date_query' => array('after' => '2 days ago'),
            'orderby' => 'registered',
            'order' => 'DESC',
            'meta_query' => [[
                'key' => 'amo_id',
                'value' => $request_post['leads']['status'][0]['id']
            ]],
        ]
    );
    if($users){
        foreach($users as $user) {
            $newStatus = 'approve';
            update_field('status', $newStatus, 'user_'.$user->ID);
        }
    }
}
/*f($request_post['leads']['status']['status_id'] && $request_post['leads']['status']['id']){
    $users = get_users(
        [
            //'date_query' => array('after' => '2 days ago'),
            'orderby' => 'registered',
            'order' => 'DESC',
            'meta_query' => [[
                'key' => 'amo_id',
                'value' => $request_post['leads']['status']['id']
            ]],
        ]
    );
    if($users){
        foreach($users as $user) {
            $userData = GetUserData($user->ID);
            $newStatus = 'proccessed';
            if($request_post['leads']['status']['status_id'] && $request_post['leads']['status']['status_id'] == 142) {
                $newStatus = 'approve';
            }
            if($request_post['leads']['status']['status_id'] && $request_post['leads']['status']['status_id'] == 143) {
                $newStatus = 'cancel';
            }
            update_field('status', $newStatus, 'user_'.$user->ID);
        }
    }
}*/