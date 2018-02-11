
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

// new Vue({
//     el: '#vueApp',
//     data: {
//       permissionType: 'simple',
//       resource: '',
//       resourceInArabic: '',
//       crudType: ['create', 'read']
//     },
//     methods: {
//       inArray: function(crud){
//         for(var i=0; i < this.crudType.length; i++){
//           if( this.crudType[i] == crud){
//             return true
//           }
//         }
//         return false
//       }
//     }
// });

$(function () {
  $('[data-toggle="tooltip"]').tooltip();

  $(".dropdown-toggle").click(function(){
    $(".dropdown-menu").slideToggle(300);
  });

  $(document).click(function(e) {
    if ( $(e.target).closest('.dropdown-menu').length === 0 ) {
      $(".dropdown-menu").slideUp(300);
    }
  });

  $(".navbar-toggler").click(function(){
    $(".navbar-collapse").slideToggle(600);
  });

  $("#hideDetails").click(function(e) {
    e.preventDefault();
    $("#postDetails").fadeOut();
    $("#showDetails").fadeIn();
  });

  $("#showDetails").click(function(e) {
    e.preventDefault();
    $("#postDetails").fadeIn();
    $("#showDetails").fadeOut();
  });

  // $("#showPostControls").click(function(e) {
  //   e.preventDefault();
  //   $(".indent-list-group-item").slideToggle();
  // });

  $("input[type=file]").change(function () {
    var fieldVal = $(this).val();
  
    // Change the node's value by removing the fake path (Chrome)
    fieldVal = fieldVal.replace("C:\\fakepath\\", "");
      
    if (fieldVal != undefined || fieldVal != "") {
      $(this).next(".custom-file-label").attr('data-content', fieldVal);
      $(this).next(".custom-file-label").text(fieldVal);
    }
  
  });
});

$(window).on( "load", function() {
  $('#message-drawer').animate({top: '55px', opacity: '10'}, "slow").delay(3000).animate({top: '-100px', opacity: '0'}, "slow");
});