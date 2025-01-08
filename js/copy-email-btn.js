document.getElementById('copyEmailBtn').addEventListener('click', function() {
  var email = this.getAttribute('data-email');
  var tempInput = document.createElement('input');
  tempInput.value = email;
  document.body.appendChild(tempInput);
  tempInput.select();
  document.execCommand('copy');
  document.body.removeChild(tempInput);
  this.textContent = 'EMAIL COPIED!';
  this.classList.add('copied');
  setTimeout(() => {
    this.textContent = 'CONTACT US';
    this.classList.remove('copied');
  }, 2000);
});