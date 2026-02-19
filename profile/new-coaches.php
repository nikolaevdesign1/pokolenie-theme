<?php

/* Template Name: Выбор наставника (новый)*/
get_header('person');

if ( ! is_user_logged_in() ) {
    echo '<p>Вы не авторизованы</p>';
} else {

	
$user_id = get_current_user_id();
	if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['mentor_nonce']) &&
    wp_verify_nonce($_POST['mentor_nonce'], 'save_mentor')
) {

    $selected_mentor = sanitize_text_field($_POST['formentor']);

    $data_group = get_field('data', 'user_' . $user_id);
    if (!$data_group) {
        $data_group = [];
    }

    $data_group['formentor'] = $selected_mentor;

    update_field('data', $data_group, 'user_' . $user_id);

    wp_redirect('/заявка-о-тебе/');
    exit;
}

$date_group = get_field('data', 'user_' . $user_id);
	
$group_age = get_field('user', 'user_' . $user_id);
$age = $group_age['birthday'];
$user_city = $group_age['city'];

	
$formentor = $date_group['formentor'];
$city = $date_group['city'];

$found = $date_group['found'];
$found_name = $date_group['found_name'];

$sucsess =  0;
	
	
		
$name = $group_age['name'];
$formentor = $date_group['formentor'];

$q2 = $date_group['question_2'];
$q3 = $date_group['question_3'];
$q4 = $date_group['question_4'];
	
$q5 = $date_group['question_5'];
$q6 = $date_group['question_6'];
$q7 = $date_group['question_7'];
	
	
$q8 = $date_group['question_8'];
$q9 = $date_group['question_9'];
$q10 = $date_group['question_10'];
	
	
$q11 = $date_group['question_11'];
$q12 = $date_group['question_12'];
$q13 = $date_group['question_13'];
$sucsess =  0;
	
	$done1 = 0;
	$done2 = 0;
	$done3 = 0;
	$done4 = 0;
	$done5 = 0;
	
	if($formentor){
		$done1 = 1;
	}
	if($q2 && $q3 && $q4){
		$done2 = 1;
	}
	if($q5 && $q6 && $q7){
		$done3 = 1;
	}
	if($q8 && $q9 && $q10){
		$done4 = 1;
	}
	if($q11 && $q12 && $q13){
		$done5 = 1;
	}
		

	?>

<main>

    <div class="personal-main-section">
        <div class="container">
            <div class="personal-header">
                <div class = "title">Личный кабинет</div>
            </div>
            <div class = "mobile_filter">
				<div class = "mobile_filter_header">
					Этап 3/4
				</div>
				<div class = "mobile_filter_button">
					Меню анкеты <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9" viewBox="0 0 17 9" fill="none">
  <line x1="0.698317" y1="0.700121" x2="16.0613" y2="0.700121" stroke="#363636" stroke-width="1.39663" stroke-linecap="round"/>
  <line x1="0.698317" y1="4.19231" x2="16.0613" y2="4.19231" stroke="#363636" stroke-width="1.39663" stroke-linecap="round"/>
  <line x1="0.698317" y1="7.6845" x2="11.1731" y2="7.6845" stroke="#363636" stroke-width="1.39663" stroke-linecap="round"/>
</svg>
				</div>
			</div>
            <div class="personal-flex">
             
				 <div class="personal-sidebar">
                    <div class="personal-sidebar-container">
                        <div class = "title">Карта отбора</div>
                        <a href = "/профиль" class = "sidebar_list_item">
							<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
