    var conn = new WebSocket('ws://localhost:8080');
    conn.onmessage = function(e){
        $('.msg_history').append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p>' + e.data + '</p><span class="time_date"> 11:01 AM    |    June 9</span></div></div></div>');
    };

    conn.onopen = function(){
        var msg = {
            type : 'register_user',
            user_id : loggedUserId
        }
        conn.send(JSON.stringify(msg))
    };

    function getMessagesOf(e){
      console.log($(e).data('id'));
    }