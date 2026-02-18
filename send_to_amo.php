<?
//require_once $_SERVER['DOCUMENT_ROOT'].'/wp-load.php';

if(!is_user_logged_in()) exit();

if(!haveAccessEditData()) exit();

$userData = GetUserData();
$allFields = GetCustomUserFields();
//dump($allFields);

$result = [];

foreach($_POST as $key => $value) {
	if(is_array($value)) {
		foreach($value as $keyValue => $mValue) {
			$post[$key][$keyValue] = $mValue;
			$post[$key][$keyValue] = stripslashes($post[$key][$keyValue]);
			$post[$key][$keyValue] = htmlspecialchars($post[$key][$keyValue]);
			$post[$key][$keyValue] = trim($post[$key][$keyValue]);
		}
	} else {
		$post[$key] = $value;
		$post[$key] = stripslashes($post[$key]);
		$post[$key] = htmlspecialchars($post[$key]);
		$post[$key] = trim($post[$key]);
	}
	
}

$allowFields = [
	'guardian' => ['телефон', 'email', 'дата_рождения', 'name'],
	'user' => ['телефон', 'email', 'ник_в_телеграм', 'ссылка_на_вк', 'name', 'паспорт', 'child_doc', 'дата_рождения', 'age', 'город_проживания'],
	'data' => ['вопрос_1', 'город_проживания', 'found', 'found_name', 'вопрос_1', 'вопрос_2', 'вопрос_3', 'вопрос_4', 'вопрос_5', 'вопрос_6', 'вопрос_7', 'вопрос_8', 'вопрос_9', 'вопрос_10', 'вопрос_11', 'вопрос_12', 'вопрос_13', 'вопрос_14', 'вопрос_15']
];

$requiredFields = [
	'user' => ['телефон', 'email', 'ник_в_телеграм', 'ссылка_на_вк', 'дата_рождения', 'паспорт', 'name', 'город_проживания'],
	'data' => ['вопрос_1', 'город_проживания', 'found', 'вопрос_1', 'вопрос_2', 'вопрос_3', 'вопрос_4', 'вопрос_5', 'вопрос_6', 'вопрос_7', 'вопрос_8', 'вопрос_9', 'вопрос_10', 'вопрос_11', 'вопрос_12', 'вопрос_13', 'вопрос_14', 'вопрос_15']
];

if($userData['main']['is_old'] == 'no') {
	$requiredFields['guardian'] = ['телефон', 'email'];
}

$arrayToUpdate = [];

$notesModifiedFields = "";

//dump($post);

$errors = [];
foreach($post as $mainKey => $values) {
	foreach($values as $key => $value) {
		if(!in_array($key, $allowFields[$mainKey])) continue;
        
        if($userData[$mainKey][$key] != $value && $userData['main']['amo_id']){
            $itemLabel = $key;
            foreach($allFields[$mainKey]['sub_fields'] as $field) {
                if($field['name'] == $key) {
                    $itemLabel = $field['label'];
                }
            }
            $notesModifiedFields .= "Изменено поле (".$itemLabel.") \nСтарое значение: ".$userData[$mainKey][$key]." \nНовое значение: ".$value."\n\n____________________________\n\n";
        }
        
		$arrayToUpdate[$mainKey][$key] = $value;
		if(in_array($key, $requiredFields[$mainKey]) && empty($value)) {
			$errors[] = 'Не заполнено поле '.$key;
		}
	}
}

if($post['user']['дата_рождения']){
    $arrayToUpdate['user']['age'] = get_age($post['user']['дата_рождения']);
}

$sendAMO = false;
if($userData['data']['вопрос_1'] != $post['data']['вопрос_1']){
    $sendAMO = true;
}

//echo '<pre>'; print_r($userData['data']['formentor']); echo '</pre>';
//echo '<pre>'; print_r($post['data']['formentor']); echo '</pre>';

//dump($arrayToUpdate);
//dump($errors);

if(empty($errors)) {
	foreach($arrayToUpdate as $key => $values) {
		update_field($key, $values, 'user_'.get_current_user_id());
	}
	$result = [
		'status' => true,
	];
} else {
	$result = [
		'status' => false,
		'errors' => $errors
	];
}