<circle cx="4" cy="4" r="4" fill="#FF5E17"/>
</svg> Знакомство
						</a>
						<div class = "sidebar-left-link-list">
							<div class = "sidebar-left-link-list-item <?php if ($name){echo 'done';}?>">
								<a href = "/контактные-данные">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 12" fill="none">
										  <line x1="1" y1="1" x2="23" y2="1" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										  <line x1="1" y1="6" x2="23" y2="6" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										  <line x1="1" y1="11" x2="16" y2="11" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										</svg>
																			<svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
										  <g clip-path="url(#clip0_742_774)">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M0.704902 5.7981H10.2963C10.4832 5.7981 10.6625 5.87526 10.7947 6.01262C10.9269 6.14997 11.0012 6.33627 11.0012 6.53052V14.2673C11.0012 14.4616 10.9269 14.6479 10.7947 14.7852C10.6625 14.9226 10.4832 14.9998 10.2963 14.9998H0.704902C0.517951 14.9998 0.338656 14.9226 0.206461 14.7852C0.0742663 14.6479 0 14.4616 0 14.2673L0 6.5293C0 6.33505 0.0742663 6.14875 0.206461 6.0114C0.338656 5.87404 0.517951 5.79688 0.704902 5.79688V5.7981Z" fill="#FFC64A"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M4.92115 10.8945L4.16103 12.9635H6.83849L6.13359 10.8627C6.41198 10.7134 6.63346 10.4705 6.76186 10.1736C6.89026 9.87671 6.918 9.54334 6.84055 9.22793C6.7631 8.91253 6.58504 8.63372 6.33543 8.43702C6.08582 8.24032 5.77941 8.13735 5.46621 8.14492C5.15302 8.15249 4.85154 8.27015 4.611 8.47869C4.37046 8.68723 4.20507 8.97434 4.14181 9.29315C4.07856 9.61195 4.12118 9.94362 4.26273 10.234C4.40427 10.5244 4.63638 10.7564 4.92115 10.892V10.8945Z" fill="#606060"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M9.81983 5.79929H8.48639V4.64939C8.49109 3.7863 8.17356 2.95494 7.60056 2.33006C7.33228 2.03041 7.00746 1.79143 6.64635 1.62802C6.28523 1.4646 5.89559 1.38027 5.50171 1.38027C5.10784 1.38027 4.71819 1.4646 4.35708 1.62802C3.99597 1.79143 3.67114 2.03041 3.40287 2.33006C2.82987 2.95494 2.51234 3.7863 2.51704 4.64939V5.79929H1.1836V4.64939C1.18172 3.4306 1.63292 2.25813 2.44302 1.37669C2.83519 0.942127 3.30895 0.595749 3.83505 0.358959C4.36114 0.12217 4.92838 0 5.50171 0C6.07504 0 6.64229 0.12217 7.16838 0.358959C7.69447 0.595749 8.16824 0.942127 8.5604 1.37669C9.37114 2.25771 9.82244 3.43045 9.81983 4.64939V5.79929Z" fill="#606060"/>
										  </g>
										  <defs>
											<clipPath id="clip0_742_774">
											  <rect width="11" height="15" fill="white"/>
											</clipPath>
										  </defs>
										</svg>
									Контактные данные</a>
							</div>
							<div class = "sidebar-left-link-list-item active <?php if ($done1 == '1'){echo 'done';}?>">
								<a href = "/выбор-наставника">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 12" fill="none">
										  <line x1="1" y1="1" x2="23" y2="1" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										  <line x1="1" y1="6" x2="23" y2="6" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										  <line x1="1" y1="11" x2="16" y2="11" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										</svg>
																			<svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
										  <g clip-path="url(#clip0_742_774)">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M0.704902 5.7981H10.2963C10.4832 5.7981 10.6625 5.87526 10.7947 6.01262C10.9269 6.14997 11.0012 6.33627 11.0012 6.53052V14.2673C11.0012 14.4616 10.9269 14.6479 10.7947 14.7852C10.6625 14.9226 10.4832 14.9998 10.2963 14.9998H0.704902C0.517951 14.9998 0.338656 14.9226 0.206461 14.7852C0.0742663 14.6479 0 14.4616 0 14.2673L0 6.5293C0 6.33505 0.0742663 6.14875 0.206461 6.0114C0.338656 5.87404 0.517951 5.79688 0.704902 5.79688V5.7981Z" fill="#FFC64A"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M4.92115 10.8945L4.16103 12.9635H6.83849L6.13359 10.8627C6.41198 10.7134 6.63346 10.4705 6.76186 10.1736C6.89026 9.87671 6.918 9.54334 6.84055 9.22793C6.7631 8.91253 6.58504 8.63372 6.33543 8.43702C6.08582 8.24032 5.77941 8.13735 5.46621 8.14492C5.15302 8.15249 4.85154 8.27015 4.611 8.47869C4.37046 8.68723 4.20507 8.97434 4.14181 9.29315C4.07856 9.61195 4.12118 9.94362 4.26273 10.234C4.40427 10.5244 4.63638 10.7564 4.92115 10.892V10.8945Z" fill="#606060"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M9.81983 5.79929H8.48639V4.64939C8.49109 3.7863 8.17356 2.95494 7.60056 2.33006C7.33228 2.03041 7.00746 1.79143 6.64635 1.62802C6.28523 1.4646 5.89559 1.38027 5.50171 1.38027C5.10784 1.38027 4.71819 1.4646 4.35708 1.62802C3.99597 1.79143 3.67114 2.03041 3.40287 2.33006C2.82987 2.95494 2.51234 3.7863 2.51704 4.64939V5.79929H1.1836V4.64939C1.18172 3.4306 1.63292 2.25813 2.44302 1.37669C2.83519 0.942127 3.30895 0.595749 3.83505 0.358959C4.36114 0.12217 4.92838 0 5.50171 0C6.07504 0 6.64229 0.12217 7.16838 0.358959C7.69447 0.595749 8.16824 0.942127 8.5604 1.37669C9.37114 2.25771 9.82244 3.43045 9.81983 4.64939V5.79929Z" fill="#606060"/>
										  </g>
										  <defs>
											<clipPath id="clip0_742_774">
											  <rect width="11" height="15" fill="white"/>
											</clipPath>
										  </defs>
										</svg>
									Выбор наставника</a>
							</div>
							<div class = "sidebar-left-link-list-item <?php if ($done2 == '1'){echo 'done';}?>">
								<div class = "sidebar_sub-list">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="12" viewBox="0 0 24 12" fill="none">
										  <line x1="1" y1="1" x2="23" y2="1" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										  <line x1="1" y1="6" x2="23" y2="6" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										  <line x1="1" y1="11" x2="16" y2="11" stroke="#8B8B8B" stroke-width="2" stroke-linecap="round"/>
										</svg>
																			<svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
										  <g clip-path="url(#clip0_742_774)">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M0.704902 5.7981H10.2963C10.4832 5.7981 10.6625 5.87526 10.7947 6.01262C10.9269 6.14997 11.0012 6.33627 11.0012 6.53052V14.2673C11.0012 14.4616 10.9269 14.6479 10.7947 14.7852C10.6625 14.9226 10.4832 14.9998 10.2963 14.9998H0.704902C0.517951 14.9998 0.338656 14.9226 0.206461 14.7852C0.0742663 14.6479 0 14.4616 0 14.2673L0 6.5293C0 6.33505 0.0742663 6.14875 0.206461 6.0114C0.338656 5.87404 0.517951 5.79688 0.704902 5.79688V5.7981Z" fill="#FFC64A"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M4.92115 10.8945L4.16103 12.9635H6.83849L6.13359 10.8627C6.41198 10.7134 6.63346 10.4705 6.76186 10.1736C6.89026 9.87671 6.918 9.54334 6.84055 9.22793C6.7631 8.91253 6.58504 8.63372 6.33543 8.43702C6.08582 8.24032 5.77941 8.13735 5.46621 8.14492C5.15302 8.15249 4.85154 8.27015 4.611 8.47869C4.37046 8.68723 4.20507 8.97434 4.14181 9.29315C4.07856 9.61195 4.12118 9.94362 4.26273 10.234C4.40427 10.5244 4.63638 10.7564 4.92115 10.892V10.8945Z" fill="#606060"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M9.81983 5.79929H8.48639V4.64939C8.49109 3.7863 8.17356 2.95494 7.60056 2.33006C7.33228 2.03041 7.00746 1.79143 6.64635 1.62802C6.28523 1.4646 5.89559 1.38027 5.50171 1.38027C5.10784 1.38027 4.71819 1.4646 4.35708 1.62802C3.99597 1.79143 3.67114 2.03041 3.40287 2.33006C2.82987 2.95494 2.51234 3.7863 2.51704 4.64939V5.79929H1.1836V4.64939C1.18172 3.4306 1.63292 2.25813 2.44302 1.37669C2.83519 0.942127 3.30895 0.595749 3.83505 0.358959C4.36114 0.12217 4.92838 0 5.50171 0C6.07504 0 6.64229 0.12217 7.16838 0.358959C7.69447 0.595749 8.16824 0.942127 8.5604 1.37669C9.37114 2.25771 9.82244 3.43045 9.81983 4.64939V5.79929Z" fill="#606060"/>
										  </g>
										  <defs>
											<clipPath id="clip0_742_774">
											  <rect width="11" height="15" fill="white"/>
											</clipPath>
										  </defs>
										</svg>
									Анкета отбора <svg xmlns="http://www.w3.org/2000/svg" width="11" height="8" viewBox="0 0 11 8" fill="none">
  <path d="M0.382812 0.320312L5.38281 6.32031L10.3828 0.320312" stroke="#333333"/>
