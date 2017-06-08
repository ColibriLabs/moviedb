<?php

use ColibriLabs\MoviesDbApplication;

include_once __DIR__ . '/../vendor/autoload.php';
include_once __DIR__ . '/../Sources/MoviesDbApplication.php';

(new MoviesDbApplication())->run();