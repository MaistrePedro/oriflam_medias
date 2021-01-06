const axios = require('axios');

let baseUrl = '';
const baseUrlElement = document.getElementById('base-url');

if (baseUrlElement) baseUrl = baseUrlElement.value;

const main = () => {
  const showStatus = (form, data) => {
    const statusElement = document.createElement('span');
    statusElement.innerText = data.info;
    statusElement.classList.add('form-status', `form-status--${data.success ? 'success' : 'fail'}`, 'col-12');
    
    form.parentNode.append(statusElement);
  };
  
  const addToCart = async (e) => {
    e.preventDefault();
    console.log(baseUrl);
    let option = null;
    let product = null;
    let data = {
      info: 'L\'article n\'a pas pu être ajouté au panier',
      success: false,
    };
    const { currentTarget } = e;
  
    const optionElement = currentTarget.querySelector('.options-select');
    const productIdElement = currentTarget.querySelector('.product-id');

    if (optionElement !== null && optionElement !== undefined) option = optionElement.value;
    if (productIdElement !== null && productIdElement !== undefined) product = productIdElement.value;
  
    await axios.post(`${baseUrl}/api/add-to-cart`, {
      option,
      product,
    })
      .then((response) => {
        if (response.hasOwnProperty('data')) {
          data = response.data;
        }
      })
      .catch((error) => {
        if (error.hasOwnProperty('response') && error.response !== undefined && error.response.hasOwnProperty('data')) {
          data.info = error.response.data.info;
        }
      });
        
    showStatus(currentTarget, data);
  };

  const addToCartForms = document.querySelectorAll('.add-to-cart');
  console.log(addToCartForms);
  addToCartForms.forEach((form) => form.addEventListener('submit', addToCart));
};

document.addEventListener('DOMContentLoaded', main);