</svg></div>
							</div>
							<div class = "sidebar_sub-list_menu">
								<a href = "/заявка-о-тебе"  class = " <?php if ($done2 == '1'){echo 'done';}?>"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
  <g clip-path="url(#clip0_742_959)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.704902 5.7981H10.2963C10.4832 5.7981 10.6625 5.87526 10.7947 6.01262C10.9269 6.14997 11.0012 6.33627 11.0012 6.53052V14.2673C11.0012 14.4616 10.9269 14.6479 10.7947 14.7852C10.6625 14.9226 10.4832 14.9998 10.2963 14.9998H0.704902C0.517951 14.9998 0.338656 14.9226 0.206461 14.7852C0.0742663 14.6479 0 14.4616 0 14.2673L0 6.5293C0 6.33505 0.0742663 6.14875 0.206461 6.0114C0.338656 5.87404 0.517951 5.79688 0.704902 5.79688V5.7981Z" fill="#FFC64A"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.92115 10.8945L4.16103 12.9635H6.83849L6.13359 10.8627C6.41198 10.7134 6.63346 10.4705 6.76186 10.1736C6.89026 9.87671 6.918 9.54334 6.84055 9.22793C6.7631 8.91253 6.58504 8.63372 6.33543 8.43702C6.08582 8.24032 5.77941 8.13735 5.46621 8.14492C5.15302 8.15249 4.85154 8.27015 4.611 8.47869C4.37046 8.68723 4.20507 8.97434 4.14181 9.29315C4.07856 9.61195 4.12118 9.94362 4.26273 10.234C4.40427 10.5244 4.63638 10.7564 4.92115 10.892V10.8945Z" fill="#606060"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.81983 5.79929H8.48639V4.64939C8.49109 3.7863 8.17356 2.95494 7.60056 2.33006C7.33228 2.03041 7.00746 1.79143 6.64635 1.62802C6.28523 1.4646 5.89559 1.38027 5.50171 1.38027C5.10784 1.38027 4.71819 1.4646 4.35708 1.62802C3.99597 1.79143 3.67114 2.03041 3.40287 2.33006C2.82987 2.95494 2.51234 3.7863 2.51704 4.64939V5.79929H1.1836V4.64939C1.18172 3.4306 1.63292 2.25813 2.44302 1.37669C2.83519 0.942127 3.30895 0.595749 3.83505 0.358959C4.36114 0.12217 4.92838 0 5.50171 0C6.07504 0 6.64229 0.12217 7.16838 0.358959C7.69447 0.595749 8.16824 0.942127 8.5604 1.37669C9.37114 2.25771 9.82244 3.43045 9.81983 4.64939V5.79929Z" fill="#606060"/>
  </g>
  <defs>
    <clipPath id="clip0_742_959">
      <rect width="11" height="15" fill="white"/>
    </clipPath>
  </defs>
