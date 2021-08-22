

<!-- ----------------------------------- display favorites table ---------------------------------------------------- -->

<?php if (!empty($country)): ?>

<div class="col-md-4 offset-md-3 col-sm-12">
        <h2 style="color:white"> My Favourites </h2>
        <table class="table  table-striped table-hover table-bordered" id="data"  >
            <thead class="table-primary">
            <tr>
                <th scope="col">Country </th>
                <th scope="col">City</th>
                <th scope="col">Pays</th>


            </tr>
            </thead>
            <tbody>
             <?php foreach ($country as $country): ?>
            <tr>
                <td><?= $country->__get('id'); ?></td>
                <td><?= $country->__get('ville'); ?></td>
                <td><?= $country->__get('pays'); ?></td>

            </tr>
            </tbody>
            <?php endforeach; ?>
        </table>

<?php endif; ?>