<?
/*
Created by Evgeny Anenko
*/

class AmoClassEA {

	protected $subdomain;
	protected $client_secret;
	protected $client_id;
	protected $code;
	protected $token_file;
	protected $redirect_uri;
	protected $access_token;


	## СТРОИМ ИЗНАЧАЛЬНЫЙ ЗАПРОС КЛАССА ##
	public function __construct() {

		$this->subdomain = 'mainpokolenie.amocrm.ru';
		//$this->client_secret = '0yId7w6WKjzKjDpdIwqUlpiGFh4P1UmSih4Qzp6NQ2pbIsCLlUBeY6G2S42HR5GV';
		$this->client_secret = 'OMGPBNULXulKMppsBmnG6ISUq3VM5Z78aV4vO0WeEnAClnDP61LteoGa5QY6x6CS';
		//$this->client_id = 'f9d0a514-f441-c4792d03-91e7-4399-b946-46d5de665812-8709-316dcc33b0b2';
        $this->client_id = 'c4792d03-91e7-4399-b946-46d5de665812';
		//$this->code = 'def50200b09a7e75fd13746267fd4e0cea9313c649814014f5cf1bb22a5992035ece78520fb59e59ac05a61212ca1a510c0fad730dd4ed75b934b674e96fc7360f89b117abc3a0218ec0aea98099326a63a5a1800d26ae26f45f760903f7bbfe9d0ca59851090861e5159afdac96c1f0a887bad05336cd41b88bd754739083d601a87c88349dfaa866602b7d67d0eca4150e3d447e458c62f705ff008b9a7cead911a7701968ae0a10cff719f7aa6590d84177109a4c0fb6805a3b866f28e06327981f1af3ab50856a5117a41e9b085d5c64fdacd1720c90a1175e8bfc60b94e02544f0454cd34620b9524f53b0797f4026b7d8ab29029b5fd36af6be87a8c76082899f0bcf852a221e8fb6858c63f563daf25d444c6d0cae5f9678258744f46aba445943ede50c67862f216bd55d2451a76048d82826c3ba670773d06aae3f1a32a31a729bd8856faafd3b7de9cdc4816e9cf6245f36bd18177c406660d38830c7eba1823dbd3ff97e9e5f49d2cfd2786f960e7e5ffeb29cc81b616c038916f5abbff17e612618d371657cbfba60d29f61c576e4e909f3d9b023a89fdd33a3e24a16cc3d73255aefe0a3cd6cdce85340b0c1b8fb27420d9bdf3ebd16934444403022e984cc9cd0e3faf317bcd4bbac1669ece27293a87824899e50c48ab31f2284400c1410b4eda8a660d6d5b416a';
		$this->code = 'def50200626e847b36ceae1a67e911965508ce429385f7773bb98c2443f076ea441559ee86c056d944aa620cc8ff260c0ede938a27411b117eeb9d2ff51ccf64b53834a01646738253d358a5bbfd026c3e230e1dcc241c0b13da3cda16a9687251efa1bafac899481eca3309d0b1c22144724e13339d386f45e968210e68e2676b2cf605dda669138c96ae80451c1a601c5c783f8fc9de03d781604f8e8a3680d5d7217a070e717a00e658ebb6bbd281a1461998c611f993c872cc3e1bf795b206424d9b096483e9e3a4d02de8dcb870576735318ef96838b04beea1113807ca28e3e8bc694fc7558c34a4b5e95a03fb701246bc3885f281e979941b85253aa0725a85bc28a371eda7974c3248af4748e3b4dfbba940aae12ef8ef0f793ec436f61c8f936f974e926430394fc2d825e021c34b086f5994eafed64530af5c135658bf7faea6ba44a9437ca16898412c06163be2eb8bfe5afcd9557e9f388f9f36f9b1bad80b22b413c576fa17be10b0f360c5ecad8ec1622c04b8be28c01e597daa0e4942e2bcc0a040e76cb9e666ebe3f8287f6f5afa47dc763b1668e496b693359555d1dd5e99fdbdfe301cd8c3ff5909ac86dce1dfaf1ca6079ad5e1fa159c094ffee6672dd4d9c1e7738ec093e4142c37914a4b4caee7a94a3bfcebf8db902627c4e3bc9c44b43c3eaf276ac895';
        $this->token_file = $_SERVER['DOCUMENT_ROOT'].'/amo/tokens_%^RD%$E.txt';
		$this->redirect_uri = 'https://pokolenie.info/thanks';

		//$this->RefreshToken();

		/*$fileData = json_decode(file_get_contents($this->token_file));
		$this->access_token = $fileData->access_token;*/

		//$this->access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQ1OTFmNjE5YjRiNWZlNGZiZWVjMGRkNmYwZDQyNWQzZjllZmRiNGRkMGQzZTc2NDllZWIyY2ZiNzUxNzNmMjE0NjA0MjQ0ZTJjMmVhNTU3In0.eyJhdWQiOiJjNDc5MmQwMy05MWU3LTQzOTktYjk0Ni00NmQ1ZGU2NjU4MTIiLCJqdGkiOiI0NTkxZjYxOWI0YjVmZTRmYmVlYzBkZDZmMGQ0MjVkM2Y5ZWZkYjRkZDBkM2U3NjQ5ZWViMmNmYjc1MTczZjIxNDYwNDI0NGUyYzJlYTU1NyIsImlhdCI6MTc0MzA3OTU2MiwibmJmIjoxNzQzMDc5NTYyLCJleHAiOjE4Mjc5NjQ4MDAsInN1YiI6IjExODU3NjkwIiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMyMTAzMzYyLCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJjcm0iLCJmaWxlcyIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiLCJwdXNoX25vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiNWY2ZDlkODQtNTI5Ni00ZTIxLWFiNDMtYWE3OGQ0ZDliM2E5IiwiYXBpX2RvbWFpbiI6ImFwaS1iLmFtb2NybS5ydSJ9.d81D-NG2XO42SSUXPZxC8amvUOAV5IoZGAmZ6LQVk_UWFgt9BJ_trcQswxorMmtUtadOIQ8fJ7lb2_9rrr8wbT0UZzG9ktkeDPg_Y7cQDd9fzHdxSO8Uq-ArOLv9K64zErUktbFxeCIuFUD25IRiyqGaV6mfXkkzKCX-SOLZMuPLv92S2Ys2i_V82r_13Py0d7FL_i9Nd43lzyco1aDsp0CovtM0dJTOWpBSytdPBmF_bof_bXtkpRUGmxlFUJeB3gXJBeRiMzMx6PGe0WQxmq1JRXtXDn4rseSh43MMSifTZv1JG0vrGOEAdq22JuWsX23GKwq566EeaHqzeUgBwA';
        $this->access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM4ZWFkNmJjYWNjMzc0YWMxMmI0M2Q4NTkwYjM3YzA0ZTgzNjlkMDNkNzRjNGMyN2FkMmY5MGRjZmMyMGQwMTlmY2UxNTRlYzZjNDA1YmI1In0.eyJhdWQiOiJjNDc5MmQwMy05MWU3LTQzOTktYjk0Ni00NmQ1ZGU2NjU4MTIiLCJqdGkiOiIzOGVhZDZiY2FjYzM3NGFjMTJiNDNkODU5MGIzN2MwNGU4MzY5ZDAzZDc0YzRjMjdhZDJmOTBkY2ZjMjBkMDE5ZmNlMTU0ZWM2YzQwNWJiNSIsImlhdCI6MTc0NzMzMDcxNywibmJmIjoxNzQ3MzMwNzE3LCJleHAiOjE5MDQ5NDcyMDAsInN1YiI6IjExODU3NjkwIiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMyMTAzMzYyLCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJjcm0iLCJmaWxlcyIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiLCJwdXNoX25vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiMTJmNDdlYTEtNTE2OC00NzE5LWE1OTctZGI4YjdiMDA3ZDUzIiwiYXBpX2RvbWFpbiI6ImFwaS1iLmFtb2NybS5ydSJ9.UoodVxak4PXjdcUC89xEXocGBABtBa2UILwW70wEVMzfB-8OdXmET52TtRD3MJ-LiShnhIl5UtImKWvdRqblyYZU3scSwuhDXaYCUmn9MaBpzFdGj2vBJi8KOLyNm-8rqV_hxCSBhmmzkGaRPDdpMmmHNlEaRrRMaHZh5tWHghquKHXvbepypApGb-hej2v3erwxjyzMkKIGgEFnopt5MIjrSbYWoK_WzAUsMp5c7ANj_4XbwMns9TwcyaWCehXa5siT1MbANgc7XClvA_E7iEeLvIfKuHYpVkH2pcnhBZVZCHvNEg9L5F9sCSgpjsKG8gHnuc4_5_yrzAv--Zfy3g';
        
	}