</svg>
								<div>О тебе <br><span>(3 вопроса) 5 минут</span> </div></a>
								<a href = "/заявка-желания-и-цели"  class = " <?php if ($done3 == '1'){echo 'done';}?>"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
  <g clip-path="url(#clip0_742_959)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.704902 5.7981H10.2963C10.4832 5.7981 10.6625 5.87526 10.7947 6.01262C10.9269 6.14997 11.0012 6.33627 11.0012 6.53052V14.2673C11.0012 14.4616 10.9269 14.6479 10.7947 14.7852C10.6625 14.9226 10.4832 14.9998 10.2963 14.9998H0.704902C0.517951 14.9998 0.338656 14.9226 0.206461 14.7852C0.0742663 14.6479 0 14.4616 0 14.2673L0 6.5293C0 6.33505 0.0742663 6.14875 0.206461 6.0114C0.338656 5.87404 0.517951 5.79688 0.704902 5.79688V5.7981Z" fill="#FFC64A"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.92115 10.8945L4.16103 12.9635H6.83849L6.13359 10.8627C6.41198 10.7134 6.63346 10.4705 6.76186 10.1736C6.89026 9.87671 6.918 9.54334 6.84055 9.22793C6.7631 8.91253 6.58504 8.63372 6.33543 8.43702C6.08582 8.24032 5.77941 8.13735 5.46621 8.14492C5.15302 8.15249 4.85154 8.27015 4.611 8.47869C4.37046 8.68723 4.20507 8.97434 4.14181 9.29315C4.07856 9.61195 4.12118 9.94362 4.26273 10.234C4.40427 10.5244 4.63638 10.7564 4.92115 10.892V10.8945Z" fill="#606060"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.81983 5.79929H8.48639V4.64939C8.49109 3.7863 8.17356 2.95494 7.60056 2.33006C7.33228 2.03041 7.00746 1.79143 6.64635 1.62802C6.28523 1.4646 5.89559 1.38027 5.50171 1.38027C5.10784 1.38027 4.71819 1.4646 4.35708 1.62802C3.99597 1.79143 3.67114 2.03041 3.40287 2.33006C2.82987 2.95494 2.51234 3.7863 2.51704 4.64939V5.79929H1.1836V4.64939C1.18172 3.4306 1.63292 2.25813 2.44302 1.37669C2.83519 0.942127 3.30895 0.595749 3.83505 0.358959C4.36114 0.12217 4.92838 0 5.50171 0C6.07504 0 6.64229 0.12217 7.16838 0.358959C7.69447 0.595749 8.16824 0.942127 8.5604 1.37669C9.37114 2.25771 9.82244 3.43045 9.81983 4.64939V5.79929Z" fill="#606060"/>
  </g>
  <defs>
    <clipPath id="clip0_742_959">
      <rect width="11" height="15" fill="white"/>
    </clipPath>
  </defs>
