<?php

use app\Router;

ob_start();
?>
    <main class="form-signin">
        <div class="my-10">
            <form method="POST" action="<?=Router::INDEX_ROUTE.'/users'?>">
                <img class="mx-auto" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt=""
                     width="72" height="57">
                <div class="flex justify-center mt-2">
                    <div class="mx-w-5xl flex-grow max-w-xs">
                        <div class=" form-floating mt-2">
                            <input type="text" class="form-control" id="name" placeholder="name" name="name">
                            <label for="name">name</label>
                        </div>
                        <div class=" form-floating mt-2">
                            <input type="text" class="form-control" id="username" placeholder="username"  name="username">
                            <label for="username">username</label>
                        </div>
                        <div class=" form-floating mt-2">
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                            <label for="password">Password</label>
                        </div>

                        <div class="checkbox mb-3 mt-2">
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
                        unset($_SESSION['s-errors'])?>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="userRegistrationForm">Sign in</button>
                        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
                    </div>
                </div>
            </form>
        </div>
    </main>








<script src="https://getbootstrap.com/docs/5.1/assets/js/docs.min.js"></script>
<?php
$slot = ob_get_clean();
require_once 'public/views/layouts/main-layout.php';

