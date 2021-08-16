
<?php if (!empty($user)): ?>


<div style="margin-left:300px;margin-right:300px">
    <h1 style="text-align:center;"> Members  list  </h1>
    <table class="table  table-striped table-hover table-bordered" id="data"  >
        <thead class="table-primary">
        <tr>

            <th scope="col">Username </th>
            <th scope="col">Email</th>
            <th scope="col">Update </th>
            <th scope="col"> Cancel</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($user as $per): ?>
            <tr>
                <td><?= $per->__get('username'); ?></td>
                <td><?= $per->__get('email'); ?></td>
                <td class="cell100 column2">
                    <a href="/user/edit/<?= $per ->__get('id')?>">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </a>
                </td>

                <td class="cell100 column2">
                    <a href="/user/delete/<?=$per ->__get('id')?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>

            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <?php endif; ?>


