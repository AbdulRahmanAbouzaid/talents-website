<?php require 'header.view.php'; ?>

<div class="wrapper">
    <!-- Sidebar  -->
    <?php require 'sidebar.view.php'; ?>

    <!-- Page Content  -->
    <div id="content">

        <?php require 'topnav.view.php'?>

        
        <div class="container">
            <a class="btn btn-success" style="margin-bottom:30px;" href="/admin/materials"><i class="fas fa-long-arrow-alt-left"></i> Back To Materials</a>

            <div class="row">
                <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Comment Author</th>
                        <th scope="col">body</th>
                        <th scope="col">Date</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($comments as $comment) {
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td><?= $comment->user()->full_name ?></td>
                            <td><?= $comment->body ?></td>
                            <td><?= $comment->created_at ?></td>
                            <td>
                                <a class="btn btn-danger" href="#" data-href="/admin/comments/delete?id=<?=$comment->id?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></a>
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

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });

</script>