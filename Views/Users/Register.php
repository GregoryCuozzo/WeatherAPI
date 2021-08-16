

<div >
    <div >

        <h4 class="title" style="text-align:center;margin:auto;" >  Player registration  </h4>

        <div class="container" ><br>
            <h1 class="text-center"></h1><hr><br>
            <div class="row animate__animated animate__pulse">


                <div class="row animate__animated animate__pulse">

                    <div class="col-md-12 offset-md-12 col-sm-12">
                        <p>
                            <a href="../Login.php" style="text-align:center;margin:auto;">
                                <i class="fa-home"></i>
                            </a>
                        </p>
                        <p  id="loginpage"  >
                            <a  href="../Login.php" >
                                login page
                            </a>
                        </p>
                    </div>
                </div>


                <!-- ---------------------------------------------- register form ------------------------------------------------ !-->

                <div class="col-md-4 offset-md-4 ">
                    <form method="POST" action="/user/register">

                        <!-- -------------------------------------- error management ------------------------------------------------------- !-->
                        <p id="error">
                            <?php if(isset($_GET['errorreg'])){
                                echo '<img src="../Pictures/aware.jpg" alt="Texte Alternatif" >';
                                switch($_GET['errorreg']){
                                    case 'error1':
                                        echo "<br>Please fill all the gaps <br>";
                                        break;
                                    case 'error2':
                                        echo "<br>password failed.<br>";
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
                        <!-- -------------------------------------------------------------------------------------------------------------- !-->
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="username"  placeholder="Username" id="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password"><label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email"><label>
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" name="login" class="btn btn-warning"> Register </button>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </div>



