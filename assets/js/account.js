$(document).ready(function(){
	$(".mobile_filter_button").click(function(){
		$('.personal-sidebar').toggleClass('active');
	})
})

document.addEventListener("DOMContentLoaded", function () {
  const steps = document.querySelectorAll(".contact-data-form-step");
  const nextBtn = document.querySelector(".next-btn-steps");
  const backBtn = document.querySelector(".back-btn-steps");
  const consent1 = document.getElementById("consent-1");
  const consent2 = document.getElementById("consent-2");
  const consentError = document.getElementById("consent-error");

  // Проверяем, есть ли вообще шаги формы
  if (!steps.length) return;

  // Обработчик кнопки "Далее"
  if (nextBtn) {
    nextBtn.addEventListener("click", function () {
      // Если нет чекбоксов — просто переходим дальше
      if (!consent1 && !consent2) {
        steps[0].style.display = "none";
        if (steps[1]) steps[1].style.display = "block";
        return;
      }

      // Проверяем, что оба чекбокса есть и отмечены
      const isConsent1Ok = consent1 ? consent1.checked : true;
      const isConsent2Ok = consent2 ? consent2.checked : true;

      if (isConsent1Ok && isConsent2Ok) {
        if (consentError) consentError.style.display = "none";
        steps[0].style.display = "none";
        if (steps[1]) steps[1].style.display = "block";
      } else {
        if (consentError) consentError.style.display = "block";
      }
    });
  }

  // Обработчик кнопки "Назад"
  if (backBtn) {
    backBtn.addEventListener("click", function () {
      if (steps[1]) steps[1].style.display = "none";
      if (steps[0]) steps[0].style.display = "block";
    });
  }
});
















// ==================== ПАСПОРТ ОПЕКУНА ====================
const fileInput   = document.getElementById('passport-file');
const uploadBtn   = document.getElementById('upload-btn');
const replaceBtn  = document.getElementById('replace-btn');
const removeBtn   = document.getElementById('remove-btn');
const preview     = document.querySelector('.preview');
const previewImg  = document.getElementById('preview-img');
const zoomBtn     = document.getElementById('zoom-btn');
const popupZoom   = document.getElementById('popup_zoom');
const popupImg    = document.getElementById('popup-img');
const popupClose  = popupZoom ? popupZoom.querySelector('.close') : null;
const deleteField = document.getElementById('passport-file-delete');

// Сбрасываем флаг удаления при загрузке страницы
if (deleteField) deleteField.value = '0';

if (fileInput) {
  // Открыть файловый диалог
  if (uploadBtn) uploadBtn.addEventListener('click', () => fileInput.click());
  if (replaceBtn) replaceBtn.addEventListener('click', () => fileInput.click());

  // При выборе файла
  fileInput.addEventListener('change', () => {
    const file = fileInput.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        if (previewImg) previewImg.src = e.target.result;
        if (preview) preview.style.display = 'block';
        if (uploadBtn) uploadBtn.style.display = 'none';
        if (replaceBtn) replaceBtn.style.display = 'inline-block';
        if (removeBtn) removeBtn.style.display = 'inline-block';
        if (deleteField) deleteField.value = '0'; // не удаляем
      };
      reader.readAsDataURL(file);
    }
  });

  // Удалить файл
  if (removeBtn) {
    removeBtn.addEventListener('click', () => {
      fileInput.value = '';
      if (previewImg) previewImg.src = '';
      if (preview) preview.style.display = 'none';
      if (uploadBtn) uploadBtn.style.display = 'inline-block';
      if (replaceBtn) replaceBtn.style.display = 'none';
      removeBtn.style.display = 'none';
      if (deleteField) deleteField.value = '1'; // флаг удаления
    });
  }

  // Zoom
  if (zoomBtn && popupZoom && popupImg) {
    zoomBtn.addEventListener('click', () => {
      popupZoom.style.display = 'block';
      popupImg.src = previewImg ? previewImg.src : '';
    });
  }

  // Закрыть попап
  if (popupClose && popupZoom) {
    popupClose.addEventListener('click', () => popupZoom.style.display = 'none');
    popupZoom.addEventListener('click', e => {
      if (e.target === popupZoom) popupZoom.style.display = 'none';
    });
  }
}



