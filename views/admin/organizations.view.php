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
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col"># Published Events</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($organizations as $organization) {
                            $user = $organization->user();
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td><?= $user->full_name ?></td>
                            <td><?= $user->email ?></td>
                            <td> <?= count($organization->getEvents())?></td>
                        </tr>
                    <?php $count++; } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

    </div>
</div>


<?php require 'footer.view.php'; ?>