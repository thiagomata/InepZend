<?php
namespace projeto;

set_time_limit(0);

require_once( "_start.php" );

$application = new \Local\Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
