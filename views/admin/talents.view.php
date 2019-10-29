<?php require 'header.view.php'; ?>

<div class="wrapper">
    <!-- Sidebar  -->
    <?php require 'sidebar.view.php'; ?>

    <!-- Page Content  -->
    <div id="content">

        <?php require 'topnav.view.php'?>

        
        <div class="container">
            <button class="btn btn-primary"  data-toggle="modal" data-target="#createModal" style="margin-bottom:30px;"><i class="fa fa-plus"></i> Add Talent</button>

            <div class="row">
                <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($talents as $talent) {
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td class="icon<?=$talent->id?>"><img src="/public/uploads/talents/<?=$talent->icon?>" width="100px" height="100px"/></td>
                            <td class="name<?=$talent->id?>"><?= $talent->name ?></td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-id="<?=$talent->id?>"><i class="fas fa-edit"></i></button>
                                <a class="btn btn-danger" href="#" data-href="/admin/talents/delete?id=<?=$talent->id?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php $count++; } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <?php require 'talents-modals.view.php' ?>

    </div>
</div>


<?php require 'footer.view.php'; ?>

<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var talent_id = button.data('id') // Extract info from data-* attributes
  var name = $('.name'+talent_id).text()

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text("Update " + name)
  modal.find('.modal-body #talent_id').val(talent_id)
  modal.find('.modal-body #name').val(name)
})



$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});


</script>