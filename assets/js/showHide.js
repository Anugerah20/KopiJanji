$(document).ready(function() {
   $('#show-eye').click(function() {
      $('#show').toggleClass('fa-eye-slash');

      var myInput = $('#password');
      
      if(myInput.attr('type') == 'password') {
         myInput.attr('type','text');
      } else {
         myInput.attr('type','password');
      }
   });
});

// Confirm Password JQuery
// $(document).ready(function() {
//    $('#show-eye-password').click(function() {
//       $('#show-password').toggleClass('fa-eye-slash');

//       var myInputConfirm = $('#password');

//       if(myInputConfirm.attr('type') == 'password') {
//          myInputConfirm.attr('type','text');
//       } else {
//          myInputConfirm.attr('type','password');
//       }
//    });
// });


