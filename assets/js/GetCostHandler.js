const getCostHandler = () => {
  const setPrice = (form, price) => {
    const priceElement = form.querySelector('.price');
    priceElement.innerHTML = `${price} € HT`;
  };

  const getPrice = (e) => {
    const { currentTarget } = e;
    const form = currentTarget;
    const optionSelectElement = currentTarget.querySelector('.options-select');
    const selectedOption = optionSelectElement.options[optionSelectElement.selectedIndex];
    const price = selectedOption.getAttribute('data-price');

    setPrice(form, price)
  };

  const optionsSelectForms = document.querySelectorAll('.add-to-cart');
  optionsSelectForms.forEach((select) => select.addEventListener('change', getPrice))
};

document.addEventListener('DOMContentLoaded', getCostHandler)