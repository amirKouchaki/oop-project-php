<?php

use app\Router;

ob_start();
?>
    <main class="form-signin">
        <div class="my-10">
            <form action="<?=Router::INDEX_ROUTE.Router::$routeNames['login.verify']?>" method="POST">

                <img class="mx-auto" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt=""
                     width="72" height="57">
                <div class="flex justify-center mt-2">
                    <div class="mx-w-5xl flex-grow max-w-xs">
                        <div class=" form-floating mt-2">
                            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="checkbox  mt-2">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <?php
                        /**
                         * @var $errors
                         */
                         foreach ($errors as $error):?>
                         <div>
                             <h3 class="text-xs text-red-500 mt-3"><?=$error?></h3>
                         </div>
                        <?php endforeach;
                        unset($_SESSION['l-errors'])?>

                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="userLoginForm">Sign in</button>
                        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
                    </div>
                </div>
            </form>
        </div>
    </main>
<?php
$slot = ob_get_clean();
require_once 'public/views/layouts/main-layout.php';