</svg>
								<div>Желания и цели <br><span>(3 вопроса)  10-15 минут</span> </div></a>
								<a href = "/заявка-твой-опыт"  class = " <?php if ($done4 == '1'){echo 'done';}?>"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
  <g clip-path="url(#clip0_742_959)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.704902 5.7981H10.2963C10.4832 5.7981 10.6625 5.87526 10.7947 6.01262C10.9269 6.14997 11.0012 6.33627 11.0012 6.53052V14.2673C11.0012 14.4616 10.9269 14.6479 10.7947 14.7852C10.6625 14.9226 10.4832 14.9998 10.2963 14.9998H0.704902C0.517951 14.9998 0.338656 14.9226 0.206461 14.7852C0.0742663 14.6479 0 14.4616 0 14.2673L0 6.5293C0 6.33505 0.0742663 6.14875 0.206461 6.0114C0.338656 5.87404 0.517951 5.79688 0.704902 5.79688V5.7981Z" fill="#FFC64A"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.92115 10.8945L4.16103 12.9635H6.83849L6.13359 10.8627C6.41198 10.7134 6.63346 10.4705 6.76186 10.1736C6.89026 9.87671 6.918 9.54334 6.84055 9.22793C6.7631 8.91253 6.58504 8.63372 6.33543 8.43702C6.08582 8.24032 5.77941 8.13735 5.46621 8.14492C5.15302 8.15249 4.85154 8.27015 4.611 8.47869C4.37046 8.68723 4.20507 8.97434 4.14181 9.29315C4.07856 9.61195 4.12118 9.94362 4.26273 10.234C4.40427 10.5244 4.63638 10.7564 4.92115 10.892V10.8945Z" fill="#606060"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.81983 5.79929H8.48639V4.64939C8.49109 3.7863 8.17356 2.95494 7.60056 2.33006C7.33228 2.03041 7.00746 1.79143 6.64635 1.62802C6.28523 1.4646 5.89559 1.38027 5.50171 1.38027C5.10784 1.38027 4.71819 1.4646 4.35708 1.62802C3.99597 1.79143 3.67114 2.03041 3.40287 2.33006C2.82987 2.95494 2.51234 3.7863 2.51704 4.64939V5.79929H1.1836V4.64939C1.18172 3.4306 1.63292 2.25813 2.44302 1.37669C2.83519 0.942127 3.30895 0.595749 3.83505 0.358959C4.36114 0.12217 4.92838 0 5.50171 0C6.07504 0 6.64229 0.12217 7.16838 0.358959C7.69447 0.595749 8.16824 0.942127 8.5604 1.37669C9.37114 2.25771 9.82244 3.43045 9.81983 4.64939V5.79929Z" fill="#606060"/>
  </g>
  <defs>
    <clipPath id="clip0_742_959">
      <rect width="11" height="15" fill="white"/>
    </clipPath>
  </defs>
