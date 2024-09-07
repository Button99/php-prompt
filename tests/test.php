<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Ckoumpis\PhpPrompt\Console;
use Ckoumpis\PhpPrompt\Spinner;
use Ckoumpis\PhpPrompt\ProgressBar;

Console::log("Test");
Console::success("Success");
Console::warning("Warning");
Console::error("Error");
Console::blue('Blue');
Console::cyan('Cyan');


// User can use both.
Spinner::withSteps(0, 10, 1);

// for($i = 0; $i < 10; $i++) {
//     Spinner::spin("Loading...");
//     sleep(1);
// }

// Spinner::stop();


// User can use both
// $total = 100;

// for($i =1; $i <=$total; $i++) {
//     ProgressBar::display($i, $total);
//     usleep(10000);
// }

ProgressBar::withSteps(1, 10,1);