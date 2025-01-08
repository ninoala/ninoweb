document.addEventListener('DOMContentLoaded', function() {
  const serviceButtons = document.querySelectorAll('.service-card');
  const popup = document.getElementById('popup');
  const popupClose = document.querySelector('.popup__close');
  const popupThumbnail = document.querySelector('.popup__thumbnail');
  const popupTitle = document.querySelector('.popup__title');
  const popupText = document.querySelector('.popup__text');
  const popupLink = document.querySelector('.popup__link');

  function openPopupWithData(postId) {
    fetch(custom_data.ajaxurl, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: new URLSearchParams({
        action: 'fetch_service_post',
        post_id: postId,
        nonce: custom_data.nonce
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        if (popupThumbnail && popupTitle && popupText && popupLink) {
          popupThumbnail.src = data.data.featured_image_url;
          popupTitle.innerText = data.data.title;
          popupText.innerHTML = data.data.content;
          popupLink.href = data.data.link;
          
          popup.classList.add('visible');
          document.body.classList.add('no-scroll');
        } else {
          console.error('Popup elements not found');
        }
      } else {
        console.error(data.data); // Log the error message
      }
    })
    .catch(error => console.error('Error fetching data:', error));
  }

  serviceButtons.forEach(button => {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      const postId = this.getAttribute('data-id');
      openPopupWithData(postId);
    });
  });

  if (popupClose) {
    popupClose.addEventListener('click', function(event) {
      event.preventDefault();
      popup.classList.remove('visible');
      document.body.classList.remove('no-scroll');
    });
  } else {
    console.error('Popup close button not found');
  }

  popup.addEventListener('click', function(event) {
    if (event.target === popup) {
      popup.classList.remove('visible');
      document.body.classList.remove('no-scroll');
    }
  });
});