</svg>
								<div>Твой опыт  <br><span>(3 вопроса) 15-20 минут</span> </div></a>
								<a href = "/заявка-зоны-роста"  class = " <?php if ($done5 == '1'){echo 'done';}?>"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
  <g clip-path="url(#clip0_742_959)">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.704902 5.7981H10.2963C10.4832 5.7981 10.6625 5.87526 10.7947 6.01262C10.9269 6.14997 11.0012 6.33627 11.0012 6.53052V14.2673C11.0012 14.4616 10.9269 14.6479 10.7947 14.7852C10.6625 14.9226 10.4832 14.9998 10.2963 14.9998H0.704902C0.517951 14.9998 0.338656 14.9226 0.206461 14.7852C0.0742663 14.6479 0 14.4616 0 14.2673L0 6.5293C0 6.33505 0.0742663 6.14875 0.206461 6.0114C0.338656 5.87404 0.517951 5.79688 0.704902 5.79688V5.7981Z" fill="#FFC64A"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.92115 10.8945L4.16103 12.9635H6.83849L6.13359 10.8627C6.41198 10.7134 6.63346 10.4705 6.76186 10.1736C6.89026 9.87671 6.918 9.54334 6.84055 9.22793C6.7631 8.91253 6.58504 8.63372 6.33543 8.43702C6.08582 8.24032 5.77941 8.13735 5.46621 8.14492C5.15302 8.15249 4.85154 8.27015 4.611 8.47869C4.37046 8.68723 4.20507 8.97434 4.14181 9.29315C4.07856 9.61195 4.12118 9.94362 4.26273 10.234C4.40427 10.5244 4.63638 10.7564 4.92115 10.892V10.8945Z" fill="#606060"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.81983 5.79929H8.48639V4.64939C8.49109 3.7863 8.17356 2.95494 7.60056 2.33006C7.33228 2.03041 7.00746 1.79143 6.64635 1.62802C6.28523 1.4646 5.89559 1.38027 5.50171 1.38027C5.10784 1.38027 4.71819 1.4646 4.35708 1.62802C3.99597 1.79143 3.67114 2.03041 3.40287 2.33006C2.82987 2.95494 2.51234 3.7863 2.51704 4.64939V5.79929H1.1836V4.64939C1.18172 3.4306 1.63292 2.25813 2.44302 1.37669C2.83519 0.942127 3.30895 0.595749 3.83505 0.358959C4.36114 0.12217 4.92838 0 5.50171 0C6.07504 0 6.64229 0.12217 7.16838 0.358959C7.69447 0.595749 8.16824 0.942127 8.5604 1.37669C9.37114 2.25771 9.82244 3.43045 9.81983 4.64939V5.79929Z" fill="#606060"/>
  </g>
  <defs>
    <clipPath id="clip0_742_959">
      <rect width="11" height="15" fill="white"/>
    </clipPath>
  </defs>
</svg>
								<div>Зоны роста <br><span>(3 вопроса) 10-15 минут</span> </div></a>
							
							</div>
						</div>

                        <div class="pesronal-sidebar-button">
                            <a href="<?php the_field('телеграм', 'options')?>" target = "_blank"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.23244 6.46938C6.06328 4.35919 9.27924 2.95703 10.8941 2.27678C15.4903 0.34707 16.4565 0.0138828 17.0776 0C17.2156 0 17.5193 0.0277658 17.7263 0.194359C17.892 0.333187 17.9334 0.513664 17.961 0.652491C17.9886 0.791319 18.0162 1.08286 17.9886 1.30498C17.7401 3.94271 16.6635 10.3427 16.1114 13.2858C15.8768 14.5353 15.4213 14.9518 14.9796 14.9934C14.0135 15.0767 13.2819 14.3548 12.3572 13.744C10.8941 12.786 10.0798 12.1891 8.65813 11.2451C7.01565 10.1622 8.07843 9.56524 9.017 8.59344C9.26544 8.34355 13.5028 4.45637 13.5856 4.1093C13.5994 4.06766 13.5994 3.90106 13.5028 3.81776C13.4062 3.73447 13.2681 3.76223 13.1577 3.79C13.0059 3.81777 10.6871 5.37264 6.1737 8.44073C5.51118 8.89886 4.91768 9.12099 4.37939 9.10711C3.78588 9.09322 2.65409 8.77392 1.79834 8.49626C0.763154 8.16308 -0.0649904 7.9826 0.00402163 7.39952C0.0454289 7.0941 0.459501 6.78868 1.23244 6.46938Z" fill="white"/>
</svg> Возникли сложности?<br> Напишите в службу заботы</a>
                        </div>
                    </div>
                </div>
			
				<div class="personal-admin continue" style = "<?php if ($sucsess){ echo 'display:none';}  ?>">
                    <div class="brief-container">
                        <div class="brief-header">
                            <div class = "title">Выбор наставника</div>
						
                        </div>
                        <form class="brief-content" id="brief-form" method="post" enctype="multipart/form-data" >
							 <?php wp_nonce_field('save_mentor', 'mentor_nonce'); ?>
                            <div class="brief-content-steps step active" data-step="1">
                                <div class = "title">1. К какому наставнику вы хотите попасть?</div>
                                <div class="brief-content-coaches-list">
									
									<?php
