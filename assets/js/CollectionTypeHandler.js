const widgetManager = () => {
  const data = {
    containers: [],
    triggers: [],
    removers: [],
    containersQuery: 'div.collection',
    triggersQuery: ':scope div.collection .add-another-collection-widget',
    removersQuery: ':scope div.collection .remove',
  };

  const attachEventListeners = (element, trigger, callback) => element.addEventListener(trigger, callback);

  const removeWidget = ({ currentTarget }) => {
    const { parentNode } = currentTarget;
    parentNode.parentNode.outerHTML = '';
  };

  const addNewWidget = ({ currentTarget }) => {
    const newWidget = document.createElement('li');
    const lis = data.containers;
    const counter = (lis.length > 0) ? lis.length : 0;
    const container = currentTarget.parentNode.querySelector('.prototype');
    const { liClass, fieldsContainersClass, removerContainersClass, removerClass } = container.dataset;

    let rawPrototype = container.dataset.prototype;
    rawPrototype = rawPrototype.replace(/__name__/gm, counter);

    newWidget.innerHTML = rawPrototype;

    const labels = newWidget.querySelectorAll('label');

    labels.forEach((label) => {
      const { parentNode } = label;
      parentNode.classList.add(fieldsContainersClass);
      parentNode.innerHTML = `<div>${parentNode.innerHTML}</div>`;

      parentNode.parentNode.classList.add(liClass);
    });

    const removerContainer = document.createElement('div');
    const removerButton = document.createElement('button');
    removerButton.classList.add(removerClass, 'btn', 'btn-primary');
    removerButton.innerHTML = 'Supprimer';
    removerButton.type = 'button';
    removerContainer.innerHTML = `${removerButton.outerHTML}`;
    removerContainer.classList.add(removerContainersClass);
    console.log(removerButton);
    let widgetRow = newWidget.querySelector('.row');
    widgetRow.innerHTML += removerContainer.outerHTML;

    const removeWidgetButton = newWidget.querySelector('.remove');
    attachEventListeners(removeWidgetButton, 'click', removeWidget);
    console.log(currentTarget.parentNode.querySelector('.prototype'));
    container.append(newWidget);
  };

  const retrieveElements = () => {
    data.containers = document.querySelectorAll(data.containersQuery);
    data.triggers = document.querySelectorAll(data.triggersQuery);
    data.removers = document.querySelectorAll(data.removersQuery);
  };

  const init = () => {
    retrieveElements();
    data.triggers.forEach(element => attachEventListeners(element, 'click', addNewWidget));
    data.removers.forEach(element => attachEventListeners(element, 'click', removeWidget));
  }

  init();
};

document.addEventListener('DOMContentLoaded', widgetManager);