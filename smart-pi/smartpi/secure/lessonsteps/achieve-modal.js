'use strict';

console.log("achieve-modal.js Loaded");

//open modal on button click
document.querySelector('.open-modal').addEventListener('click', function (event) {
  event.preventDefault();
  var modal = document.querySelector('.modal'); 
  var html = document.querySelector('html');
  modal.classList.add('is-active');
  html.classList.add('is-clipped');

//remove modal on button click
  modal.querySelector('.delete').addEventListener('click', function (e) {
    e.preventDefault();
    modal.classList.remove('is-active');
    html.classList.remove('is-clipped');
  });

//remove modal on secondary button click
  modal.querySelector('.close').addEventListener('click', function (e) {
    e.preventDefault();
    modal.classList.remove('is-active');
    html.classList.remove('is-clipped');
  });
  
});