$args = array(
    'post_type' => 'coaches',
    'posts_per_page' => 1000
);
$loop = new WP_Query($args);

// Преобразуем дату рождения пользователя в возраст
$date_of_birth = $age; // пример, замени на свою переменную
$dob = DateTime::createFromFormat('d.m.Y', $date_of_birth);
$today = new DateTime();
$age = $dob ? $today->diff($dob)->y : 0;

$found_any = false; // флаг для проверки, есть ли подходящие наставники

while($loop->have_posts()) : $loop->the_post();
    $post_ID = get_the_ID();
    $age_range_str = get_field('age_peoples'); // строка типа "15-18 лет"

    // Парсим диапазон
    if (preg_match('/(\d+)-(\d+)/', $age_range_str, $matches)) {
        $min_age = (int)$matches[1];
        $max_age = (int)$matches[2];
    } else {
        $min_age = 0;
        $max_age = 150; // если не указан диапазон, показываем всем
    }
	$coach_status = get_field('is_open');
	$coach_city = get_field('region');
    // Проверяем подходит ли возраст пользователя
    
	
	
    if ($age >= $min_age && $age <= $max_age && get_field('is_open') == 'Открыт') {
	/*echo $coach_city;
	 * 
	echo '<br>';
	echo $user_city; 
	echo '<br>';
	echo $min_age;
	echo '<br>';
	echo $max_age;
	echo '<br>';
	echo $age;
	echo '<br>';*/
		$user_city = trim($user_city);
		$coach_city = trim($coach_city);
		/*if ($user_city == $coach_city ||get_field('format') == 'Online' ) {*/
        $found_any = true; // нашли хотя бы одного подходящего наставника
        
									
									?>
									
        <div class="brief-content-coaches-list-item 
              <?php echo ($formentor === get_the_title()) ? 'choose' : ''; ?>"
        data-city = "<?php the_field('region')?>" data-format = "<?php the_field('format')?>">
            <div class="brief-content-coaches-list-item-image">
                <img src="<?php the_field('image');?>" alt="">
            </div>
            <div class="brief-content-coaches-list-item-content">
                <div class = "title_h2"><?php the_title();?></div>
                <div class = "title_h3">Возраст участников: <span><?php the_field('age_peoples')?></span></div>
                <div class = "title_h3">Город: <span><?php the_field('region')?></span></div>
                <div class="brief-content-coaches-list-item-content-links">
                    <p class="choose-trainer">Выбрать наставника</p>
                    <a href="<?php echo get_permalink();?>" target="_blank">Читать больше о наставнике</a>
                </div>
            </div>
           <input type="radio"
       name="formentor"
       value="<?php the_title();?>"
       <?php checked($formentor, get_the_title()); ?>
       hidden>


        </div>
        <?php
		/*}*/
    }
endwhile;

// Если подходящих наставников нет
if (!$found_any) {
    echo '<p>Подходящих наставников нет.</p>';
}

wp_reset_postdata();
?>
									
									
                                </div>
                            </div>
                           
							<button>
								Сохранить и продолжить
							</button>
                        </form>
                       
                    </div>
                      
                </div>
            </div>
            


        </div>
    </div>

    <div class="section-footer-qr">
        <div class="container">
            <div class="section-footer-qr-plashka">
                <div class="plashka-content">
                    <div class = "title">Возникли вопросы?</div>
                    <p>Наша служба заботы с удовольствием ответит 
                        на них и расскажет больше о нашем проекте</p>
                    <a href="#">Написать </a>
                </div>
                <div class="plashka-background">
                    <img src= "<?php echo get_template_directory_uri() . '/assets/images/qr-back.svg'?>">
                </div>
                <div class="plashka-background-image">
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/big-qr.svg'?>" alt="">
                </div>
            </div>
        </div>
    </div>
</main>

<div class = "bottom_mobile_menu">
	 <ul>
         <li><a href="/профиль/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i1.svg'?>" alt="">Контактные данные</a></li>
         <li><a href="/бриф/" class = "active"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i2-a.svg'?>" alt="">Регистрация к наставнику</a></li>
         <li><a href="/статус/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i3.svg'?>" alt="">Отследить статус заявки</a></li>
     </ul>
