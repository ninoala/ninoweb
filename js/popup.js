document.addEventListener('DOMContentLoaded', function () {
  const popup = document.getElementById('popup-contact-form');
  const triggers = document.querySelectorAll('.open-popup');
  const closePopup = document.querySelector('.close-popup');

  if (popup && triggers.length > 0) {
    triggers.forEach(trigger => {
      trigger.addEventListener('click', function (e) {
        e.preventDefault();
        popup.style.display = 'block';
        document.body.classList.add('no-scroll');
      });
    });

    if (closePopup) {
      closePopup.addEventListener('click', function (e) {
        e.preventDefault();
        popup.style.display = 'none';
        document.body.classList.remove('no-scroll');
      });

      window.addEventListener('click', function (e) {
        if (e.target === popup) {
          popup.style.display = 'none';
          document.body.classList.remove('no-scroll');
        }
      });
    } else {
      console.error('Close popup element not found.');
    }
} else {
  console.error('Popup or trigger elements not found.');
}
});
