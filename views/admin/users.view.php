<?php require 'header.view.php'; ?>

<div class="wrapper">
    <!-- Sidebar  -->
    <?php require 'sidebar.view.php'; ?>

    <!-- Page Content  -->
    <div id="content">

        <?php require 'topnav.view.php'?>

        
        <div class="container">
            <button class="btn btn-primary"  data-toggle="modal" data-target="#createModal" style="margin-bottom:30px;"><i class="fa fa-plus"></i> Create new user</button>

            <div class="row">
                <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($users as $user) {
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td class="name<?=$user->id?>"><?= $user->full_name ?></td>
                            <td class="email<?=$user->id?>"><?= $user->email ?></td>
                            <td ><?= User::$user_types[$user->type] ?></td>
                            <td>
                                <?php if($user->isTalented() || $user->isOrganization()){ ?>
                                    <a class="btn btn-primary" href="/profile?id=<?=$user->id?>" target="_blank"><i class="fa fa-eye"></i></a>
                                <?php } ?>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="<?=$user->id?>"><i class="fas fa-edit"></i></button>
                                <a class="btn btn-danger" href="#" data-href="/admin/users/delete?id=<?=$user->id?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></a>

                            </td>
                        </tr>
                    <?php $count++; } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <?php require 'modals.view.php' ?>

    </div>
</div>


<?php require 'footer.view.php'; ?>

<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var user_id = button.data('id') // Extract info from data-* attributes
  var name = $('.name'+user_id).text()
  var email = $('.email'+user_id).text()
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text("Update " + name + "'s Data")
  modal.find('.modal-body #user_id').val(user_id)
  modal.find('.modal-body #name').val(name)
  modal.find('.modal-body #email').val(email)
})



$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});


</script>