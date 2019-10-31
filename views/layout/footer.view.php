<footer id="main-footer" class=" text-center p-2 bg-light-coral text-white footerFixe">
  <div class="container">
    <div class="row">
      <div class="col ">
        <p>Copyright 2019 &copy; Tabouk</p>
      </div>
    </div>
  </div>
</footer>

    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/popper.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/validation.js"></script>
    <script src="/public/js/all-fonts.js"></script>
    <script src="/public/js/fontawesome.js"></script>
    <script >
      function showAndHide(element, password_id) {
        var pass = document.getElementById(password_id);
        if (pass.type === "password") {
          element.classList.toggle("fa-eye-slash");
          pass.type = "text";
        } else {
          element.classList.toggle("fa-eye");
          pass.type = "password";
        }
      }

      <?php if($logged_user){?>
        var conn = new WebSocket('ws://localhost:8080');
          conn.onmessage = function(e){
              var content = e.data;
              var data = content.split(";delimeter;");
              if(data[3] == '%comment%' || data[3] == '%admin%') {
                $('.no-notifications').remove();
                if(data[3] == '%comment%'){
                  $('.notify-dropdown').prepend('<a class="dropdown-item" href="/profile?id='+data[1]+'&notification_id='+data[2]+'#'+data[4]+'"> '+data[0]+'</a><div class="dropdown-divider"></div>');
                }else{
                  $('.notify-dropdown').prepend('<a class="dropdown-item" href="/notifications?id='+data[1]+'&notification_id='+data[2]+'"> '+data[0]+'</a><div class="dropdown-divider"></div>');
                }
                $('.notification-count').html(parseInt($('.notification-count').html(), 10)+1);
              }else{
                if($('.msg_history')[0]){
                  $('.msg_history').append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="/public/img/profile.jpeg" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>' + data[0] + '</p><span class="time_date"> 11:01 AM    |    June 9</span></div></div></div>');
                  $(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);
                }
                
                $('.no-msg').remove();
                $('.msg-dropdown').prepend('<a class="dropdown-item" href="/chat?other_id='+data[1]+'&notification_id='+data[2]+'"> You have new message</a><div class="dropdown-divider"></div>');
                $('.msg-notify').html(parseInt($('.msg-notify').html(), 10)+1);
              }
              
          };

          conn.onopen = function(){
              var msg = {
                  type : 'register_user',
                  user_id : <?= $logged_user->id?>
              }
              conn.send(JSON.stringify(msg))
          };
        <?php }?>
  </script>

  </body>
</html>