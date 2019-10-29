<?php require 'header.view.php'; ?>

<div class="wrapper">
    <!-- Sidebar  -->
    <?php require 'sidebar.view.php'; ?>

    <!-- Page Content  -->
    <div id="content">

        <?php require 'topnav.view.php'?>

        
        <div class="container">
            <div class="row">
                <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Author</th>
                        <th scope="col">Title</th>
                        <th scope="col">Aiming To</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($events as $event) {
                        $user = $event->getOrganization();
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td><a href="/profile?id=<?=$user->id?>" target="_blank"><?= $user->full_name ?></td>
                            <td><?=$event->title?></td>
                            <td><?= implode(array_column($event->getTalents(), 'name'), ', ') ?></td>
                            <td><?= $event->date ?></td>
                            <td>
                                <a class="btn btn-primary" href="/profile?id=<?=$user->id?>#<?=$event->id?>" target="_blank"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-danger" href="#" data-href="/admin/events/delete?id=<?=$event->id?>" data-toggle="modal" data-target="#confirm-delete"><i class="fas fa-trash-alt"></i></a>

                            </td>
                        </tr>
                    <?php $count++; } ?>
                    </tbody>
                </table>

                <?php require 'modals.view.php'; ?>
                

                </div>
            </div>
        </div>

    </div>
</div>


<?php require 'footer.view.php'; ?>

<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
</script>