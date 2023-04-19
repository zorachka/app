<?php

declare(strict_types=1);

use Zorachka\Http\Application;

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(static function () {
    $rootDirectory = dirname(__DIR__);
    $container = (require_once $rootDirectory . '/bootstrap.php')();

    /** @var Application $application */
    $application = $container->get(Application::class);
    $application->run();
})();
