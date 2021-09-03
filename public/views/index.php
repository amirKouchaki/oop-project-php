<?php
ob_start();
?>
<header class="py-5 border-bottom">
    <div class="container pt-md-1 pb-md-4">
        <div class="row">
            <div class="col-xl-8">
                <h1 class="bd-title mt-0">index</h1>
                <p class="bd-lead">Quickly get a project started with any of our examples ranging from using parts of the framework to custom components and layouts.</p>

                <div class="d-flex flex-column flex-sm-row">
                    <a href="https://github.com/twbs/bootstrap/releases/download/v5.1.0/bootstrap-5.1.0-examples.zip" class="btn btn-lg btn-bd-primary" onclick="ga('send', 'event', 'Examples', 'Hero', 'Download Examples');">Download examples</a>
                    <a href="https://github.com/twbs/bootstrap/archive/v5.1.0.zip" class="btn btn-lg btn-outline-secondary mt-3 mt-sm-0 ms-sm-3" onclick="ga('send', 'event', 'Examples', 'Hero', 'Download');">Download source code</a>
                </div>

            </div>
        </div>
        <?php
        /**
         * @var $message
         */
        if ($message):?>
            <div>
                <h3 class="text-md text-green-500 mt-3"><?=$message?></h3>
            </div>
        <?php endif;?>
    </div>
</header>

<?php
$slot = ob_get_clean();
require_once 'public/views/layouts/main-layout.php';