	## фУНКЦИЯ ОТПРАВКИ CURL AMO ##
	public function CurlAction($link, $data = [], $headers = [], $method = 'POST') {

		if($method == 'GET') {
			$link .= '?'.http_build_query($data);
		}

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
		curl_setopt($curl, CURLOPT_URL, 'https://'.$this->subdomain.$link);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

		if(!empty($data) && $method == 'POST'|| !empty($data) && $method == 'PATCH') {
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		}

		if(!empty($headers)) {
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		}

		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_COOKIEFILE, $_SERVER['DOCUMENT_ROOT'].'/amo/cookie.txt');
		curl_setopt($curl, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT'].'/amo/cookie.txt');
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		$out = curl_exec($curl);

		$curl = curl_init();
        
        //echo '<pre>'; print_r($out); echo '</pre>';

		return json_decode($out);

	}


	## ПОЛУЧАЕМ ТОКЕН И ЗАПИСЫВАЕМ ЕГО В ФАЙЛ ##
	public function GetToken() {

		$auth = $this->CurlAction(
			'/oauth2/access_token',
			[
				'client_id' => $this->client_id,
				'client_secret' => $this->client_secret,
				'grant_type' => 'authorization_code',
				'code' => $this->code,
				'redirect_uri' => $this->redirect_uri,
			],
			[
				'Content-Type: application/json'
			]
		);

		$auth->expires_time = $auth->expires_in + time();

		file_put_contents($this->token_file, json_encode($auth));

	}


