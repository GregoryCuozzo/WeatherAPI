<?php include('Templates/Head.php');
      include ('Templates/AdminNav.php');

      ?>

<!-- ------------------------------------ search data -------------------------------------------------------------- -->

<section id="form" class="col-md-4 offset-md-3  col-sm-4 ">
      <form class="queryloc" action="">
            <input type="text" name="recherche" id="recherche">
            <input type="submit" value="show me the weather ">
      </form>
</section>


<!-- -------------------------------------- show data -------------------------------------------------------------- -->


<?php
      include('weather/Data.php');
      include('weather/MyFavourites.php');
      include('Templates/Foot.php');

      ?>
