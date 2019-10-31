<?php require 'header.view.php'; ?>

<div class="wrapper">
    <!-- Sidebar  -->
    <?php require 'sidebar.view.php'; ?>

    <!-- Page Content  -->
    <div id="content">

        <?php require 'topnav.view.php'?>
    
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Notifications to all users</h5>
                </button>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Content</label>
                        <textarea type="text" class="form-control notification-body" id="email"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary send-btn" onclick="sendNotification()">Send</button>
                </div>
            </div>
        </div>

    </div>
</div>


<?php require 'footer.view.php'; ?>




<script>
    var conn = new WebSocket('ws://localhost:8080');

    conn.onopen = function(){
        var msg = {
            type : 'register_user',
            user_id : <?= $logged_admin->id?>
        }
        conn.send(JSON.stringify(msg))
    };

    function sendNotification() {
        var body = $('.notification-body').val();
        console.log(body);
        var msg = {
            text : body,
            type : 'admin',
            from : <?= $logged_admin->id?>,
            to : 0,
        };
        conn.send(JSON.stringify(msg));
        $('.notification-body').val("");
    }
</script>