// ==================== ПАСПОРТ / СВИДЕТЕЛЬСТВО РЕБЁНКА ====================

// Всё в отдельном блоке, чтобы ничего не ломалось, если этих элементов нет
(() => {
  const fileInput2   = document.getElementById('passport-reg-file');
  if (!fileInput2) return; // <-- если поля вообще нет — просто выходим

  const uploadBtn2   = document.getElementById('upload-btn-reg');
  const replaceBtn2  = document.getElementById('replace-btn-reg');
  const removeBtn2   = document.getElementById('remove-btn-reg');
  const previewImg2  = document.getElementById('preview-img-reg');
  const preview2     = previewImg2 ? previewImg2.closest('.preview') : null;
  const zoomBtn2     = document.getElementById('zoom-btn-reg');
  const deleteField2 = document.getElementById('passport-reg-file-delete');

  // Сбрасываем флаг удаления при загрузке страницы
  if (deleteField2) deleteField2.value = '0';

  // Кнопки выбора файла
  if (uploadBtn2) uploadBtn2.addEventListener('click', () => fileInput2.click());
  if (replaceBtn2) replaceBtn2.addEventListener('click', () => fileInput2.click());

  // При выборе нового файла
  fileInput2.addEventListener('change', () => {
    const file = fileInput2.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = e => {
        if (previewImg2) previewImg2.src = e.target.result;
        if (preview2) preview2.style.display = 'block';
        if (uploadBtn2) uploadBtn2.style.display = 'none';
        if (replaceBtn2) replaceBtn2.style.display = 'inline-block';
        if (removeBtn2) removeBtn2.style.display = 'inline-block';
        if (deleteField2) deleteField2.value = '0';
      };
      reader.readAsDataURL(file);
    }
  });

  // Удалить файл
  if (removeBtn2) {
    removeBtn2.addEventListener('click', () => {
      fileInput2.value = '';
      if (previewImg2) previewImg2.src = '';
      if (preview2) preview2.style.display = 'none';
      if (uploadBtn2) uploadBtn2.style.display = 'inline-block';
      if (replaceBtn2) replaceBtn2.style.display = 'none';
      removeBtn2.style.display = 'none';
      if (deleteField2) deleteField2.value = '1';
    });
  }

  // Zoom
  if (zoomBtn2 && popupZoom && popupImg) {
    zoomBtn2.addEventListener('click', () => {
      popupZoom.style.display = 'block';
      popupImg.src = previewImg2 ? previewImg2.src : '';
    });
  }
})();





$(document).ready(function(){
  // Маска на дату
  $('#date').inputmask('99.99.9999', { placeholder: 'дд.мм.гггг' });
 // Маска телефона (+7 (999) 999-99-99)
  $("input[name='phone']").inputmask("+7 (999) 999-99-99", {
    clearIncomplete: true
  });
	$("input[name='guardian_phone']").inputmask("+7 (999) 999-99-99", {
    clearIncomplete: true
  });
  // Проверка даты при потере фокуса
  $('#date').on('blur', function(){
    const val = $(this).val();
    const errorSpan = $('#date-error');

    if (!isValidDate(val)) {
      errorSpan.show();
      $(this).addClass('error');
    } else {
      errorSpan.hide();
      $(this).removeClass('error');
    }
  });

	
  // Функция проверки валидности
  function isValidDate(dateString) {
    if (!/^\d{2}\.\d{2}\.\d{4}$/.test(dateString)) return false;

    const parts = dateString.split(".");
    const day = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10) - 1; // месяцы от 0
    const year = parseInt(parts[2], 10);

    const date = new Date(year, month, day);

    return (
      date.getFullYear() === year &&
      date.getMonth() === month &&
      date.getDate() === day
    );
  }
});

jQuery(function($){
  $("input[name='telegram']").inputmask({
    mask: "@*{1,}", 
    definitions: {
      "*": {
        validator: "[A-Za-z0-9._-]", // допустимые символы
        cardinality: 1,
        casing: "lower"
      }
    },
    greedy: false,          // позволяет вводить сколько угодно символов
    placeholder: "",
    showMaskOnHover: false,
    showMaskOnFocus: false
  });
});



