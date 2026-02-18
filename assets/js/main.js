$('.section2_slider').slick({
    slidesToShow: 1.6,
    slidesToScroll: 1,
    speed: 600,
    dots: false,
	infinite: false,
  	centerMode: false,
   	responsive: [
    {
      breakpoint: 768,
        settings: "unslick",
	}
  ]
})


$(document).ready(function(){
  $(".ac_reg_button").click(function(){
    if ($(".start").is(":visible")) {
      $(".start").fadeOut(300, function(){
        $(".continue").fadeIn(300);
      });
    } else {
      $(".continue").fadeOut(300, function(){
        $(".start").fadeIn(300);
      });
    }
  });
});

$('.section4-logos-slider').slick({
   
    arrows: false,
    slidesToShow:7,
	autoplay:true,     
  	autoplaySpeed: 0,          
    slidesToScroll: 1,    
  	speed: 100000,             
  	cssEase: 'linear',        
  	infinite: true,          
  	pauseOnHover: true, 
    responsive: [
      {
       
        breakpoint: 1300,
        settings:{
          slidesToShow: 6,
        },
		   breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
  	      speed: 10000,       
        },
      }
    ]
    
})


$('.section7-slider').slick({
    arrows: false,
    //slidesToShow:4.2,
	variableWidth: true,
	autoplay:true,     
  	autoplaySpeed: 0,          
    slidesToScroll: 1,    
  	speed: 50000,             
  	cssEase: 'linear',        
  	infinite: true,          
  	pauseOnHover: true, 
    responsive: [
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
  			speed: 10000,        
        }
      }
    ]
    
})


var $slider = $('.section-students-slider-slider');

function updateCoverflowClasses(slick) {
    $slider.find('.slick-slide').removeClass('before after current');

    var slickObj = slick || $slider.slick('getSlick');
    var currentIndex = slickObj.currentSlide;
    var slideCount = slickObj.slideCount;

    // центральный
    $slider.find('.slick-slide[data-slick-index="' + currentIndex + '"]').addClass('current');

    // 3 предыдущих
    for (let i = 1; i <= 3; i++) {
        let prevIndex = (currentIndex - i + slideCount) % slideCount;
        $slider.find('.slick-slide[data-slick-index="' + prevIndex + '"]').addClass('before');
    }

    // 3 следующих
    for (let i = 1; i <= 3; i++) {
        let nextIndex = (currentIndex + i) % slideCount;
        $slider.find('.slick-slide[data-slick-index="' + nextIndex + '"]').addClass('after');
    }
}

// init
$slider.on('init setPosition afterChange', function(event, slick){
    updateCoverflowClasses(slick);
});

// инициализация
$slider.slick({
    arrows: true,
    dots: true,
    infinite: true,
    centerMode: true,
    slidesToShow: 5,
	responsive:[
		{
			breakpoint:768,
			settings:{
				slidesToShow:1
			}
		}
	]
});


$('.coaches-person-slider').slick({
 
  slidesToShow:5,
  infinite:true,
  speed: 600,
  responsive: [
	 
	  {
	  	 breakpoint: 1500,
		  settings:{
			   slidesToShow:4,
		  }

	  },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }
  ]
})

$('.journal-materials-slider').slick({
 
arrows: true,
  slidesToShow:3,
  responsive: [
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
      }
    }
  ]
  
})


$('.students_slider').slick({
  slidesToShow:1,
  slidesToScroll: 1,
  infinite:true,
  autoplay:true,   
  arrows:false,
  fade: true,
  speed: 600,
  cssEase: 'linear'
  
})


$('.mobile-burger').on('click',function(){
    $('.mobile-menu, .mobile-burger').toggleClass("active");
  });

$('.coaches_sidebar .coaches-filter h1').on('click',function(){
    $('.coaches_sidebar .coaches-filter h1').toggleClass("active");
    $('.coaches_filter_form').toggleClass("active");
  });



$('.video-button').on('click',function(){
    $('.coach_video_popup').toggleClass("active");
  });

$('.coach_video_popup_background').on('click',function(){
    $('.coach_video_popup').toggleClass("active");
  });


$('.journal-sidebar-filter').on('click',function(){
    $('.journal-sidebar-filter, .journal-sidebar').toggleClass("active");
  });



jQuery(document).ready(function ($) {
  // Кастомный select
  $(".select-wrapper").each(function () {
    const wrapper = $(this);
    const customSelect = wrapper.find(".custom-select");
    const trigger = customSelect.find(".select-trigger");
    const options = customSelect.find(".options li");
    const realSelect = wrapper.find("select");

    // открыть/закрыть селект
    trigger.on("click", function () {
      $(".custom-select").not(customSelect).removeClass("open"); // закрыть другие
      customSelect.toggleClass("open");
    });

    // выбор опции
    options.on("click", function () {
      const value = $(this).data("value");
      const text = $(this).text();

      trigger.text(text);
      realSelect.val(value);
      options.removeClass("selected");
      $(this).addClass("selected");
      customSelect.removeClass("open");
    });
  });

  // Закрыть селекты при клике вне
  $(document).on("click", function (e) {
    if (!$(e.target).closest(".custom-select").length) {
      $(".custom-select").removeClass("open");
    }
  });

  // Клик по кнопке "Применить"
  $(".coaches_filter_form button").on("click", function (e) {
    e.preventDefault();

    let filters = {};
    if ($("#real-select").val()) filters.is_open = $("#real-select").val();
    if ($("#real-select2").val()) filters.region = $("#real-select2").val();
    if ($("#real-select3").val()) filters.age_peoples = $("#real-select3").val();
    if ($("#real-select4").val()) filters.format = $("#real-select4").val();

    $.ajax({
      url: my_ajax.url,
      type: "POST",
      data: {
        action: "filter_coaches",
        filters: filters
      },
      beforeSend: function () {
        $(".coaches_list_flex").addClass("loading");
      },
      success: function (data) {
        $(".coaches_list_flex").html(data).removeClass("loading");
      }
    });
  });
});



