/*
Template Name: Material Pro admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/

var default_head = '';
var default_message = 'Cuerpo del mensaje';
var default_type = 'info';

function notify(head, message, type) {
  if (head === undefined) {
    head = default_head
  }
  if (message === undefined) {
    message = default_message
  }

  if (type === undefined) {
    type = default_type
  }

  $.toast({
      heading: head,
      text: message,
      position: 'top-right',
      loaderBg: '#0f4571',
      icon: type,
      hideAfter: 10000,
      stack: 10
  });
}
          
