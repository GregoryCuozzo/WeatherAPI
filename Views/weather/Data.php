<?php if( !empty("recherche")): ?>
    <div class="col-md-4 offset-md-3 col-sm-12 " >
    <h1 style="text-align:center;">  </h1>
    <table class="table  table-striped table-hover table-bordered " id="data" style="text-align:center;" >
        <thead class="table-primary">
            <tr>
                <th scope="col">Country </th>
                <th scope="col">City</th>
                <th scope="col">Temperature min</th>
                <th scope="col">Temperature </th>
                <th scope="col">Temperature max </th>
                <th scope="col"> weather description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="country"></td>
                <td id="city"></td>
                <td id="temp_min"></td>
                <td id="temp"></td>
                <td id="temp_max"></td>
                <td id="weather_desc"></td>
            </tr>
        </tbody>
    </table>
</div>

<?php endif; ?>

