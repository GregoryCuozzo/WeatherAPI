

<!-- --------------------------------------------- members list ----------------------------------------------------- -->

<?php if (!empty($user)): ?>


<div style="margin-left:300px;margin-right:300px">
    <h1 style="text-align:center;"> Members  list  </h1>
    <table class="table  table-striped table-hover table-bordered" id="data"  >
        <thead class="table-primary">
        <tr>

            <th scope="col">Username </th>
            <th scope="col">Email</th>


        </tr>
        </thead>
        <tbody>
        <?php foreach ($user as $per): ?>
            <tr>
                <td><?= $per->__get('username'); ?></td>
                <td><?= $per->__get('email'); ?></td>


            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <?php endif; ?>



