const axios = require('axios');

let baseUrl = '';
const baseUrlElement = document.getElementById('base-url');

if (baseUrlElement) baseUrl = baseUrlElement.value;

const main = () => {
  const showStatus = (form, { info, success }) => {
    const statusElement = document.createElement('span');
    statusElement.innerText = info;
    statusElement.classList.add('form-status', `form-status--${success ? 'success' : 'fail'}`);
  
    form.append(statusElement);
  };
  
  const addToCart = async (e) => {
    e.preventDefault();
    let option = null;
    let product = null;
    let data = {
      info: 'L\'article n\'a pas pu être ajouté au panier',
      success: false,
    };
    const { currentTarget } = e;
  
    const optionElement = currentTarget.querySelector('.option');
    const productIdElement = currentTarget.querySelector('.product-id');

    if (optionElement !== null && optionElement !== undefined) option = optionElement.value;
    if (productIdElement !== null && productIdElement !== undefined) product = productIdElement.value;
  
    await axios.post(`${baseUrl}/api/add-to-cart`, {
      option,
      product,
    })
      .then((response) => {
        console.log(response.data);
        if (response.hasOwnProperty('data')) {
          data = response.data;
        }
      })
      .catch((error) => {
        console.log(`${baseUrl}`);
        console.error(error);
        if (error.hasOwnProperty('response') && error.response !== undefined && error.response.hasOwnProperty('data')) {
          data.info = error.response.data.info;
        }
      });
        
    showStatus(currentTarget, data);
  };

  const addToCartForms = document.querySelectorAll('.add-to-cart');
  addToCartForms.forEach((form) => form.addEventListener('submit', addToCart));
};

document.addEventListener('DOMContentLoaded', main);
