<?php
/* Template Name: Личный кабинет опекуна */
get_header('person');

if ( ! is_user_logged_in() ) {
    echo '<p>Вы не авторизованы</p>';
    return;
} 



$user_id = get_current_user_id();


$group = get_field('user', 'user_' . $user_id);
$name = $group['name'];
$date = $group['birthday'];
$age = $group['age'];
$phone = $group['phone'];
$user = wp_get_current_user();
$email = $user->user_email;
$telegram = $group['telegram'];
$vk = $group['vk'];
$city = $group['city'];
$passport = $group['passport'];
$passport_reg_url = $group['child_doc'];


$group_parent = get_field('guardian', 'user_' . $user_id);
$name_guardian = $group_parent['name'];
$phone_guardian = $group_parent['phone'];
$email_guardian = $group_parent['email']


$date_group = get_field('data', 'user_' . $user_id);
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
					Этап 2/4
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
                        <a href = "/профиль" class = "sidebar_list_item active">
							<svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
<circle cx="4" cy="4" r="4" fill="#FF5E17"/>
</svg> Знакомство
						</a>
						<div class = "sidebar-left-link-list">
							<div class = "sidebar-left-link-list-item active <?php if ($name){echo 'done';}?>">
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
							<div class = "sidebar-left-link-list-item <?php if ($done1 == '1'){echo 'done';}?>">
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
								<a href = "/заявка-запустить-навигацию"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
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
								<div>Запустить навигацию по отбору</div></a>
							</div>
						</div>

                        <div class="pesronal-sidebar-button">
                            <a href="<?php the_field('телеграм', 'options')?>" target = "_blank"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.23244 6.46938C6.06328 4.35919 9.27924 2.95703 10.8941 2.27678C15.4903 0.34707 16.4565 0.0138828 17.0776 0C17.2156 0 17.5193 0.0277658 17.7263 0.194359C17.892 0.333187 17.9334 0.513664 17.961 0.652491C17.9886 0.791319 18.0162 1.08286 17.9886 1.30498C17.7401 3.94271 16.6635 10.3427 16.1114 13.2858C15.8768 14.5353 15.4213 14.9518 14.9796 14.9934C14.0135 15.0767 13.2819 14.3548 12.3572 13.744C10.8941 12.786 10.0798 12.1891 8.65813 11.2451C7.01565 10.1622 8.07843 9.56524 9.017 8.59344C9.26544 8.34355 13.5028 4.45637 13.5856 4.1093C13.5994 4.06766 13.5994 3.90106 13.5028 3.81776C13.4062 3.73447 13.2681 3.76223 13.1577 3.79C13.0059 3.81777 10.6871 5.37264 6.1737 8.44073C5.51118 8.89886 4.91768 9.12099 4.37939 9.10711C3.78588 9.09322 2.65409 8.77392 1.79834 8.49626C0.763154 8.16308 -0.0649904 7.9826 0.00402163 7.39952C0.0454289 7.0941 0.459501 6.78868 1.23244 6.46938Z" fill="white"/>
</svg> Возникли сложности?<br> Напишите в службу заботы</a>
                        </div>
                    </div>
                </div>
                <div class="personal-admin">
                    <div class="brief-container" style = "height:100%;">
                        <div class="brief-header">
                            <div class = "title">Контактные данные</div>
                        </div>
                        <div class="brief-contact-data">
						
                            <form class = "contact-data-form" method="post" enctype="multipart/form-data">
								<div class = "contact-data-form-step" data-step="1" style="display:block;">
									<div class = "title">
										Шаг 1. Контактные данные родителя или опекуна
									</div>
									 <label>
                                    	<p>1. ФИО опекуна</p>
										<input type="text" name="guardian_name" placeholder="ФИО" value = "<?php echo $name_guardian?>"  required>
                                	</label>
									  <label>
                                    	<p>2. Ваш телефон</p>
                                    	<input type="text" name="guardian_phone" placeholder = "8(___)___-__-__" value = "<?php echo $phone_guardian?>" required>
                               		</label>
									 <label>
                                    <p>3. Ваш e-mail</p>
                                    <input type="email" name="guardian_email" value = "<?php echo $email_guardian ?>" required> 
                                </label>
									<div class="file-upload">
    <p>4. Фотография лицевой стороны паспорта</p>

    <?php
