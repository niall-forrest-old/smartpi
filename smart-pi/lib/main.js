'use strict';

console.log("Main.js Loaded");

document.querySelector('a#open-modal').addEventListener('click', function (event) {
  event.preventDefault();
  var modal = document.querySelector('.modal'); 
  var html = document.querySelector('html');
  modal.classList.add('is-active');
  html.classList.add('is-clipped');

  modal.querySelector('.modal-background').addEventListener('click', function (e) {
    e.preventDefault();
    modal.classList.remove('is-active');
    html.classList.remove('is-clipped');
  });

  modal.querySelector('.modal-close').addEventListener('click', function (e) {
    e.preventDefault();
    modal.classList.remove('is-active');
    html.classList.remove('is-clipped');

  });
  
});