	## ОБНОВЛЕНИЕ ТОКЕНА ##
	public function RefreshToken() {

		$fileData = json_decode(file_get_contents($this->token_file));

		$this->access_token = $fileData->access_token;

		if ($fileData->expires_time - 60 < time()) {

			$refresh = $this->CurlAction(
				'/oauth2/access_token',
				[
					'client_id' => $this->client_id,
					'client_secret' => $this->client_secret,
					'grant_type' => 'refresh_token',
					'refresh_token' => $fileData->refresh_token,
					'redirect_uri' => $this->redirect_uri,
				],
				[
					'Content-Type: application/json'
				]
			);

			$refresh->expires_time = $refresh->expires_in + time();

			file_put_contents($this->token_file, json_encode($refresh));

			$this->access_token = $refresh->access_token;

		}

	}


	## ДОБАВЛЯЕМ КОМПЛЕКСНО СДЕЛКУ И КОНТАКТ ##
	public function AddLead($params) {

		$phone = $params['phone'];

		// проверяем существование контакта
		$contactID = 0;

		if(mb_substr($phone, 0, 1) == '8' || mb_substr($phone, 0, 1) == '7') {
			$phoneClear = mb_substr($phone, 1);
		}
		if(mb_substr($phone, 0, 2) == '+8' || mb_substr($phone, 0, 2) == '+7') {
			$phoneClear = mb_substr($phone, 2);
		}

		$searchPhones = [
			'+7'.$phoneClear,
			'+8'.$phoneClear,
			'7'.$phoneClear,
			'8'.$phoneClear,
			$phoneClear
		];
		//$searchPhones = ['79900004978'];

		foreach($searchPhones as $phone) {
			$checkContacts = $this->CurlAction(
				'/api/v4/contacts',
				[
					'query' => $phone
				],
				[
					'Content-Type: application/json',
					'Authorization: Bearer '.$this->access_token,
				],
				'GET'
			);
			if(!empty($checkContacts)) {
				$contactID = $checkContacts->_embedded->contacts[0]->id;
			}
		}

		$contactsArray = [];

		if($contactID == 0) {

			$contactsArray = $params['contacts'];

		} else {

			$contactsArray = [
				'id' => $contactID
			];

		}

		$complexName = $params['leads']['title'];

		$complexArray = [
			0 => [
				'name' => $complexName,
				'pipeline_id' => (int)$params['leads']['pipeline_id'],
				'status_id' => (int)$params['leads']['status_id'],
				'responsible_user_id' => (int)$params['responsible_user_id'],
				//'custom_fields_values' => $params['leads']['custom_fields_values'],
				'_embedded' => [
					'contacts' => [
						$contactsArray
					],
					'tags' => $params['leads']['tags']
				],
			],
		];

		if($params['leads']['custom_fields_values']) {
			$complexArray[0]['custom_fields_values'] = $params['leads']['custom_fields_values'];
		}

		//echo '<pre>'; print_r($complexArray); echo '</pre>';
		//exit();

		$complex = $this->CurlAction(
			'/api/v4/leads/complex',
			$complexArray,
			[
				'Content-Type: application/json',
				'Authorization: Bearer '.$this->access_token
			]
		);

		//echo '<pre>'; print_r($complex); echo '</pre>';
		//exit();

		if($complex[0]->id && $params['note']) {
			$notes = [
				[
					'entity_id' => $complex[0]->id,
					'note_type' => 'common',
					'params' => [
						'text' => $params['note']
					]
				]
			];
			$this->AddNote($notes);
		}

		return $complex;

	}


