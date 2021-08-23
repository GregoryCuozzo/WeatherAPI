
<!-- ---------------------------------------- Includes ------------------------------------------------------------ --->

<?php   include('Templates/Head.php');
        include('Templates/UserNav.php'); ?>
        <p id="pass">
            <?php if(isset($_GET['pass'])){
                echo "your profile has been registered ";

            } ?>

        </p>

<?php   include('Users/Edit.php');
        include('Templates/Foot.php');
        ?>