$passport_url = '';

    // Если ACF вернул массив
    if (is_array($passport) && !empty($passport['url'])) {
        $passport_url = $passport['url'];
    }
    // Если вернул число (ID вложения)
    elseif (is_numeric($passport)) {
        $passport_url = wp_get_attachment_url($passport);
    }
    // Если вернул строку
    elseif (is_string($passport) && !empty($passport)) {
        $passport_url = trim($passport);
    }
    ?>

    <div class="file-upload-buttons">
        <input type="file" name="passport-file" id="passport-file" accept="image/*" hidden >
        <input type="hidden" name="passport-file-delete" id="passport-file-delete" value="0" >
  		<input type="hidden" name="passport_current" value="<?php echo esc_url($passport_url); ?>">

        <?php if ($passport_url): ?>
            <!-- Уже загружен файл -->
            <button type="button" id="upload-btn" class="btn-red full-width" style="display:none;">Выбрать файл</button>

            <div class="preview" style="display:block;">
                <img id="preview-img" src="<?php echo esc_url($passport_url); ?>" alt="Превью">
                <button type="button" id="zoom-btn" class="zoom-btn">🔍</button>
            </div>

            <button type="button" id="replace-btn" class="btn-gray full-width">Заменить</button>
            <button type="button" id="remove-btn" class="btn-gray full-width">Удалить</button>
        <?php else: ?>
            <!-- Файла нет -->
            <button type="button" id="upload-btn" class="btn-red full-width">Выбрать файл</button>

            <div class="preview" style="display:none;">
                <img id="preview-img" src="" alt="Превью">
                <button type="button" id="zoom-btn" class="zoom-btn">🔍</button>
            </div>

            <button type="button" id="replace-btn" class="btn-gray full-width" style="display:none;">Заменить</button>
            <button type="button" id="remove-btn" class="btn-gray full-width" style="display:none;">Удалить</button>
        <?php endif; ?>
    </div>
</div>
									
									
									
									<div class="file-upload">
  <p>5. Фотография страницы паспорта с записью о ребенке или сведетельство о рождении</p>

  <?php
  //$passport_reg = get_field('паспорт_прописка', 'user_' . $user_id);

 $passport_url_reg = '';

    // Если ACF вернул массив
    if (is_array($passport_reg_url) && !empty($passport_reg_url['url'])) {
        $passport_url_reg = $passport_reg_url['url'];
    }
    // Если вернул число (ID вложения)
    elseif (is_numeric($passport_reg_url)) {
        $passport_url_reg = wp_get_attachment_url($passport_reg_url);
    }
    // Если вернул строку
    elseif (is_string($passport_reg_url) && !empty($passport_reg_url)) {
        $passport_url_reg = trim($passport_reg_url);
    }
  ?>

  <div class="file-upload-buttons">
      <input type="file" name="passport-reg-file" id="passport-reg-file" accept="image/*" hidden >
      <input type="hidden" name="passport-reg-file-delete" id="passport-reg-file-delete" value="0" >
  	  <input type="hidden" name="passport-reg-current" value="<?php echo esc_url($passport_url_reg); ?>">

      <?php if ($passport_reg_url): ?>
         
          <button type="button" id="upload-btn-reg" class="btn-red full-width" style="display:none;">Выбрать файл</button>

          <div class="preview" style="display:block;">
              <img id="preview-img-reg" src="<?php echo esc_url($passport_reg_url); ?>" alt="Превью">
              <button type="button" id="zoom-btn-reg" class="zoom-btn">🔍</button>
          </div>

          <button type="button" id="replace-btn-reg" class="btn-gray full-width">Заменить</button>
          <button type="button" id="remove-btn-reg" class="btn-gray full-width">Удалить</button>
      <?php else: ?>
         
          <button type="button" id="upload-btn-reg" class="btn-red full-width">Выбрать файл</button>

          <div class="preview" style="display:none;">
              <img id="preview-img-reg" src="" alt="Превью">
              <button type="button" id="zoom-btn-reg" class="zoom-btn">🔍</button>
          </div>

          <button type="button" id="replace-btn-reg" class="btn-gray full-width" style="display:none;">Заменить</button>
          <button type="button" id="remove-btn-reg" class="btn-gray full-width" style="display:none;">Удалить</button>
      <?php endif; ?>
  </div>
