$('.quiz_popup_open').on('click', function () {
    $('.modal_quiz').addClass('active');
});

$('.background_modal_quiz').on('click', function(){
$('.modal_quiz').removeClass('active');
});

// Stage 1: Create AmoCRM lead when Telegram field is filled
$(document).ready(function() {
    let leadCreationInProgress = false;
    
    // Check if lead_id exists in sessionStorage on page load
    const storedLeadId = sessionStorage.getItem('quiz_amo_lead_id');
    if (storedLeadId) {
        $('#amo_lead_id').val(storedLeadId);
    }
    
    $('input[name="quiz_q4"]').on('blur', function() {
        const telegram = $(this).val().trim();
        
        // Skip if empty or lead already created
        if (!telegram || $('#amo_lead_id').val() || leadCreationInProgress) {
            return;
        }
        
        leadCreationInProgress = true;
        
        // Collect Stage 1 data (q1-q4 only, phone not available yet)
        const formData = {
            action: 'create_initial_lead',
            quiz_q1: $('input[name="quiz_q1"]').val(),
            quiz_q2: $('input[name="quiz_q2"]').val(),
            quiz_q3: $('input[name="quiz_q3"]').val(),
            quiz_q4: telegram
        };
        
        $.ajax({
            url: quiz_ajax.ajax_url,
            type: 'POST',
            data: formData,
            success: function(response) {
                leadCreationInProgress = false;
                
                if (response.success && response.data.lead_id) {
                    // Store lead_id in hidden field and sessionStorage
                    $('#amo_lead_id').val(response.data.lead_id);
                    sessionStorage.setItem('quiz_amo_lead_id', response.data.lead_id);
                    console.log('AmoCRM lead created:', response.data.lead_id);
                }
            },
            error: function(xhr, status, error) {
                leadCreationInProgress = false;
                console.error('Error creating AmoCRM lead:', error);
            }
        });
    });
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

