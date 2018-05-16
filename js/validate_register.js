$(document).ready(function() {
  $('#name').on('blur', function(event) {
    event.preventDefault();
    /* Act on the event */
    var name = $('#name').val();
    if(name.length > 5){
      $('#name').removeClass('invalid');
      $('#name').addClass('valid');
    }else{
      $('#name').removeClass('valid');
      $('#name').addClass('invalid');
    }
  });
  $('#email').on('blur', function(event) {
    event.preventDefault();
    /* Act on the event */
    var regixEmail = /\S+@\S+\.\S+/g;
    var email = $('#email').val();
    if(email.match(regixEmail)){
      $('#email').removeClass('invalid');
      $('#email').addClass('valid');
    }else{
      $('#email').removeClass('valid');
      $('#email').addClass('invalid');
    }
  });
  $('#phonenum').on('blur', function(event) {
    event.preventDefault();
    /* Act on the event */
    var regixEmail = /[0-9]/g;
    var phonenum = $('#phonenum').val();
    if(phonenum.match(regixEmail) && phonenum.length > 9){
      $('#phonenum').removeClass('invalid');
      $('#phonenum').addClass('valid');
    }else{
      $('#phonenum').removeClass('valid');
      $('#phonenum').addClass('invalid');
    }
  });

  $('#pass').on('blur', function(event) {
    event.preventDefault();
    /* Act on the event */
    var pass = $('#pass').val();
    if(pass.length > 8){
      $('#pass').removeClass('invalid');
      $('#pass').addClass('valid');
    }else{
      $('#pass').removeClass('valid');
      $('#pass').addClass('invalid');
    }
  });
});