if($userData['main']['amo_id'] && !$sendAMO && $notesModifiedFields){
    $AmoEA = new AmoClassEA();
    
    $clearedPhone = preg_replace('/[^0-9]/', '', $userData['user']['телефон']);
    
    $AmoParams = [
        'amo_id' => $userData['main']['amo_id'],
        'телефон' => $clearedPhone,
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
                        'value' => trim($userData['user']['ник_в_телеграм'])
                    ]
                ]
            ],
            [
                'field_id' => 536525,
                'values' => [
                    [
                        'value' => trim($userData['user']['ссылка_на_вк'])
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
                        'value' => trim($userData['data']['вопрос_1'])
                    ]
                ]
            ],
            [
                'field_id' => 495263,
                'values' => [
                    [
                        'value' => trim($userData['user']['дата_рождения'])
                    ]
                ]
            ],
            [
                'field_id' => 528891, // возраст
                'values' => [
                    [
                        'value' => get_age($userData['user']['дата_рождения'])
                    ]
                ]
            ],
            [
                'field_id' => 528903, // Город проживания
                'values' => [
                    [
                        'value' => trim($userData['user']['город_проживания'])
                    ]
                ]
            ],
            [
                'field_id' => 495265,
                'values' => [
                    [
                        'value' => trim($userData['data']['город_проживания'])
                    ]
                ]
            ],
            [
                'field_id' => 531033,
                'values' => [
                    [
                        'value' => trim($userData['data']['found'])
                    ]
                ]
            ],
            [
                'field_id' => 531035,
                'values' => [
                    [
                        'value' => trim($userData['data']['found_name'])
                    ]
                ]
            ],
        ],
        'note' => $notesModifiedFields
    ];
    
    $leadAdd = $AmoEA->EditedContact($AmoParams);
    
    $editedLead = $AmoEA->EditedLead([[
        'id'=>(int)$userData['main']['amo_id'],
        'status_id'=>(int)'75253982',
        'pipeline_id' => (int)'9395722',
        'tags_to_add'=>[['name'=>'Пользователь отредактировал данные']],
    ]]);
    
    //dump($leadAdd);
    //dump($editedLead);
}


// выполняем действия после полного заполнения анкеты
if($post['step'] == 2 && $result['status']) {

	update_field('status', 'proccessed', 'user_'.get_current_user_id());
    

	//dump($userData);

	// отправляем в Амо
	$userData = GetUserData();
	if(!$userData['main']['amo_id'] || $sendAMO) {
		$AmoEA = new AmoClassEA();

		$noteToAmo = "ФИО: ".$userData['main']['name']."\nЕсть 18 лет: ".(($userData['main']['is_old'] == 'yes') ? 'Да' : 'Нет')."\n\n";
		foreach($userData as $k => $items) {
			if($k == 'main') continue;
			if($k == 'guardian' && !$userData['guardian']['телефон']) continue;
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
        
        if($userData['main']['amo_id']){
            $noteToAmo .= "Предыдущая заявка:\nhttps://mainpokolenie.amocrm.ru/leads/detail/".$userData['main']['amo_id']."\n\n";
            $noteToAmo .= "____________________________\n\n";
        }
		
		$clearedPhone = preg_replace('/[^0-9]/', '', $userData['user']['телефон']);

		$AmoParams = array(
			'responsible_user_id' => '11857690',
			'leads' => array(
				'title' => 'Новый лид с сайта',
				'pipeline_id' => '9395722',
				'status_id' => '75253982',
				//'custom_fields_values' => [],
				'tags' => [
					['name' => trim($userData['data']['вопрос_1'])],
					['name' => trim($userData['data']['город_проживания'])]
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
								'value' => trim($userData['user']['ник_в_телеграм'])
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
								'value' => trim($userData['data']['вопрос_1'])
							]
						]
					],
					[
						'field_id' => 495263,
						'values' => [
							[
								'value' => trim($userData['user']['дата_рождения'])
							]
						]
					],
                    [
						'field_id' => 528891, // возраст
						'values' => [
							[
								'value' => get_age($userData['user']['дата_рождения'])
							]
						]
					],
                    [
						'field_id' => 528903, // Город проживания
						'values' => [
							[
								'value' => trim($userData['user']['город_проживания'])
							]
						]
					],
					[
						'field_id' => 495265,
						'values' => [
							[
								'value' => trim($userData['data']['город_проживания'])
							]
						]
					],
					[
						'field_id' => 531033,
						'values' => [
							[
								'value' => trim($userData['data']['found'])
							]
						]
					],
					[
						'field_id' => 531035,
						'values' => [
							[
								'value' => trim($userData['data']['found_name'])
							]
						]
					],
				],
				/*'_embedded' => [
					'tags' => [
						[
							'name' => trim($userData['data']['formentor']),
						],
						[
							'name' => trim($userData['data']['city']),
						]
					]
				]*/
			),
			'телефон' => $clearedPhone,
			'note' => $noteToAmo
		);
        
        if($userData['main']['amo_id']){
            $AmoParams['contacts']['custom_fields_values'][] = [
                'field_id' => 529631,
                'values' => [
                    [
                        'value' => 'https://mainpokolenie.amocrm.ru/leads/detail/'.$userData['main']['amo_id'],
                    ]
                ]
            ];
        }

		$leadAdd = $AmoEA->AddLead($AmoParams);
		//dump($leadAdd);

		if($leadAdd[0]->id) {
			update_field('amo_id', $leadAdd[0]->id, 'user_'.get_current_user_id());
		}
	}

}

echo json_encode($result);