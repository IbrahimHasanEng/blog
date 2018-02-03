
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip();

  $(".dropdown-toggle").click(function(){
    $(".dropdown-menu").slideToggle();
  });

  $(document).click(function(e) {
    if ( $(e.target).closest('.dropdown-menu').length === 0 ) {
      $(".dropdown-menu").slideUp();
    }
  });

  $(".navbar-toggler").click(function(){
    $(".navbar-collapse").slideToggle(600);
  });

  $("#hideDetails").click(function(e) {
    e.preventDefault();
    $("#postDetails").fadeOut(function() {
      $("#postDetails").removeClass('col-4');
      $("#post").addClass('col-12');
      $("#showDetails").show();
    });
  });

  $("#showDetails").click(function(e) {
    e.preventDefault();
    $("#postDetails").addClass('col-4').show(function() {
      $("#post").removeClass('col-12');
      $("#showDetails").hide();
    });
  });
});