</div>
					
									<div class="form-sub-info">
                                    <p><span>Важно!</span> На фотографии не должно быть бликов, отблесков. Информация должна хорошо считываться

Данные используются исключительно для идентификации в проекте и надёжно хранятся на защищённой российской платформе AMO CRM.
На сайте размещена политика конфиденциальности, в которой мы обязуемся защищать и не передавать данные третьим лицам.»</p>
                                </div>
									<div class = "next-step-checkbox">
										<p>
											Я, как законный представитель несовершеннолетнего, даю согласие АНО «Поколение» на обработку персональных данных несовершеннолетнего, указанных в данной форме, в соответствии с <a href="https://pokolenie.info/privacy-policy/" target = "_blank">Политикой конфиденциальности</a>
										</p>
										<input type = "checkbox"  id="consent-1" checked>
									</div>
									<div class = "next-step-checkbox">
										<p>
											Даю согласие от несовершенолетнего лица, регистрируемого в проекте, <a href="https://pokolenie.info/reglament/" target = "_blank">с регламентом порядка работы</a> 
										</p>
										<input type = "checkbox"  id="consent-2" checked>
									</div>
									<div class = "next-step-button">
										<div class = "contact-data-form-step-button">
                                			<p class = "next-btn-steps">Далее</p>
											<p id="consent-error" style="display:none;">
												Для продолжения, пожалуйста поставьте галочки в согласии на обработку персональных данных и порядке работы
											</p>
									</div>
									</div>
								</div>
								<div class = "contact-data-form-step" data-step="2" style="display:none;">
									<div class = "title">
										Шаг 2. Контактные данные участника
									</div>
									 <label>
                                    	<p>1. ФИО участника</p>
										<input type="text" name="name" placeholder="ФИО" value = "<?php echo $name?>"  required>
                                	</label>
									 <label>
                                    	<p>2. Дата рождения</p>
										<input type="text" id="date" name="date" placeholder="дд.мм.гггг" value = "<?php echo $date?>"  required>
										<span id="date-error" style="position: absolute; right: 10px; top: -15px; font-size: 12px; color:#C41414; display:none;">Введите корректную дату</span>
                                	</label>
									  <label>
                                    	<p>3. Телефон участника</p>
                                    	<input type="text" name="phone" placeholder = "8(___)___-__-__" value = "<?php echo $phone?>" required>
                               		</label>
									
									 <label>
                                    <p>4. E-mail участника</p>
                                    <input type="email" name="email" value = "<?php echo esc_attr($email)?>" required> 
                                </label>
									  <label>
                                    <p>5. Ник в Telegram</p>
                                    <input type="text" placeholder = "@" name="telegram" value = "<?php echo $telegram?>" required>
										  <div class = "mistake">
										<p>
											Мы не нашли ваш telegram аккаунт в нашем сообществе. 
										</p>
									</div>
                                </label>
									<a href = "#" class = "telegram_form"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="15" viewBox="0 0 18 15" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.23244 6.46938C6.06328 4.35919 9.27924 2.95703 10.8941 2.27678C15.4903 0.34707 16.4565 0.0138828 17.0776 0C17.2156 0 17.5193 0.0277658 17.7263 0.194359C17.892 0.333187 17.9334 0.513664 17.961 0.652491C17.9886 0.791319 18.0162 1.08286 17.9886 1.30498C17.7401 3.94271 16.6635 10.3427 16.1114 13.2858C15.8768 14.5353 15.4213 14.9518 14.9796 14.9934C14.0135 15.0767 13.2819 14.3548 12.3572 13.744C10.8941 12.786 10.0798 12.1891 8.65813 11.2451C7.01565 10.1622 8.07843 9.56524 9.017 8.59344C9.26544 8.34355 13.5028 4.45637 13.5856 4.1093C13.5994 4.06766 13.5994 3.90106 13.5028 3.81776C13.4062 3.73447 13.2681 3.76223 13.1577 3.79C13.0059 3.81777 10.6871 5.37264 6.1737 8.44073C5.51118 8.89886 4.91768 9.12099 4.37939 9.10711C3.78588 9.09322 2.65409 8.77392 1.79834 8.49626C0.763154 8.16308 -0.0649904 7.9826 0.00402163 7.39952C0.0454289 7.0941 0.459501 6.78868 1.23244 6.46938Z" fill="white"/>
