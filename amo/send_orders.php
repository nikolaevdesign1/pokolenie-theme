<?
require_once $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';

if($_GET['key'] != 'sdffgfdg') exit();

$AmoEA = new AmoClassEA();


$users = get_users(
    [
        'date_query' => array('after' => '2 days ago'),
        'orderby' => 'registered',
        'order' => 'DESC',
    ]
);
    $count = 0;
foreach($users as $user) {
    
    $userData = GetUserData($user->ID);
    $userAmoID = false;
    if($userData['main']['amo_id']) {
        $userAmoID = $userData['main']['amo_id'];
    }
    if(isset($userData['data']['formentor']) && !$userAmoID && $count < 5){
        echo $user->ID.' : '.$userData['data']['formentor'].'<br>';

		/*$noteToAmo = "ФИО: ".$userData['main']['name']."\nЕсть 18 лет: ".(($userData['main']['is_old'] == 'yes') ? 'Да' : 'Нет')."\n\n";
		foreach($userData as $k => $items) {
			if($k == 'main') continue;
			if($k == 'guardian' && !$userData['guardian']['phone']) continue;
			if($k == 'guardian') {
				$noteToAmo .= "ОПЕКУН:\n\n";
			}
			if($k == 'user') {
				$noteToAmo .= "УЧЕНИК:\n\n";
			}
			if($k == 'data') {
				$noteToAmo .= "АНКЕТА:\n\n";
			}
			foreach($items as $itemKey => $itemValue) {
				$itemLabel = $itemKey;
				if($allFields[$k]) {
					foreach($allFields[$k]['sub_fields'] as $field) {
						if($field['name'] == $itemKey) {
							$itemLabel = $field['label'];
						}
					}
				}
				$noteToAmo .= $itemLabel.":\n".$itemValue."\n\n";
			}
			$noteToAmo .= "____________________________\n\n";
		}
		
		$clearedPhone = preg_replace('/[^0-9]/', '', $userData['user']['phone']);

		$AmoParams = array(
			'responsible_user_id' => '11857690',
			'leads' => array(
				'title' => 'Новый лид с сайта',
				'pipeline_id' => '9395722',
				'status_id' => '75253982',
				//'custom_fields_values' => [],
				'tags' => [
					['name' => trim($userData['data']['formentor'])],
					['name' => trim($userData['data']['city'])]
				]
			),
			'contacts' => array(
				'first_name' => trim($userData['user']['name']),
				'custom_fields_values' => [
					[
						'field_id' => 173425,
						'values' => [
							[
								'value' => $clearedPhone
							]
						]
					],
					[
						'field_id' => 173427,
						'values' => [
							[
								'value' => trim($userData['user']['email'])
							]
						]
					],
					[
						'field_id' => 495267,
						'values' => [
							[
								'value' => trim($userData['user']['telegram'])
							]
						]
					],
					[
						'field_id' => 495259,
						'values' => [
							[
								'value' => trim($userData['user']['name'])
							]
						]
					],
					[
						'field_id' => 495257,
						'values' => [
							[
								'value' => trim($userData['data']['formentor'])
							]
						]
					],
					[
						'field_id' => 495263,
						'values' => [
							[
								'value' => trim($userData['user']['birthday'])
							]
						]
					],
                    [
						'field_id' => 528891, // возраст
						'values' => [
							[
								'value' => get_age($userData['user']['birthday'])
							]
						]
					],
                    [
						'field_id' => 528903, // Город проживания
						'values' => [
							[
								'value' => trim($userData['user']['city'])
							]
						]
					],
					[
						'field_id' => 495265,
						'values' => [
							[
								'value' => trim($userData['data']['city'])
							]
						]
					],
				],
			),
			'phone' => $clearedPhone,
			'note' => $noteToAmo
		);

		$leadAdd = $AmoEA->AddLead($AmoParams);
		//dump($leadAdd);

		if($leadAdd[0]->id) {
			update_field('amo_id', $leadAdd[0]->id, 'user_'.$user->ID);
		}*/
        
        $count++;
    }
}
echo $count;