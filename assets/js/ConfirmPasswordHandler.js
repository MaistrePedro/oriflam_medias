const confirmPassword = () => {
  const passwordInput = document.querySelector('#user_password');
  const passwordConfirmInput = document.querySelector('#user_confirmPassword');
  const showConfirm = (status) => {
    const passwordPart = document.querySelector('.password-form');
    const submitButton = document.querySelector('.signup-submit')
    const statusSpan = document.querySelector('.password-status');
    
    if (statusSpan) {
      statusSpan.innerText = '';
      if (status === 'success') {
        statusSpan.classList.remove('password--error');
        statusSpan.classList.add('password--success');
        submitButton.disabled = false;
        statusSpan.innerText = `Les deux mots de passe enregistrés sont les mêmes, vous pouvez continuer.`;
      }
      else {
        statusSpan.classList.add('password--error');
        statusSpan.classList.remove('password--success');
        submitButton.disabled = true;
        statusSpan.innerText = `Les deux mots de passe doivent être les mêmes.`;
      }
    }
    else {
      const statusElement = document.createElement('span');
      statusElement.classList.add(`password-status`, `password--${status}`);
      if (status === 'success') {
        submitButton.disabled = false;
        statusElement.innerText = `Les deux mots de passe enregistrés sont les mêmes, vous pouvez continuer.`;
      }
      else {
        submitButton.disabled = true;
        statusElement.innerText = `Les deux mots de passe doivent être les mêmes.`;
      }
      passwordPart.append(statusElement);
    }
  }
  
  const checkPasswords = () => {

    const password = passwordInput.value;
    const passwordConfirm = passwordConfirmInput.value;
    if (password == passwordConfirm) {
      showConfirm('success');
    }
    else {
      showConfirm('error')
    }
  };

  console.log(passwordConfirmInput);

  passwordInput.addEventListener('change', checkPasswords);
  passwordConfirmInput.addEventListener('change', checkPasswords);
}

document.addEventListener('DOMContentLoaded', confirmPassword);