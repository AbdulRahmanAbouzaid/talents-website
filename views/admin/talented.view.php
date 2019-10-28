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
                        <th scope="col">Interests</th>
                        <th scope="col">#NO Published Materials</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($all_talented as $talented) {
                            $user = $talented->user();
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td><?= $user->full_name ?></td>
                            <td><?= $user->email ?></td>
                            <td><?= implode(array_column($talented->getTalents(), 'name'), ', ') ?></td>
                            <td> <?= count($talented->getMaterials())?></td>
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