
const fileTypeHandler = () => {
  const trigger = document.querySelector('.add-another-collection-widget')
  const prototypeContainer = document.querySelector('#filesProto');
  const prototype = prototypeContainer.getAttribute('data-prototype');
  let widgetCounter = prototypeContainer.getAttribute('data-widget-counter');

  const add = () => {
    let newWidget = prototype.replace(/__name__/g, widgetCounter);
    widgetCounter++;
    prototypeContainer.setAttribute('data-widget-counter', widgetCounter);
    let widget = document.createElement('LI');
    console.log(widget);
    widget.insertAdjacentHTML('beforeend', newWidget);
    prototypeContainer.appendChild(widget);
  }
  trigger.addEventListener('click', add);
}
document.addEventListener('DOMContentLoaded', fileTypeHandler);