	## ДОБАВЛЯЕМ ПРИМЕЧАНИЕ ##
	public function AddNote($params) {

		$note = $this->CurlAction(
			'/api/v4/leads/notes',
			$params,
			[
				'Content-Type: application/json',
				'Authorization: Bearer '.$this->access_token
			]
		);

		return $note;

	}
    
    ## РЕДАКТИРУЕМ КОНТАКТ ##
    public function EditedContact($params) {
        $phone = $params['phone'];

		// проверяем существование контакта
		$contactID = 0;

		if(mb_substr($phone, 0, 1) == '8' || mb_substr($phone, 0, 1) == '7') {
			$phoneClear = mb_substr($phone, 1);
		}
		if(mb_substr($phone, 0, 2) == '+8' || mb_substr($phone, 0, 2) == '+7') {
			$phoneClear = mb_substr($phone, 2);
		}

		$searchPhones = [
			'+7'.$phoneClear,
			'+8'.$phoneClear,
			'7'.$phoneClear,
			'8'.$phoneClear,
			$phoneClear
		];
		//$searchPhones = ['79900004978'];

		foreach($searchPhones as $phone) {
			$checkContacts = $this->CurlAction(
				'/api/v4/contacts',
				[
					'query' => $phone
				],
				[
					'Content-Type: application/json',
					'Authorization: Bearer '.$this->access_token,
				],
				'GET'
			);
			if(!empty($checkContacts)) {
				$contactID = $checkContacts->_embedded->contacts[0]->id;
			}
		}
        if($contactID){
            $amoParams = [[
                'id' => (int)$contactID,
                'first_name' => $params['first_name'],
                'custom_fields_values' => $params['custom_fields_values'],
            ]];
            $contact = $this->CurlAction(
                '/api/v4/contacts',
                $amoParams,
                [
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$this->access_token
                ],
                'PATCH'
            );
        }
        if($params['amo_id'] && $params['note']) {
			$notes = [
				[
					'entity_id' => (int)$params['amo_id'],
					'note_type' => 'common',
					'params' => [
						'text' => htmlentities($params['note'])
					]
				]
			];
			$this->AddNote($notes);
		}
		return $contact;
	}
    
	## ПОЛУЧАЕМ СДЕЛКУ ##
	public function EditedLead($params) {

		$lead = $this->CurlAction(
			'/api/v4/leads',
			$params,
			[
				'Content-Type: application/json',
				'Authorization: Bearer '.$this->access_token
			],
            'PATCH'
		);

		return $lead;

	}


	## ПОЛУЧАЕМ СДЕЛКУ ##
	public function GetLead($leadID = false) {

		if(!$leadID) return;

		$lead = $this->CurlAction(
			'/api/v4/leads/'.$leadID,
			[],
			[
				'Content-Type: application/json',
				'Authorization: Bearer '.$this->access_token
			],
			'GET'
		);

		return $lead;

	}


	## ПОИСК КОНТАКТА ПО TELEGRAM-НИКУ ##
	## Добавляет @ перед ником (если ещё нет), ищет через GET /api/v4/contacts?query=@nick&with=leads.
	## Возвращает первый найденный контакт с _embedded.leads или null.
	public function FindContactByTelegram($telegram = '') {

		$telegram = trim((string) $telegram);
		if ( $telegram === '' ) return null;

		$query = (strpos($telegram, '@') === 0) ? $telegram : '@' . $telegram;

		$response = $this->CurlAction(
			'/api/v4/contacts',
			[
				'query' => $query,
				'with'  => 'leads',
			],
			[
				'Content-Type: application/json',
				'Authorization: Bearer ' . $this->access_token,
			],
			'GET'
		);

		if ( empty($response->_embedded->contacts[0]) ) {
			return null;
		}

		return $response->_embedded->contacts[0];

	}


}

?>