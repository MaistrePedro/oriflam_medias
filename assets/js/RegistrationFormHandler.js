const changeForm = () => {
  const individualElement = document.querySelector('.individual');
  const professionalElement = document.querySelector('.professional');
  const typeForm = document.querySelector('#registration_form_type');
  const typeRadios = typeForm.querySelectorAll('input');
  const individualForms = individualElement.querySelectorAll('input');
  const professionalForms = professionalElement.querySelectorAll('input');
  console.log(typeForm);

  const typeHandle = (e) => {
    const type = e.currentTarget.value.toLowerCase();
    console.log(type);
    switch (type) {
      case 'individual':
        individualElement.classList.remove('d-none');
        professionalElement.classList.add('d-none');
        individualForms.forEach(function (form) {
          form.required = true;
        });
        professionalForms.forEach(function (form) {
          form.required = false;
        });
        break;
      case 'professional':
        professionalElement.classList.remove('d-none');
        individualElement.classList.add('d-none');
        professionalForms.forEach(function (form) {
          form.required = true;
        });
        individualForms.forEach(function (form) {
          form.required = false;
        });
        break;
      default:
        break;
    }
  }

  typeRadios.forEach(function (typeRadio) {
    typeRadio.addEventListener('change', typeHandle);
  });
}

document.addEventListener('DOMContentLoaded', changeForm);