const smoothLinks_to = document.querySelectorAll('a[href^="#"]');

for (let smoothLink of smoothLinks_to) {
    smoothLink.addEventListener('click', function (e) {
        e.preventDefault();
        const id = smoothLink.getAttribute('href');

        // Проверяем, что id не пустой и не просто #
        if (id && id !== '#') {
            const target = document.querySelector(id);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
    });
}


const questions = document.querySelectorAll('.section-faq .question');

questions.forEach(q => {
  q.addEventListener('click', () => {
    const answer = q.querySelector('.question-answer');
    const isOpen = q.classList.contains('active');

    // закрыть все
    questions.forEach(el => {
      el.classList.remove('active');
      el.querySelector('.question-answer').style.maxHeight = null;
    });

    // открыть выбранный
    if (!isOpen) {
      q.classList.add('active');
      answer.style.maxHeight = answer.scrollHeight + 'px';
    }
  });
});
  //faq end
$(document).ready(function(){

    // Открытие формы восстановления
    $('.forgot-pass').on('click', function(){
        $('.popup-registration.sign-in').hide();
        $('.popup-registration.pass1').show();
    });

    // Закрытие попапа
    $('.popup-content-close, .popup-background').on('click', function(){
        $(this).closest('.popup-registration').hide();
    });

    // === AJAX отправка формы восстановления ===
    $('#forgotPassForm').on('submit', function(e){
        e.preventDefault();

        let email = $('#forgot_email').val();
        let form = $(this);

        if(!email){
            alert('Введите email');
            return;
        }

        $.post(myData.ajaxurl, {
            action: 'forgot_password',
            email: email
        }, function(response){
            if(response.success){
                // скрываем первый шаг
                $('.popup-registration.pass1').hide();
                // показываем шаг 2 с сообщением
                $('.popup-registration.pass2').show();
            } else {
                // показываем ошибку в форме
                if(!form.find('.error-message').length){
                    form.append('<p class="error-message" style="color:red;">'+response.data.message+'</p>');
                } else {
                    form.find('.error-message').text(response.data.message).show();
                }
            }
        });
    });
});

// === 1. Открытие popup_counter ===
(() => {
  const itemCounters = document.querySelectorAll('.item_counter');
  const popups = document.querySelectorAll('.popup_counter');

  itemCounters.forEach((item, index) => {
    item.addEventListener('click', () => {
      popups.forEach(p => p.classList.remove('active'));
      if (popups[index]) popups[index].classList.add('active');
    });
  });

  $('.testimonials-item-popup-background').on('click', function () {
    $('.popup_counter').removeClass('active');
  });
})();


// === 2. Открытие popup_review_slider ===
(() => {
  const bgPlays = document.querySelectorAll('.background-play');
 (() => {
  const bgPlays = document.querySelectorAll('.background-play');

  bgPlays.forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.review;

      document
        .querySelectorAll('.popup_review_slider')
        .forEach(p => p.classList.remove('active'));

      const popup = document.querySelector(
        `.popup_review_slider[data-review="${id}"]`
      );

      if (popup) popup.classList.add('active');
    });
  });

  $('.popup_review_slider_back').on('click', function () {
    $('.popup_review_slider').removeClass('active');
  });
})();


  $('.popup_review_slider_back').on('click', function () {
    $('.popup_review_slider').removeClass('active');
  });
})();




 $('.almost-button').on('click', function () {
    $('.almost_popup').addClass('active');
});



const tgButton = document.getElementById('almost_tg');

if (tgButton) {
    tgButton.addEventListener('click', function(e) {
        // Открываем Telegram сразу при клике
        window.open('https://t.me/Pokolenez_bot', '_blank');
        // AJAX пойдет после этого
    });
}





jQuery(function($){

    function loadCoaches(page = 1){
        const filters = {
            is_open: $('#real-select').val(),
            region: $('#real-select2').val(),
            age_peoples: $('#real-select3').val(),
            format: $('#real-select4').val(),
            paged: page
        };

        $.post(my_ajax.url, {action: 'filter_coaches', filters: filters}, function(response){
            $('#coaches_container').html(response);
            $('.pagination_default').fadeOut(); // скрываем старую пагинацию
        });
    }

    // Применение фильтров
    $('.apply-filters').on('click', function(){
        loadCoaches();
    });

    // AJAX пагинация
  $(document).on('click', '.pagination a', function(e){
    e.preventDefault();

    const href = $(this).attr('href');
    let page = 1;

    let match = href.match(/paged=(\d+)/);
    if (match) {
        page = parseInt(match[1]);
    } else {
        match = href.match(/\/page\/(\d+)/);
        if (match) {
            page = parseInt(match[1]);
        }
    }

    loadCoaches(page);
});


});