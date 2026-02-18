document.addEventListener('DOMContentLoaded', function() {

  // ==============================
  // === ВЫБОР НАСТАВНИКА (ШАГ 1)
  // ==============================
  const coaches = document.querySelectorAll('.brief-content-coaches-list-item');
  const nextBtn = document.querySelector('.brief-container .brief-buttons p.next-button');

  coaches.forEach(coach => {
    const selectBtn = coach.querySelector('.choose-trainer');
    const radio = coach.querySelector('input[type="radio"]');

    selectBtn.addEventListener('click', () => {
      const isChosen = coach.classList.contains('choose');

      // Сбрасываем все карточки
      coaches.forEach(c => {
        c.classList.remove('choose', 'hide');
        c.querySelector('input[type="radio"]').checked = false;
      });

      if (!isChosen) {
        coach.classList.add('choose');
        coaches.forEach(c => {
          if (c !== coach) c.classList.add('hide');
        });
        radio.checked = true;
        nextBtn.classList.add('active');
      } else {
        nextBtn.classList.remove('active');
      }
    });
  });


  // ==============================
  // === УПРАВЛЕНИЕ ШАГАМИ ФОРМЫ
  // ==============================
  const steps = document.querySelectorAll('#brief-form .step');
  const prevBtn = document.getElementById('prev-btn');
  const nextBtnMain = document.getElementById('next-btn');
  const backToFirstBtn = document.querySelector('.back_submit_brief'); // ✅ новая кнопка
  const briefButtons = document.querySelector('.brief-buttons');
  let currentStep = 0;

  function updateNextButtonState() {
    nextBtnMain.classList.remove('active');

    if (currentStep === 0) {
      const chosenCoach = document.querySelector('.brief-content-coaches-list-item.choose');
      if (chosenCoach) nextBtnMain.classList.add('active');
    } else if (currentStep === 2) {
      nextBtnMain.classList.add('active');
    } else {
      const field = steps[currentStep].querySelector(
        `textarea[name="question_${currentStep + 1}"], input[name="question_${currentStep + 1}"]`
      );
      if (field && field.value.trim() !== '') {
        nextBtnMain.classList.add('active');
      }
    }
  }

  // Навешиваем слушатели на все текстовые поля
  document.querySelectorAll('#brief-form textarea[name^="question_"], #brief-form input[name^="question_"]').forEach(field => {
    field.addEventListener('input', () => {
      updateNextButtonState();
    });
  });

  // Функция показа шага
  function showStep(index) {
    steps.forEach((step, i) => {
      step.style.display = (i === index) ? 'block' : 'none';
    });

    prevBtn.style.display = (index === 0) ? 'none' : 'inline-block';
    briefButtons.style.display = (index === steps.length - 1) ? 'none' : 'flex';

    currentStep = index;
    updateNextButtonState();
  }

  // Кнопки "Назад" / "Далее"
  /*
  prevBtn.addEventListener('click', () => {
    if (currentStep > 0) showStep(currentStep - 1);
  });

  nextBtnMain.addEventListener('click', () => {
    if (currentStep < steps.length - 1) showStep(currentStep + 1);
  });

  // ✅ Новая кнопка: "Назад к первому шагу"
  if (backToFirstBtn) {
    backToFirstBtn.addEventListener('click', () => {
      showStep(0);
      window.scrollTo({ top: 0, behavior: 'smooth' }); // красиво прокрутить вверх
    });
  }

  // Показ первого шага
  showStep(currentStep);
*/

  // ==============================
  // === КАСТОМНЫЙ SELECT
  // ==============================
  const trigger = document.querySelector('.custom-select-trigger');
  const options = document.querySelector('.custom-options');
  const hiddenInput = document.getElementById('question_3');

  if (trigger && options && hiddenInput) {
    trigger.addEventListener('click', () => {
      options.style.display = (options.style.display === 'flex') ? 'none' : 'flex';
    });

    document.querySelectorAll('.custom-option').forEach(option => {
      option.addEventListener('click', () => {
        trigger.textContent = option.textContent;
        hiddenInput.value = option.dataset.value;
        options.style.display = 'none';
        updateNextButtonState();
      });
    });

    document.addEventListener('click', e => {
      if (!e.target.closest('.custom-select-wrapper')) {
        options.style.display = 'none';
      }
    });
  }
});





document.querySelectorAll('textarea').forEach(textarea => {
    const max = textarea.getAttribute('maxlength') || 1000; 
    const counter = textarea.nextElementSibling; 
    if (!counter) return;

    let typingTimer;
    const doneTypingInterval = 1000; // 1 секунда пауза после ввода

    function updateLength() {
        const len = textarea.value.length;
        // Показываем только количество символов сразу
        counter.textContent = `${len} из ${max}`;
        counter.style.color = ''; // по умолчанию черный
    }

    function updateMessage() {
        const len = textarea.value.length;
        let msg = '';
        let color = '';

        if (len < 300) {
            msg = 'Советуем сделать ответ более содержательным. Это повысит шансы для прохождения в проект.';
            color = 'red';
        } else if (len >= 300 && len <= 800) {
            msg = 'Советуем еще чуть-чуть дополнить ответ.';
            color = 'orange';
        } else {
            msg = 'Вы развернуто ответили на вопрос.';
            color = 'green';
        }

        counter.textContent = `${len} из ${max} — ${msg}`;
        counter.style.color = color;
    }

    textarea.addEventListener('input', () => {
        updateLength(); // обновляем счетчик сразу
        clearTimeout(typingTimer);
        typingTimer = setTimeout(updateMessage, doneTypingInterval); // сообщение через паузу
    });

    // Инициализация при загрузке страницы
    updateLength();
});


document.addEventListener("DOMContentLoaded", function () {
  const fields = document.querySelectorAll("input, textarea");

  fields.forEach(field => {
    const key = "draft_" + (field.name || field.id);

    // Восстановить, если есть в sessionStorage
    if (sessionStorage.getItem(key)) {
      field.value = sessionStorage.getItem(key);
    }

    // Сохраняем при вводе
    field.addEventListener("input", function () {
      sessionStorage.setItem(key, field.value);
    });
  });

  // Очистить все drafts при уходе со страницы
  window.addEventListener("beforeunload", function () {
    fields.forEach(field => {
      const key = "draft_" + (field.name || field.id);
      sessionStorage.removeItem(key);
    });
  });
});


document.querySelectorAll('#brief-form input[name], #brief-form textarea[name]').forEach(field => {

  const key = 'brief_' + field.name;

  // Восстановление при загрузке
  if (localStorage.getItem(key)) {
    field.value = localStorage.getItem(key);
  }

  // Сохранение при вводе
  field.addEventListener('input', () => {
    localStorage.setItem(key, field.value);
  });

});
