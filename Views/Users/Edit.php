

<!-- ---------------------------------------------- error management ----------------------------------------------- -->
<p id="error">
    <?php if(isset($_GET['errorup'])){
        echo '<img src="../Pictures/aware.jpg" alt="Texte Alternatif" >';
        switch($_GET['errorup']){
            case 'error1':
                echo "<br>Please fill all the gaps <br>";
                break;
            case 'error3':
                echo '<br>please insert a valid mail :
                                        title@server.com<br> ';
            case 'error4':
                echo 'please insert a valid username :<br>
                                        Starts with capital letter <br>
                                        ends with numbers <br>
                                        Example Gregory12<br> ';
        };
    }
    ?>
</p>

<!-- ------------------------------------------- update form ------------------------------------------------------- -->

<div class="formulaire" style="margin-left:600px;margin-right:600px">
    <h2 style="text-align:center"> Modify an owner's information</h2> <hr>
        <form action="/user/edit" method="post" class="form-style-9">
            <ul style="list-style: none;">

                <input name="id" type="hidden" value="<?= $User->__get('id')?>">

                <li>
                    <label for="username" class="form-label">username : </label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $User->__get('username');?>" >
                </li>

                <li>
                    <label for="email" class="form-label"> Email : </label><br>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $User->__get('email');?>">
                </li>

                <hr>
                <li>
                    <div class="butt">
                        <button type="submit" name="submit" > Update   </button>
                    </div>
                </li>
            </ul>
        </form>
</div>
