$('.quiz_popup_open').on('click', function () {
    $('.modal_quiz').addClass('active');
});

$('.background_modal_quiz').on('click', function(){
$('.modal_quiz').removeClass('active');
});
	




document.addEventListener('DOMContentLoaded', function() {
  const selects = document.querySelectorAll('.quiz-custom_select');

  selects.forEach(select => {
    const selected = select.querySelector('.quiz-custom_select_selected');
    const optionsContainer = select.querySelector('.quiz-custom_select_options');
    const hiddenInput = select.querySelector('input[type="hidden"]');

    selected.addEventListener('click', (e) => {
      e.stopPropagation(); // Останавливаем всплытие, чтобы document click не закрывал сразу
      select.classList.toggle('active');
    });

    select.querySelectorAll('.quiz-custom_select_option').forEach(option => {
      option.addEventListener('click', (e) => {
        e.stopPropagation();
        selected.textContent = option.textContent;
        hiddenInput.value = option.textContent;
        select.classList.remove('active');
      });
    });
  });

  // Закрываем все селекты при клике вне
  document.addEventListener('click', () => {
    selects.forEach(select => select.classList.remove('active'));
  });
});



/*

document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('quiz_form');

  form.addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(form);
    formData.append('action', 'send_quiz_form');

    const response = await fetch(quiz_ajax.ajax_url, {
  		method: 'POST',
  		body: formData
	});

    const result = await response.json();

    if (result.success) {
      alert('Спасибо! Ваша анкета успешно отправлена.');
	  $('.modal_quiz').removeClass('active');
      form.reset();
    } else {
      //alert('Ошибка: ' + (result.data?.message || 'Не удалось отправить.'));
    }
  });
});
*/

document.addEventListener('DOMContentLoaded', function() {
  const questions = document.querySelectorAll('.quiz_questions .quiz_question');
  const backBtn = document.querySelector('.modal_quiz_navigations p:first-child');
  const nextBtn = document.querySelector('.modal_quiz_navigations p:last-child');
  let currentStep = 0;

  function showStep(index) {
    questions.forEach((q, i) => {
      q.style.display = (i === index) ? 'block' : 'none';
    });

    // Управляем видимостью кнопок
    if (index === 0) {
      backBtn.style.display = 'none';
      nextBtn.style.display = 'block';
    } else if (index === questions.length - 1) {
      backBtn.style.display = 'block';
      nextBtn.style.display = 'none';
    } else {
      backBtn.style.display = 'block';
      nextBtn.style.display = 'block';
    }
  }

  // Показ первого вопроса
  showStep(currentStep);

  nextBtn.addEventListener('click', () => {
    if (currentStep < questions.length - 1) {
      currentStep++;
      showStep(currentStep);
    }
  });

  backBtn.addEventListener('click', () => {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  });
});