</svg>Запустить Telegram-бот</a>
                                <div class="form-sub-info">
                                    <p><span>Важно!</span> Убедитесь, что вы указали корректный Telegram-никнейм. Именно на него прийдет сообщение о статусе участия.

                                        У вашего аккаунта должна быть открыта возможность получать сообщения от всех (проверьте настройки приватности).
                                        Никнейм вашего аккаунта должен точно совпадать с тем, что вы указали в анкете.</p>
                                </div>
									  <label>
                                    <p>6. Город проживания</p>
                                    <input type="text" name="city" value = "<?php echo $city?>" required>
                                </label>
									<div class = "contact-data-form-step-button">
										<p class = "back-btn-steps">
											Назад
										</p>
                                			<button type="submit" name="save_data">Сохранить и продолжить</button>
									</div>
								</div>
                            </form>
                        </div>
                       
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
<!-- Попап -->
<div class="popup_zoom" id="popup_zoom">
  <span class="close">&times;</span>
  <img class="popup-content" id="popup-img">
</div>

<div class = "bottom_mobile_menu">
	 <ul>
         <li><a href="/профиль/" class = "active"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i1-a.svg'?>" alt="">Контактные данные</a></li>
         <li><a href="/бриф/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i2.svg'?>" alt="">Регистрация к наставнику</a></li>
         <li><a href="/статус/"><img src="<?php echo get_template_directory_uri() . '/assets/images/acc/i3.svg'?>" alt="">Отследить статус заявки</a></li>
     </ul>
</div>


<!--

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
                    <h1>Меню</h1>
                    <ul>
						<?php if( have_rows('меню_подвал', 'option') ): ?>
    						<?php while( have_rows('меню_подвал', 'option') ): the_row(); ?>
        						 <li><a href = "<?php the_sub_field('ссылка')?>"><?php the_sub_field('название_пункта')?></a></li>
    						<?php endwhile; ?>
						<?php endif; ?>
                       
                    
                    </ul>
                    <h1>Реквизиты</h1>
                    <p><?php the_field('реквизиты', 'options')?></p>
                </div>
                <div class="footer_buttons">
                    <a class = "start_register">Личный кабинет</a>
                    <a href="https://t.me/pokoleniecare" target = "_blank">Служба заботы</a>
                </div>
            </div>
            <div class="footer_sub">
                <a href="#">Политика конфиденциальности</a>
                <a href="#">Регламент порядка работы АНО «Поколение»</a>
            </div>

        </div>
    </footer>
    


		<?php get_template_part( 'template-parts/template-user');?>




    <script src = "https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src = "<?php echo get_template_directory_uri() . '/assets/js/slick.min.js'?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>

    <script src = "<?php echo get_template_directory_uri() . '/assets/js/account.js'?>"></script>
<?php wp_footer(); ?>

</body>
</html>
