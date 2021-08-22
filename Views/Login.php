<?php include('Templates/Head.php') ?>

    <!-- ------------------------------------------ login  form ------------------------------------------------------- !-->


    <div id="login" >

        <div >
            <div class="container"  ><br>
                <h1 class="text-center"></h1><hr><br>
                <div class="row animate__animated animate__pulse">
                    <div class="col-md-4 offset-md-4">
                        <form method="POST" action="/index/login" >

                            <!-- ---------------------------------- error management warning ------------------------------------------------ !-->
                            <p id="error">
                                <?php if(isset($_GET['error'])){
                                    echo '<img src="../Ressources/Pictures/aware.jpg" alt="Texte Alternatif"  style="height:30px;width:30px;">';

                                    switch($_GET['error']){
                                        case 'error1':
                                            echo "Please, fill all the gaps !";

                                            break;
                                        case 'error2':
                                            echo "Invalid login";
                                            break;
                                        case 'error3':
                                            echo "Wrong Password";
                                            break;
                                        case 'error4':
                                            echo "Error has occured. Please, contact the administrator";
                                            break;
                                    }}

                                ?>
                            </p>
                            <!-- ----------------------------------------------------------------------------------------------------------- !-->
                                <p id="pass">
                                    <?php if(isset($_GET['pass'])){
                                        echo "your profile has been registered ";

                                    } ?>

                                </p>
                            <!-- ----------------- username -----------------!-->

                            <div class="form-group row" >
                                <div class="col-sm-12" >
                                    <input type="text"
                                           class="form-control"
                                           name="username"
                                           placeholder="Username"
                                           id="username">
                                </div>
                            </div>

                            <!-- ----------------- password ---------------!-->

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="password"
                                           name="password"
                                           class="form-control"
                                           id="inputPassword3"
                                           placeholder="Password"><label>
                                </div>
                            </div>

                            <!-- --------------- Login ------------------!-->

                            <div class="text-center">
                                <button type="submit"
                                        name="login"
                                        class="btn btn-warning"> Login </button>
                            </div>
                            <br>

                            <!-- -------------- register button --------!-->

                            <p  id="register" >
                                <a href="/index/create"> Register here  </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include ('Templates/Foot.php') ?>