</div>

		<?php }?>
	



    <footer>
        <div class="container">
            <div class="footer-flex">
                <div class="footer_logo">
                    <a href = "/"><img src = "<?php the_field('логотип_подвал', 'options')?>"></a>
                    <p>Помогаем предпринимателям выделить главное и масштабировать бизнес быстрее</p>
                    <div class="footer_social">
						<?php if( have_rows('соц_сети', 'option') ): ?>
    						<?php while( have_rows('соц_сети', 'option') ): the_row(); ?>
        						 <a href="<?php the_sub_field('ссылка')?>"><img src="<?php the_sub_field('иконка')?>" alt=""></a>
    						<?php endwhile; ?>
						<?php endif; ?>
                       
                       
                    </div>
                </div>
                <div class="footer_info">
                    <div class = "title">Меню</div>
                    <ul>
						<?php if( have_rows('меню_подвал', 'option') ): ?>
    						<?php while( have_rows('меню_подвал', 'option') ): the_row(); ?>
        						 <li><a href = "<?php the_sub_field('ссылка')?>"><?php the_sub_field('название_пункта')?></a></li>
    						<?php endwhile; ?>
						<?php endif; ?>
                       
                    
                    </ul>
                    <div class = "title">Реквизиты</div>
                    <p><?php the_field('реквизиты', 'options')?></p>
                </div>
                <div class="footer_buttons">
                    <a class = "start_register">Личный кабинет</a>
                    <a href="https://t.me/pokoleniecare" target = "_blank">Служба заботы</a>
                </div>
            </div>
            <div class="footer_sub">
                <a href="https://pokolenie.info/privacy-policy/" target = "_blank">Политика конфиденциальности</a>
                <a href="https://pokolenie.info/reglament/" target = "_blank">Регламент порядка работы АНО «Поколение»</a>
            </div>

        </div>
    </footer>
    


		<?php //get_template_part( 'template-parts/template-user');?>




    <script src = "https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/slick.min.js'?>"></script>

<script>
// ===== 1. Логика выбора наставника =====
const mentorCards = document.querySelectorAll('.mentor-card');
let mentorCity = "";
let mentorFormat = "";

mentorCards.forEach(card => {
  card.addEventListener('click', () => {
    mentorCards.forEach(c => c.classList.remove('active')); // убираем активность у других
    card.classList.add('active'); // добавляем активному

    mentorCity = card.dataset.city;
    mentorFormat = card.dataset.format;

    console.log("Выбран наставник:", mentorCity, mentorFormat);
  });
});

// ===== 2. Проверка города участника =====
const cityInput = document.querySelector('#city_in');
const result = document.querySelector('#result');

// Функция Левенштейна
function levenshtein(a, b) {
  const matrix = Array.from({ length: b.length + 1 }, (_, i) =>
    Array.from({ length: a.length + 1 }, (_, j) => j ? 0 : i)
  );
  for (let i = 1; i <= b.length; i++) {
    for (let j = 1; j <= a.length; j++) {
      const cost = a[j - 1] === b[i - 1] ? 0 : 1;
      matrix[i][j] = Math.min(
        matrix[i - 1][j] + 1,
        matrix[i][j - 1] + 1,
        matrix[i - 1][j - 1] + cost
      );
    }
  }
  return matrix[b.length][a.length];
}

let timer;

cityInput.addEventListener('input', () => {
  clearTimeout(timer);

  timer = setTimeout(() => {
    // Проверяем, выбран ли наставник
    const activeCard = document.querySelector('.brief-content-coaches-list-item.choose');
    if (!activeCard) {
      result.textContent = "Сначала выберите наставника";
      result.style.color = "orange";
	  $('.next-button').removeClass('active');
      return;
    }

    const userCity = cityInput.value.trim().toLowerCase();
    const mentorCity = activeCard.dataset.city.trim().toLowerCase();
    const mentorFormat = activeCard.dataset.format;

    // Если наставник онлайн — пропускаем проверку
    if (mentorFormat === "Online") {
      result.textContent = "Наставник онлайн — проверка не требуется";
      result.style.color = "gray";
	  $('.next-button').addClass('active');
      return;
    }

    // Если оффлайн — проверяем город
    const distance = levenshtein(userCity, mentorCity);
    if (distance <= 3) {
      result.textContent = `Город совпадает (${activeCard.dataset.city})`;
      result.style.color = "green";
	  $('.next-button').addClass('active');
    } else {
      result.textContent = `Город не совпадает (${activeCard.dataset.city})`;
      result.style.color = "#C41414";
	  $('.next-button').removeClass('active');
    }
  }, 500);
});
</script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/brief.js'?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>
<?php wp_footer(); ?>

</body>
</html>

