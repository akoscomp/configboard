/* globals Chart:false, feather:false */

(function () {
  'use strict'
  feather.replace()
}())

$(document).ready(function () {
    $('.nav ul li:first').addClass('active');
    $('.tab-content:not(:first)').hide();
    $('nav ul li a').click(function (event) {
        event.preventDefault();
        var content = $(this).attr('href');
        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');
        $(content).show();
        $(content).siblings('.tab-content').hide();
    });
    $('.input-string').change(function (event) {
      var id = event.target.id;
      var element = document.getElementById(id);
      var value = event.target.value;
      var type = element.getAttribute('data-type');
      console.log( "Chaged ID: " + id + ", value: " + value + ", type:" + type );
        $.post("update.php",
        {
          id: id,
          value: value,
          type: type
        },
        function(data, status){
          console.log("Data: " + data + "\nStatus: " + status);
        });
    });
    $('.subbmit-password').click(function (event) {
      var id = event.target.id;
      var el_password0 = document.getElementById("var-data-password-"+id);
      var el_password1 = document.getElementById("var-data-password1-"+id);
      var el_password2 = document.getElementById("var-data-password2-"+id);

      var password0 = el_password0.value;
      var type = el_password0.getAttribute('data-type');

      var password1 = el_password1.value;
      var password2 = el_password2.value;

      if (password1 != password2) {
        alert("Wrong confirm password!");
      } else {
        $.post("update.php",
        {
          id: id,
          type: type,
          password0: password0,
          password1: password1
        },
        function(data, status){
          console.log("Data: " + data + "\nStatus: " + status);
          $("#var-data-password-"+id).val('');
          $("#var-data-password1-"+id).val('');
          $("#var-data-password2-"+id).val('');
        });
      }
    });
});
