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
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count = 1;
                        foreach($admins as $admin) {
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?> </th>
                            <td><?= $admin->full_name ?></td>
                            <td><?= $admin->email ?></td>
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