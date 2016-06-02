$('#sendRegistrationData').click(function(){
  if($('#newPassword').val() == $('#confirmPassword').val()){
    $.post('../Classes/api.php',
            {
              s: 'newUser',
              name:$('#newName').val(),
              password:$('#newPassword').val(),
              email:$('#newEmail').val()
            },
            function(data, textStatus, xhr) {
              if(data == "u2"){
                alert("Ник занят");
              } else {
                alert("Пользователь зарегистрирован");
              }
            });
  } else {
    alert("Пароли не совпадают");
  }
});

$('#sendSigninData').click(function(){
  $.post('../Classes/api.php',
      {
        s: 'signIn',
        name:$('#userName').val(),
        password:$('#userPassword').val()
      },
      function(data, textStatus, xhr) {
        alert(data);

  location.href=location.href;

      });
});

var buffer;

$('#userNamePanel').hover(
  function(){
    buffer = $(this).html();
    $(this).html('<i class="material-icons">&#xE879;</i>');
  },
  function(){
    $(this).html(buffer);
  }
  )
                    .click(
  function() {
    $.post('../Classes/api.php',
      {
        s: 'signOut'
      }, function(data, textStatus, xhr) {
        location.href=location.href;
      });
  }
);

$('#signOut').click(
  function() {
    $.post('../Classes/api.php',
      {
        s: 'signOut'
      }, function(data, textStatus, xhr) {
        location.href='index.php';
      });
  }
);

$('#sendRefillData').click(function(){
  $.post('../Classes/api.php',
    {
      s: 'refill',
      money:$('#refillSum').val(),
      userId:$('#cUserId').html()
    },
    function(data, textStatus, xhr) {
      location.href=location.href;
  });
});
